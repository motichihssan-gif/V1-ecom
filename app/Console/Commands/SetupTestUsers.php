<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SetupTestUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:test-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test admin and user accounts for authentication testing';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        // Create admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'ADMIN',
                'email_verified_at' => now(),
            ]
        );

        // Create regular user
        $user = User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'role' => 'USER',
                'email_verified_at' => now(),
            ]
        );

        $this->info('Test users created successfully!');
        $this->line('');
        $this->info('Admin Account:');
        $this->line('  Email: admin@example.com');
        $this->line('  Password: password');
        $this->line('  Role: ADMIN');
        $this->line('');
        $this->info('Regular User Account:');
        $this->line('  Email: test@example.com');
        $this->line('  Password: password');
        $this->line('  Role: USER');
        $this->line('');

        return Command::SUCCESS;
    }
}
