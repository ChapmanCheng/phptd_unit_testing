<?php

/**
 * TODO: 
 * Write a test for the ListingBasic class to ensure 
 * that getStatus method returns 'basic'.
 * 
 * Write a test for the ListingBasic class to ensure 
 * that the get method for each property is returning 
 * the expected results: id, title, website, email, twitter.
 * 
 * Write a test for the ListingBasic class to ensure 
 * that the toArray method returns an array where each 
 * item equals the expected results: id, title, website, email, twitter.
 */

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
    protected $data;

    protected function setUp(): void
    {

        $this->data = [
            "id" => "11",
            "title" => "Bulgaria PHP Conference",
            "description" => "",
            "website" => "http://www.bgphp.org",
            "email" => "conference@bgphp.org",
            "twitter" => "bgphpconf",
            "status" => "basic",
            "coc" => "",
        ];
    }
    /**
     * @test
     */
    public function dataNotProvidedExceptionMessage()
    {
        $this->expectExceptionMessage('Unable to create a listing, data unavailable');
        $data = [];
        return new ListingBasic($data);
    }

    /**
     * @test
     */
    public function invalidIdExceptionMessage()
    {
        $this->expectExceptionMessage('Unable to create a listing, invalid id');
        $data = $this->data;
        $data["id"] = null;
        return new ListingBasic($data);
    }

    /**
     * @test
     */
    public function invalidTitleExceptionMessage()
    {
        $this->expectErrorMessage('Unable to create a listing, invalid title');
        $data = $this->data;
        $data['title'] = null;
        return new ListingBasic($data);
    }
}
