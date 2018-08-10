<?php

namespace Tests\Feature\Commands;

use Symfony\Component\Console\Exception\RuntimeException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory;

use App\User;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use DatabaseMigrations;

    protected $faker;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->faker = Factory::create();
    }

    /**
     * @test
     */
    public function after_executing_command_a_new_user_is_created()
    {
        $email = $this->faker->email;
        $name = $this->faker->name;
        $password = $this->faker->password;

        Artisan::call('user:create', [
            'email' => $email,
            'name'  => $name,
            'password' => $password,
            '--env' => 'testing'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email
        ]);
    }

    /**
     * @test
     */
    public function user_not_created_when_email_not_provided()
    {
        $name = $this->faker->name;
        $password = $this->faker->password;

        $this->expectException(RuntimeException::class);

        Artisan::call('user:create', [
            'name'  => $name,
            'password' => $password,
            '--env' => 'testing'
        ]);

        $this->assertDatabaseMissing('users', [
            'name' => $name,
        ]);
    }

    /**
     * @test
     */
    public function user_not_created_when_name_not_provided()
    {
        $email = $this->faker->email;
        $password = $this->faker->password;

        $this->expectException(RuntimeException::class);

        Artisan::call('user:create', [
            'email'  => $email,
            'password' => $password,
            '--env' => 'testing'
        ]);

        $this->assertDatabaseMissing('users', [
            'name' => $email,
        ]);
    }

    /**
     * @test
     */
    public function user_created_with_default_password_when_no_one_provided()
    {
        $email = $this->faker->email;
        $name = $this->faker->name;

        Artisan::call('user:create', [
            'email'  => $email,
            'name' => $name,
            '--env' => 'testing'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email
        ]);
    }

    /**
     * @test
     */
    public function cannot_create_user_with_same_email_of_other_user()
    {
        $user = factory(User::class)->create();

        $this->expectException(RuntimeException::class);

        Artisan::call('user:create', [
            'email'  => $user->email,
            'name' => $this->faker->name,
            '--env' => 'testing'
        ]);

    }
}