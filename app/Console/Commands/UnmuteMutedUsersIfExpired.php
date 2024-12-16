<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UnmuteMutedUsersIfExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:unmute-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unmutes muted users after 7 (by default) days have passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting unmute users procedure...');

        $users = User::where('muted_at', '!=', null)->where('muted_at', '<', Carbon::now()->subDays(7))->get();

        if ($users->count() === 0) {
            $this->alert("No users to unmute found! Quitting the procedure...");

            return;
        }

        DB::beginTransaction();

        $this->withProgressBar($users, function (User $user) {
            $user->muted_at = null;
            $user->save();
        });

        DB::commit();

        $this->newLine();

        $this->info("Successfully unmuted {$users->count()} users!");

    }
}
