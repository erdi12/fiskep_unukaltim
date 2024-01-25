<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();
        ResetPassword::toMailUsing(function ($notifiable, $token)
        {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->email,
            ]));

            $subject = 'Reset Password untuk ' . $notifiable->email;

            return (new MailMessage)
                    ->from('akademik@unukaltim.ac.id', 'Tim IT UNU Kaltim')
                    ->subject($subject)
                    ->greeting("Assalamu'alaikum, Wr.Wb.")
                    ->line('Kami mendeteksi bahwa Anda mengalami kesulitan dalam mengklik tombol "Login". Jika itu terjadi, silahkan klik tombol "Klik Disini Untuk Merubah Password" dibawah ini:')
                    ->action('Klik Disini Untuk Merubah Password', $url)
                    ->line('Terima Kasih,')
                    ->salutation('Tim IT UNU Kaltim');          
        });

        //
    }
}
