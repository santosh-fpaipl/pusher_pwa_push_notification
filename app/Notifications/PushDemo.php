<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class PushDemo extends Notification
{

    use Queueable;

    public function __construct()
    {
        \Log::info('hit');
    }
    
    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
       \Log::info($notifiable->name);
       Mail::to('backendsr1@gmail.com')->send(new TestMail());
        return (new WebPushMessage)
            ->title('Hello '.$notifiable->name)
            ->icon('/notification-icon.png')
            ->body('Great, Push Notifications work!')
            ->action('View App', 'notification_action');
    }
    
}