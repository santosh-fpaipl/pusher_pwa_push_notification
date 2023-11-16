<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\TestPusherEvent;
use App\Notifications\PageRefreshNotification;
use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class RefreshPageComponent extends Component
{
    public $notifications;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        $user = User::findOrfail(1);
        $this->notifications = $user->notifications;
    }

    public function boot(){
        $this->mount();
    }

    public function refreshPage()
    {
        // Trigger an event using Pusher
        TestPusherEvent::dispatch('Page refresh required');

        $user = User::findOrfail(1);
        // Display a notification using Laravel's built-in notification system
        $user->notify(new PageRefreshNotification('Page refreshed'));
    }

    public function render()
    {
        return view('livewire.refresh-page-component');
    }
}
