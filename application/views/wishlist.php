<?php

require_once "../application/views/includes/header.php";
?>
    <h2 class="main__header results-header">Список желаемого
        (<?= sizeof($itemCollection) ?>)</h2>
<?php
if (! empty($itemCollection)):?>
    <ul class="results-section__list results-list"
        id="results-container">
        <?php
        foreach ($itemCollection as $item):?>
            <li class="results-list__item results-item">
                <div class="results-item__img-container results-item-img-container">
                    <?php
                    if ($user->isAuth): ?>
                        <button class="results-item__add-to-wishlist add-to-wishlist"
                                onclick="addOrDeleteItem(this)"
                                data-id="<?= $item->id ?>">
                            <img class="add-to-wishlist__img"
                                 src="<?= $ROOT ?>/assets/img/heart_filled.png"
                                 alt="Добавить">
                        </button>
                    <?php
                    endif; ?>
                    <a href="<?= $item->storeUrl ?>">
                        <img src="<?= $item->img ?>"
                             class="results-item-img-container__img"
                             data-url="<?= $item->detailUrl ?>"
                             alt="<?= $item->name ?>">
                        <?php
                        if (isset($item->discountPercent)):
                            ?>
                            <div class="results-item__discount-label discount-label">
                                -<?= $item->discountPercent ?>%
                            </div>
                        <?php
                        endif;
                        ?>
                    </a>
                </div>
                <div class="results-item__name">
                    <a href="<?= $item->storeUrl ?>"><?= $item->name ?></a>
                </div>
                <div class="results-item-prices">
                    <?php
                    if (isset($item->discountPercent)):?>
                        <div class="results-item-prices__discounted-price">
                            <?= $item->displayDiscountPrice ?>
                        </div>
                        <div class="results-item-prices__default-price item-default-price item-default-price--crossed-out">
                            <?= $item->displayDefaultPrice ?>
                        </div>
                    <?php
                    else:?>
                        <div class="results-item-prices__default-price item-default-price">
                            <?= $item->displayDefaultPrice ?>
                        </div>
                    <?php
                    endif; ?>
                </div>
                <div class="results-item__platforms-container item-platforms-container">
                    <ul class="item-platforms-container__list platforms-list">
                        <?php
                        foreach ($item->platforms as $platformName):
                            $platform = $platforms[$platformName] ?>
                            <li class="platforms-list__item platform <?= $platform["css"] ?>">
                                <?= $platform["name"] ?>
                            </li>
                        <?php
                        endforeach; ?>
                    </ul>
                </div>
            </li>
        <?php
        endforeach; ?>
    </ul>
<?php
else: ?>
    <div class="results-section__empty">Добавьте в свой список желаемого первую
        игру или дополнение!
    </div>
<?php
endif; ?>
<?php
require_once "../application/views/includes/footer.php";
?>