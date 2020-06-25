<?php

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{
    protected $data;

    protected function setUp(): void
    {
        $this->data = [
            "id" => "17",
            "title" => "PHP[tek]",
            "description" => "Hello and welcome to php[tek] 2017 — the premier PHP conference and annual homecoming for the PHP Community. This conference will be our 12th annual, and php[architect] and One for All Events are excited to bring it to Atlanta, the empire city of the south!",
            "website" => "https://tek.phparch.com/",
            "email" => "",
            "twitter" => "phparch",
            "status" => "featured",
            "coc" => "One for All Events proudly stands by our long tradition of providing safe, secure, and productive environments at all of our events. We want to provide a welcoming experience to all attendees, old and new, and enjoy the great hospitality that the community has to offer together. To help ensure this, we will not condone any offensive behavior at our events. Please bring any concerns to the attention of the conference organizers. Our official statement is below:
                <p><em>One for All Events LLC is dedicated to providing a harassment-free event experience for everyone, regardless of gender, gender identity and expression, age, sexual orientation, disability, physical appearance, body size, race, ethnicity, religion (or lack thereof), or technology choices. We do not tolerate harassment of event participants in any form. Sexual language and imagery is not appropriate for any conference venue, including talks, workshops, parties, Twitter and other online media. Event participants violating these rules may be sanctioned or expelled from the event <strong>without a refund</strong> at the discretion of the conference organizers.</em></p>
                We ask that if our attendees experience any behavior that they feel is in violation of this Code of Conduct to responsibly report it to us.  This report should be made as soon as you feel comfortable doing so and should be done via one of the following methods:
                <ul>
                <li>In person to a staff member</li>
                <li>Via sending a Direct Message on Twitter to @oneforallevents</li>
                <li>Sending an email to coc@oneforall.events</li>
                </ul>
                All of these methods will be monitored at all times during our conferences to ensure that we receive reports promptly. This statement is based upon the original one created by The Ada Initiative, and currently hosted at confcodeofconduct.com  ",
        ];
    }

    /**
     * @test
     */
    public function getStatusMethodReturnsFeatured()
    {
        $expected = 'featured';
        $listing = new ListingFeatured($this->data);
        $this->assertEquals($expected, $listing->getStatus());
    }

    /**
     * @test
     */
    public function getCocMethodReturnsExpectedResult()
    {
        $expected = $this->data["coc"];
        $listing = new ListingFeatured($this->data);
        $this->assertEquals($expected, $listing->getCoc());
    }
}
