<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiCallsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testResponseStatusOkTest()
    {
        $response = $this->get('/api/v1/products');

        $response->assertStatus(200);
    }
    public function testReturnsZeroRecordsForOverLappingFiltersTest(){
        $responseInJson = $this->get('/api/v1/products?balanceMin=1500&balanceMax=1400')->json();
        $this->assertEquals(count($responseInJson),0);

    }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
