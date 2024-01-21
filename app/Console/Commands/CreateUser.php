<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $firstname = $this->ask('Enter firstname');
        $lastname = $this->ask('Enter lastname');
        $email = $this->ask('Enter email');
        $password = $this->secret('Enter password');

        $user = User::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->email_verified_at = Carbon::now();
        $user->save();

        $this->info('User created successfully!');
    }
}
