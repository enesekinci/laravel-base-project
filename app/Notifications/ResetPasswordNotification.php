<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        $url = URL::route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        return (new MailMessage)
            ->subject('Şifre Sıfırlama İsteği')
            ->line('Bu e-postayı şifrenizi sıfırlama talebinde bulunduğunuz için alıyorsunuz.')
            ->action('Şifremi Sıfırla', $url)
            ->line('Bu şifre sıfırlama bağlantısı 60 dakika içinde geçersiz olacaktır.')
            ->line('Eğer şifre sıfırlama talebinde bulunmadıysanız, bu e-postayı görmezden gelebilirsiniz.');
    }

    public function toArray(mixed $notifiable): array
    {
        return [
        ];
    }
}
