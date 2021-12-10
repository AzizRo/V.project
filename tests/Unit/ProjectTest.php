<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    //Test function for Register Route
    public function test_Register()
    {
        $response = $this->get('Register');
        $response->assertStatus(200);
    }

    //Test function for welcome Route
    public function test_welcome()
    {
        $response = $this->get('welcome');
        $response->assertStatus(200);
    }

    //Test function for Login Route
    public function test_Login()
    {
        $response = $this->get('Login');
        $response->assertStatus(200);
    }


}
