<?php

namespace App\Listeners;

use App\Events\UserLoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use App\Models\LoginHistory;

class StoreloginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserLoginHistory  $event
     * @return void
     */
    public function handle(UserloginHistory $event)
    {
        $loginTime = Carbon::now()->toDateTimeString();

        $userDetails = $event->user;

        $input['name'] = $userDetails->name;
        $input['email'] = $userDetails->email;
        $input['login_time'] = $loginTime;

        $saveHistory = LoginHistory::create($input);

        return $saveHistory;
    }
}
