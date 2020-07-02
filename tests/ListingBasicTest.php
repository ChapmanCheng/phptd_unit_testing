<?php

use PHPUnit\Framework\TestCase;
use \Listing\ListingBasic;

class ListingBasicTest extends TestCase
{
    protected $data;

    protected function setUp(): void
    {
        $this->data = [
            "id" => "11",
            "title" => "Bulgaria PHP Conference",
            "description" => null,
            "website" => "http://www.bgphp.org",
            "email" => "conference@bgphp.org",
            "twitter" => "bgphpconf",
            "status" => "basic",
            "coc" => null
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
    public function objectIsCreatedByPassingMinimum()
    {
        $data = [
            "id" => "11",
            "title" => "Bulgaria PHP Conference"
        ];
        $listing = new ListingBasic($data);
        return $this->assertInstanceOf(ListingBasic::class, $listing);
    }

    /**
     * @test
     */
    public function getstatusMethodReturnsBasic()
    {
        $listing = new ListingBasic($this->data);
        return $this->assertEquals('basic', $listing->getStatus());
    }

    /**
     * @test
     */
    public function getpropertyMethodsReturnsExpectedResult()
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
        $data = $this->data;
        $listing = new ListingBasic($data);
        $arr = $listing->toArray();

        $this->assertEquals($data["id"], $arr["id"]);
        $this->assertEquals($data["title"], $arr["title"]);
        $this->assertEquals($data["website"], $arr["website"]);
        $this->assertEquals($data["email"], $arr["email"]);
        $this->assertEquals($data["twitter"], $arr["twitter"]);
        return;
    }
}
