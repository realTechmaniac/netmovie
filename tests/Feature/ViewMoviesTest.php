<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    
    public function the_main_page_shows_correct_info(){

        Http::fake();

        $response  = $this->get(route('movies.index'));

        $response->assertSuccesful();

        $response->assertSee('Popular Movies');

    }
}
