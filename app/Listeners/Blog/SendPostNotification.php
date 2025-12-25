<?php

declare(strict_types=1);

namespace App\Listeners\Blog;

use App\Events\Blog\PostCreated;
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
