<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, DatabaseTransactions;
    
    protected $faker, $user;
    /**
     * Set up the test
     */
    public function setUp() :void
    {
        parent::setUp();
        $this->faker = Faker::create();
        
        Storage::fake('s3');
        Mail::fake();
    }
    
    /**
     * Reset the migrations
     */
    public function tearDown() :void
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }
}
