<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_duplicate()
    {
        $user1 = User::make([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@test.com'
        ]);

        $user2 = User::make([
            'name' => 'John Doe',
            'email' => 'john.doe@test.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    public function test_delete_user()
    {
        $user = User::factory()->count(2)->make();

        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }

    // HTTP Tests
    public function test_store_new_users()
    {
        $response = $this->post('/register', [
            'name' => 'Jane Doe',
            'email' => 'jane.doe@test.com',
            'password' => 'jonny1234',
            'password_confirmation' => 'jonny1234'
        ]);

        $response->assertRedirect('/home');
    }

    // Database Tests
    public function test_database()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'jane.doe@test.com'
        ]);
    }

    public function test_database_2()
    {
        $this->assertDatabaseMissing('users', [
            'email' => 'jane.doe@test2.com'
        ]);
    }

    // Seeders Test
    public function test_seeders()
    {
        $this->seed(); // seed all seeders in the seeders folder
        // eqivalent to - php artisan db:seed
    }
}
