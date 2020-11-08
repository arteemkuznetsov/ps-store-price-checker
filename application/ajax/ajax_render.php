<?php

require_once '../../includes/config.php';

$itemCollection = json_decode($_POST["items"], true);

foreach ($itemCollection as $item):?>
    <li class="results-list__item results-item">
        <div class="results-item__img-container">
            <button class="results-item__add-to-wishlist add-to-wishlist"
                    onclick="addToWishlist(this)">
                <img class="add-to-wishlist__img"
                     src="./assets/img/heart.png"
                     alt="Добавить">
            </button>
            <a href="#">
                <img src="<?= $item["imageUrl"] ?>"
                     alt="#">
                <?php
                if (isset($item["discountPercent"])):
                    ?>
                    <div class="results-item__discount-label">
                        -<?= $item["discountPercent"] ?>%
                    </div>
                <?php
                endif;
                ?>
            </a>
        </div>
        <div class="results-item__name">
            <a href="#"><?= $item["name"] ?></a>
        </div>
        <div class="results-item-prices">
            <?php
            if (isset($item["discountPercent"])):?>
                <div class="results-item-prices__discounted-price">
                    <?= $item["displayDiscountPrice"] ?>
                </div>
                <div class="results-item-prices__default-price item-default-price item-default-price--crossed-out">
                    <?= $item["displayDefaultPrice"] ?>
                </div>
            <?php
            else:?>
                <div class="results-item-prices__default-price item-default-price">
                    <?= $item["displayDefaultPrice"] ?>
                </div>
            <?php
            endif; ?>
        </div>
        <div class="results-item__platforms-container item-platforms-container">
            <ul class="item-platforms-container__list platforms-list">
                <?php
                foreach ($item["platforms"] as $platformName):
                    $platform = $platforms[$platformName]; ?>
                    <li class="platforms-list__item platform <?=$platform["css"]?>">
                        <?=$platform["name"]?>
                    </li>
                <?php
                endforeach; ?>
            </ul>
        </div>
    </li>
<?php
endforeach;