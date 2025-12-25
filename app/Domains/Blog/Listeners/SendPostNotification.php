<?php

declare(strict_types=1);

namespace App\Domains\Blog\Listeners;

use App\Domains\Blog\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        // Post oluşturulduğunda yapılacak işlemler
        // Örneğin: Email gönderme, bildirim gönderme, vb.
    }
}
