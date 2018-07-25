<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name : users name} {email : users email} {password? : users password. Generates a random by default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Creates a user. If no password provided a random one is created";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userModel = new User();

        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');
        if (!$password) {
            $password = uniqid();
        }

        $this->info("#############################");
        $this->info("Creating user for email " . $email);

        $user = $userModel->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        if ($user !== null) {
            $this->info("User for email " . $email . " created with password = " . $password);
        } else {
            $this->info("Upss. Something went wrong. No user created. Try again.");
        }
        $this->info("#############################");
    }
}
