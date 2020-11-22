<?php

namespace Entities;

use DateTime;
use Exception;

/**
 * Class Game or DLC title
 */
class Item
{

    public $id;
    public $name;
    public $displayDefaultPrice;
    public $displayDiscountPrice;
    public $discountPercent;
    public $platforms;
    public $releaseDate;
    public $storeUrl;
    public $detailUrl;
    public $img;
    public $isInWishlist;

    /**
     * Item constructor.
     *
     * @param array $values assoc array of available fields
     */
    public function __construct($values)
    {
        $this->id = $values["id"];
        $this->name = $values["name"];
        $this->displayDefaultPrice = $values["displayDefaultPrice"];
        if (isset($values["discountPercent"])) {
            $this->displayDiscountPrice = $values["displayDiscountPrice"];
            $this->discountPercent = (int)$values["discountPercent"];
        }
        $this->platforms = $values["platforms"];
        $this->storeUrl = $values["storeUrl"];
        if (isset($values["detailUrl"])) {
            $this->detailUrl = $values["detailUrl"];
        }
        if (isset($values["img"])) {
            $this->img = htmlspecialchars($values["img"]);
        }
        $this->isInWishlist = $values["isInWishlist"];
        if (isset($values["releaseDate"])) {
            try {
                $this->releaseDate = new DateTime($values["releaseDate"]);
            } catch (Exception $ignored) {
            }
        }
    }

}