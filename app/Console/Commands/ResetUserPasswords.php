<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetUserPasswords extends Command
{
    protected $signature = 'users:reset-passwords';
    protected $description = 'Reset all users\' passwords to their emis_code value and set change_password to 0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch all users
        $users = User::all();

        foreach ($users as $user) {
            // Hash the emis_code
            $hashedPassword = Hash::make($user->emis_code);

            // Update the user's password and set change_password to 0
            $user->update([
                'password' => $hashedPassword,
                'change_password' => 0,
            ]);
        }

        $this->info('All users\' passwords have been reset to their emis_code values and change_password has been set to 0.');
    }
}
