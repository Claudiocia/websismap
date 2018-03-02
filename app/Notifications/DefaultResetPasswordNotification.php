<?php

namespace WebSisMap\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class DefaultResetPasswordNotification extends ResetPassword
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('admin@user.com', 'Administrador do WebSisMap')
            ->subject('Redefinição de Senha')
            ->line('Você está recebendo este email, porque uma redefinição de senha foi solicitada.')
            ->action('Redefinir senha', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Se você não solicitou a redefinição de sua senha, por favor desconsidere esta mensagem.');
    }

}
