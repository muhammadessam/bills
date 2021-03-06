<?php

namespace App\Console\Commands;

use App\Mail\BillStillOpenMail;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Console\Command;

class SendNotificationCommand extends Command
{
    protected $signature = 'bills:send';

    protected $description = 'This command will send all notifications to all open bills users';

    public function handle(): void
    {
        $bills = Bill::with('user')->where('status', 'open')->whereDate('released_at', '<=', now()->subDays(setting('notify_when')))->get();
        foreach ($bills as $bill) {
            if ($bill->user->is_email) {
                \Mail::to($bill->user->email)->send(new BillStillOpenMail($bill));
            }
            if ($bill->user->is_sms) {

            }
            if ($bill->user->is_whatsapp) {

            }
        }
    }
}
