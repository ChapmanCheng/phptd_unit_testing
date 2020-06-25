<?php

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

    /**
     * @test
     */
    public function getStatusMethodReturnsBasic()
    {
        $listing = new ListingBasic($this->data);
        return $this->assertEquals('basic', $listing->getStatus());
    }

    /**
     * @test
     */
    public function getPropertyMethodsReturnsExpectedResult()
    {
        $data = $this->data;
        $listing = new ListingBasic($data);
        $this->assertEquals($data['id'], $listing->getId());
        $this->assertEquals($data['title'], $listing->getTitle());
        $this->assertEquals($data['website'], $listing->getWebsite());
        $this->assertEquals($data['email'], $listing->getEmail());
        $this->assertEquals($data['twitter'], $listing->getTwitter());
        return;
    }

    /**
     * @test
     */
    public function toArrayMethodsReturnsExpectedResult()
    {
        /**
         * TODO: 
         * Write a test for the ListingBasic class to ensure 
         * that the toArray method returns an array where each 
         * item equals the expected results: id, title, website, email, twitter.
         */
        $data = $this->data;
        $listing = new ListingBasic($data);

        $expectedKeys = ["id", "title", "website", "email", "twitter"];
        $filterData = array_filter($data, function ($key) use ($expectedKeys) {
            return in_array($key, $expectedKeys);
        }, ARRAY_FILTER_USE_KEY);

        $this->assertEquals($filterData, $listing->toArray());
    }
}
