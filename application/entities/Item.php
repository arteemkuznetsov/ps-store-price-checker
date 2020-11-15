<?php

namespace Entities;

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
        $this->detailUrl = $values["detailUrl"];
        if (isset($values["releaseDate"])) {
            try {
                $this->releaseDate = new \DateTime($values["releaseDate"]);
            } catch (\Exception $ignored) {
            }
        }
    }

}