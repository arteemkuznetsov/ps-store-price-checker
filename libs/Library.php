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

    public static function initSearchedItem($user, $result)
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
            $values["detailUrl"] = htmlspecialchars($result["url"]);
            $values["isInWishlist"] = self::isInWishlist($user, $result["id"]);
        }

        return $values;
    }

    public static function initWishedItem($result)
    {
        $values = [];

        if (isset($result["id"])) {
            $skuIndex = isset($result["skus"])
                ? self::searchDefaultSkuIndex($result["skus"]) : 0;

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
            $values["img"] = $result["images"][0]["url"];
            $values["isInWishlist"] = true;
        }

        return $values;
    }

    public static function isInWishlist($user, $titleId)
    {
        $pattern = "/([a-zA-Z0-9_-])+/";
        if (preg_match($pattern, $titleId)) {
            $conn = new DatabaseConnection();

            $result = $conn->query(
                "SELECT count(*) AS count FROM users_titles
                                            INNER JOIN wishlist_titles
                                                ON title_id = wishlist_titles.id
                                            WHERE user_id = :user_id
                                                AND ps_store_id = :ps_store_id",
                [$user->id, $titleId]
            );
            if ($result[0]->count == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getCurrentDirectory()
    {
        return basename(getcwd());
    }

    public static function encrypt($data, $key)
    {
        $plaintext = $data;

        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key,
                                          $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

        return base64_encode($iv . $hmac . $ciphertext_raw .
                             ".528d3a0db57c788c744aed5a2ee9f5c8." . $key);
    }

    public static function decrypt($code)
    {
        $decoded = base64_decode($code);
        $pieces = explode(".528d3a0db57c788c744aed5a2ee9f5c8.", $decoded);
        $c = $pieces[0];
        $key = $pieces[1];
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $data = openssl_decrypt($ciphertext_raw, $cipher, $key,
                                $options = OPENSSL_RAW_DATA, $iv);
        $calcmac =
            hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        if (hash_equals($hmac, $calcmac)) {
            return $data;
        } else {
            return false;
        }
    }

    public static function getView($path)
    {
        ob_start();
        include $path;
        $html = ob_get_contents();
        ob_get_clean();

        return $html;
    }

    public static function generateUniqueKey($conn)
    {
        $secret = "";
        $isUnique = false;
        while (! $isUnique) {
            $secret = bin2hex(openssl_random_pseudo_bytes(16));
            $result = $conn->query(
                "SELECT count(*) AS count FROM users WHERE users.secret_key = :secret",
                [$secret]
            );
            if ($result[0]->count == 0) {
                $isUnique = true;
            }
        }

        return $secret;
    }

    public static function deleteAccessToken()
    {
        if (isset($_COOKIE["access_token"])) {
            unset($_COOKIE["access_token"]);
        }
    }

}
