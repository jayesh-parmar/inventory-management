<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandControllerTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_user_can_add_a_new_brand(): void
    {
        $this->setUpUser();
        
      $response = $this->from(route('brand.create'))->post(route('brand.store'),[
            'name'=>'test'
        ]);

        $this->assertEquals(1,Brand::count());

        $response->assertStatus(302);

        $response->assertRedirect(route('brand.index'));
        $brand = Brand::first();

        $this->assertEquals($brand->name, 'test');

    }
    public function test_user_can_update_a_brand(): void
    {
       $this->setUpUser();

        $response = $this->from(route('brand.create'))->post(route('brand.store'), [
            'name' => 'test'
        ]);

        $brand = Brand::first();
        $response = $this->post(route('brand.update',$brand->id),[
            'name' => 'update test'
        ]);

        $update_brand = Brand::first();

        $this->assertEquals('update test', $update_brand->name);

        $response->assertRedirect(route('brand.index'));
    }  
}
