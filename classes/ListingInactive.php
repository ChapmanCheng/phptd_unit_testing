<?php

namespace Listing;

class ListingInactive extends \Listing\ListingBasic
{
    protected $status = 'inactive';

    public function getTitle()
    {
        return '<strike>' . parent::getTitle() . '</strike>';
    }
    public function getWebsite()
    {
        return;
    }
    public function getEmail()
    {
        return;
    }
    public function getTwitter()
    {
        return;
    }
}
