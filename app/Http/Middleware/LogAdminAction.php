<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Domains\Crm\Models\AdminActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogAdminAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $response = $next($request);

        // Sadece admin route'larında ve POST, PUT, PATCH, DELETE method'larında log
        if (! $request->user() || ! $request->is('admin/*') && ! $request->is('api/admin/*')) {
            return $response;
        }

        $method = $request->method();
        if (! \in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
            return $response;
        }

        // Action'ı route'dan çıkar
        $action = $this->extractAction($request);
        if (! $action) {
            return $response;
        }

        // Model bilgilerini çıkar
        $modelType = $this->extractModelType($request);
        $modelId = $this->extractModelId($request);

        // Old values ve new values (update için)
        $oldValues = null;
        $newValues = null;

        if ($action === 'update' && $modelType && $modelId) {
            try {
                $model = $modelType::find($modelId);
                if ($model) {
                    $oldValues = $model->getAttributes();
                    $newValues = $request->except(['_token', '_method']);
                }
            } catch (\Exception $e) {
                // Model bulunamadı veya hata oluştu, devam et
            }
        } elseif ($action === 'store') {
            $newValues = $request->except(['_token', '_method']);
        }

        try {
            AdminActionLog::create([
                'user_id' => $request->user()->id,
                'action' => $action,
                'model_type' => $modelType,
                'model_id' => $modelId,
                'old_values' => $oldValues,
                'new_values' => $newValues,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl(),
                'method' => $method,
            ]);

            // Admin actions log channel'a da yaz
            Log::channel('admin-actions')->info('Admin action logged', [
                'user_id' => $request->user()->id,
                'action' => $action,
                'model_type' => $modelType,
                'model_id' => $modelId,
            ]);
        } catch (\Exception $e) {
            // Log hatası oluşursa sessizce devam et
            Log::error('Failed to log admin action', [
                'error' => $e->getMessage(),
            ]);
        }

        return $response;
    }

    private function extractAction(Request $request): ?string
    {
        $route = $request->route();
        if (! $route) {
            return null;
        }

        $routeName = $route->getName();
        $action = $route->getActionMethod();

        // Route name'den action çıkar (örn: admin.products.store -> store)
        if ($routeName) {
            $parts = explode('.', $routeName);
            $lastPart = end($parts);

            // Özel action'lar
            if (\in_array($lastPart, ['store', 'update', 'destroy', 'restore', 'toggle-active'], true)) {
                return str_replace('-', '_', $lastPart);
            }
        }

        // Method name'den action çıkar
        if (\in_array($action, ['store', 'update', 'destroy', 'restore', 'toggleActive'], true)) {
            return $action === 'toggleActive' ? 'toggle_active' : $action;
        }

        // HTTP method'dan action çıkar
        return match ($request->method()) {
            'POST' => 'store',
            'PUT', 'PATCH' => 'update',
            'DELETE' => 'destroy',
            default => null,
        };
    }

    private function extractModelType(Request $request): ?string
    {
        $route = $request->route();
        if (! $route) {
            return null;
        }

        // Route parameter'larından model type çıkar
        $parameters = $route->parameters();
        foreach ($parameters as $key => $value) {
            if (\is_object($value)) {
                return $value::class;
            }
        }

        // Route name'den model type çıkar (örn: admin.products.store -> Product)
        $routeName = $route->getName();
        if ($routeName) {
            $parts = explode('.', $routeName);
            if (\count($parts) >= 2) {
                $modelName = str_replace('-', '', ucwords($parts[1], '-'));
                // Try domain-based model classes first
                $domainModelClasses = [
                    "App\\Domains\\Blog\\Models\\{$modelName}",
                    "App\\Domains\\Cms\\Models\\{$modelName}",
                    "App\\Domains\\Crm\\Models\\{$modelName}",
                    "App\\Domains\\Media\\Models\\{$modelName}",
                    "App\\Domains\\Settings\\Models\\{$modelName}",
                    "App\\Models\\{$modelName}", // Fallback to old location
                ];

                foreach ($domainModelClasses as $modelClass) {
                    if (class_exists($modelClass)) {
                        return $modelClass;
                    }
                }

                if (class_exists($modelClass)) {
                    return $modelClass;
                }
            }
        }

        return null;
    }

    private function extractModelId(Request $request): ?int
    {
        $route = $request->route();
        if (! $route) {
            return null;
        }

        // Route parameter'larından model id çıkar
        $parameters = $route->parameters();
        foreach ($parameters as $key => $value) {
            if (\is_object($value) && method_exists($value, 'getKey')) {
                return $value->getKey();
            }
            if (is_numeric($value)) {
                return (int) $value;
            }
        }

        return null;
    }
}
