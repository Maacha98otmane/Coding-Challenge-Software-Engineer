<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreationProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_making_an_api_request()
    {
        Storage::fake('images');

        $response = $this->post('/api/products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 10,
            'image' => UploadedFile::fake()->image('test.jpg'),
            'categories' => [1],
        ]);

        $response->assertStatus(201);
    }
}
