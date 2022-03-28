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
        Storage::fake('photos');
        $response = $this->post('/api/v1/products', [
            'name' => 'Product test',
            'price' => 122.22,
            'description' => 'Description lorem ipsum',
            'categories' => 1,
            'image' => UploadedFile::fake()->image('testing.jpg'),
        ]);
        $response->assertStatus(201);
    }
}
