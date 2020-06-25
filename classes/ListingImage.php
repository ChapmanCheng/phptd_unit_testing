<?php

namespace Listing;

abstract class ListingImage
{
    protected $image;

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        $fullPathPattern = "/^https?:\/\//";

        if (isset($this->image) && !empty($this->image)) {
            if (preg_match($fullPathPattern, $this->image) == 1) {
                return $this->image;
            }
            return "//" . $this->image;
        }
        return false;
    }
}
