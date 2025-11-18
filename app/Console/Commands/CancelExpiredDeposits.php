<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DepositTransaction;
use Carbon\Carbon;

class CancelExpiredDeposits extends Command
{
    protected $signature = 'deposits:cancel-expired';
    protected $description = 'Cancel deposit transactions older than 10 minutes that are still pending';

    public function handle()
    {
        $expired = DepositTransaction::where('status', 'pending')
            ->where('created_at', '<', Carbon::now()->subMinutes(10))
            ->update(['status' => 'cancelled']);

        $this->info("Cancelled {$expired} expired deposits.");
    }
}
