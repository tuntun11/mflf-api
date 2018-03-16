<?php

namespace Tests\Unit\Services\Countries;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PragmaRX\Countries\Package\Countries;

class QueryTest extends TestCase
{

    use DatabaseMigrations;

    function test_all_countries()
    {
        $countries = Countries::all();

        if ($countries) 
        {
            $this->assertTrue(true);
        }
    }

}