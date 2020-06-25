<?php

use PHPUnit\Framework\TestCase;
use \Listing\ListingPremium;

class ListingPremiumTest extends TestCase
{
    protected $data;

    protected function setUp(): void
    {
        $this->data = [
            "id" => "13",
            "title" => "Sunshine PHP Conference",
            "description" => "The conference has something for every level of PHP developer. We start on February 2nd with a full day of 8 PHP related tutorials and workshops that are each 3 hours of in-depth information. Next we follow that with 2 days on February 3rd and 4th containing 5 keynotes and 40 PHP talks over 4 tracks.",
            "website" => "http://sunshinephp.com",
            "email" => "",
            "twitter" => "SunShinePHP",
            "status" => "premium",
            "coc" => null
        ];
    }

    /**
     * @test
     */
    public function getStatusMethodReturnsPremium()
    {
        $expected = "premium";
        $listing = new ListingPremium($this->data);
        $this->assertEquals($expected, $listing->getStatus());
    }

    /**
     * @test
     */
    public function getDescriptionReturnsExpectedResult()
    {
        $expected = $this->data["description"];;
        $listing = new ListingPremium($this->data);
        $this->assertEquals($expected, $listing->getDescription());
    }
}
