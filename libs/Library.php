<?php

require_once 'DatabaseConnection.php';

class Library
{

    public static function request($url)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $data = curl_exec($ch);

        curl_close($ch);

        return json_decode($data, true);
    }

    public static function atLeastOnePlatformAvailable(
        $availablePlatforms,
        $sourcePlatforms
    ) {
        foreach ($sourcePlatforms as $sourcePlatform) {
            if ($availablePlatforms[$sourcePlatform]["available"]) {
                return true;
            }
        }

        return false;
    }

    public static function searchDefaultSkuIndex($skus)
    {
        foreach ($skus as $index => $sku) {
            // ищем по default_sku
            // если установлен amortizeFlag, то эта игра нам не подходит, даже если у нее флаг default_sku
            if (isset($sku["amortizeFlag"]) && $sku["amortizeFlag"] == 1) {
                continue;
            } elseif (isset($sku["defaultSku"]) && $sku["defaultSku"] == 1) {
                return $index;
            }
        }

        return 0;
    }

    public static function initItemParams($result)
    {
        $values = [];

        if (isset($result["id"])) {
            $skuIndex = self::searchDefaultSkuIndex($result["skus"]);

            $values["id"] = $result["id"];
            $values["name"] = $result["name"];
            $values["displayDefaultPrice"] =
                isset($result["skus"][$skuIndex]["display_price"])
                    ? $result["skus"][$skuIndex]["display_price"] : "";

            if (! empty($result["skus"][$skuIndex]["rewards"]) &&
                isset($result["skus"][$skuIndex]["rewards"][$skuIndex]) &&
                $result["skus"][$skuIndex]["display_price"] !== "Бесплатно" &&
                $result["skus"][$skuIndex]["rewards"][$skuIndex]["discount"] > 0
            ) {
                $values["displayDiscountPrice"] =
                    $result["skus"][$skuIndex]["rewards"][$skuIndex]["display_price"];
                $values["discountPercent"] =
                    $result["skus"][$skuIndex]["rewards"][$skuIndex]["discount"];
            }

            if (isset($result["playable_platform"])) {
                $values["platforms"] = $result["playable_platform"];
            }
            if (isset($result["release_date"])) {
                $values["releaseDate"] = $result["release_date"];
            }
            $values["storeUrl"] =
                "https://store.playstation.com/ru-ru/product/" .
                $result["id"];
            $values["detailUrl"] = $result["url"];
        }

        return $values;
    }

    public static function getCurrentDirectory()
    {
        return basename(getcwd());
    }

    public static function sendMail()
    {

    }
}
