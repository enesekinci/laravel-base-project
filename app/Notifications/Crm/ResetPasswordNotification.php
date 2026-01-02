<?php

declare(strict_types=1);

namespace App\Notifications\Crm;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $token,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $email = $notifiable->getEmailForPasswordReset();

        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $email,
        ], false));

        return (new MailMessage)
            ->subject('Şifre Sıfırlama')
            ->line('Şifrenizi sıfırlamak için aşağıdaki butona tıklayın.')
            ->action('Şifre Sıfırla', $url)
            ->line('Bu link 60 dakika geçerlidir.')
            ->line('Eğer şifre sıfırlama talebinde bulunmadıysanız, bu e-postayı görmezden gelebilirsiniz.');
    }
}
