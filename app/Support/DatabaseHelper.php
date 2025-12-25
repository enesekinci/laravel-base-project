<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Database\Connection;

class DatabaseHelper
{
    /**
     * Database driver'a göre case-insensitive LIKE operatörünü döndürür.
     * PostgreSQL için ILIKE, diğerleri için LIKE.
     */
    public static function getCaseInsensitiveLikeOperator(?Connection $connection = null): string
    {
        if (! $connection) {
            $connection = \Illuminate\Support\Facades\DB::connection();
        }

        $driver = $connection->getDriverName();

        return $driver === 'pgsql' ? 'ILIKE' : 'LIKE';
    }
}
