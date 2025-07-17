<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends BaseVerifyEmail
{
    public function toMail($notifiable)
    {
        // Generate the signed URL for email verification
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->greeting('Welcome to Our Store, ' . $notifiable->name . '!')
            ->line('To get started, please verify your email address by clicking the button below.')
            ->action('Verify Email', $verificationUrl)
            ->line('If you did not create an account, no further action is required.')
            ->salutation('— The E-Commerce Team');
    }

    /**
     * Generate the verification URL.
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );
    }
}
