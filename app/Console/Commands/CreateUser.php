<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Symfony\Component\Console\Exception\RuntimeException;

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

    protected $email;
    protected $name;
    protected $password;


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
        $this->setEmail();
        $this->setUserName();
        $this->setPassword();

        $userModel = new User();


        $this->info("#############################");
        $this->info("Creating user for email " . $this->email);

        $user = $userModel->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        if ($user !== null) {
            $this->info("User for email " . $this->email . " created with password = " . $this->password);
        } else {
            $this->info("Upss. Something went wrong. No user created. Try again.");
        }
        $this->info("#############################");
    }

    public function setUserName()
    {
        $this->name = $this->argument('name');
    }

    public function setPassword()
    {
        $this->password = $this->argument('password');
        if (!$this->password) {
            $this->password = uniqid();
        }
    }

    public function setEmail()
    {
        $this->email = $this->argument('email');

        $usersWithEmail = User::where('email', $this->email)->count();

        if ($usersWithEmail > 0) {
            throw new RuntimeException(
                "There is already one user with email $this->email. Cannot create a new one with this email"
            );
        }
    }

}
