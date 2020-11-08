<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./assets/css/reset.css" rel="stylesheet">
    <link href="./assets/css/styles.css" rel="stylesheet">
    <title>PS Price Tracker</title>
</head>
<body class="page">
<header class="page__header header header--animated">
    <div class="header__inner header-inner">
        <div class="header-inner__logo side-block">
            <a href="/index.php">
                <img src="./assets/img/logo.png" alt="PS Price Tracker">
            </a>
        </div>
        <ul class="header-inner__links header-links">
            <li class="header-links__item header-link">
                <a href="#">
                    <div class="header-link__inner-text">Главная</div>
                </a>
            </li>
            <li class="header-links__item">
                <a href="#">
                    <div class="header-link__inner-text">Список желаемого</div>
                </a>
            </li>
            <li class="header-links__item">
                <a href="https://store.playstation.com/">
                    <div class="header-link__inner-text">Playstation Store</div>
                </a>
            </li>
            <li class="header-links__item">
                <a href="#">
                    <div class="header-link__inner-text">Настройки</div>
                </a>
            </li>
        </ul>
        <div class="header-inner__region side-block">Регион</div>
    </div>
</header>
<div class="page__content">
    <div class="page__background background--bottom-shadow background--top-area background--vertical-center">
        <form onsubmit="return search(input.value)">
            <div class="search-container">
                <div class="search-text-box">
                    <input class="search-text-box__input"
                           placeholder="Поиск игры или дополнения"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="search" id="input"
                           required>
                    <button class="search-text-box__button search-button"
                            id="submit">
                        <img class="search-button__img"
                             src="./assets/img/loupe.svg"
                             alt="Поиск">
                    </button>
                </div>
            </div>
        </form>
    </div>
    <main class="content__results results">
        <section class="results__section results-section">
            <h2 class="results__header results-header">Вы искали: <em
                    class="results-header search-name search-name--marked"
                    id="item-name">death stranding</em></h2>
            <ul class="results-section__list results-list" id="results-container">
                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
                        <button class="results-item__add-to-wishlist add-to-wishlist" onclick="addToWishlist(this)">
                            <img class="add-to-wishlist__img"
                                 src="./assets/img/heart.png"
                                 alt="Добавить">
                        </button>
                        <a href="#">
                            <img src="https://store.playstation.com/store/api/chihiro/00_09_000/titlecontainer/RU/ru/999/CUSA12607_00/image?w=236&h=236"
                                 alt="#">

                            <div class="results-item__discount-label">-50%</div>
                        </a>
                    </div>
                    <div class="results-item__name">
                        <a href="#">Death Stranding</a>
                    </div>
                    <div class="results-item-prices">

                        <!-- может отсутствовать -->
                        <div class="results-item-prices__discounted-price">
                            RUB 1.249
                        </div>
                        <!-- -->

                        <div class="results-item-prices__default-price item-default-price item-default-price--crossed-out">
                            RUB 2.499
                        </div>
                    </div>
                    <div class="results-item__platforms-container item-platforms-container">
                        <ul class="item-platforms-container__list platforms-list">
                            <li class="platforms-list__item platform platform--ps-vita">
                                PS Vita
                            </li>
                            <li class="platforms-list__item platform platform--ps3">
                                PS3
                            </li>
                            <li class="platforms-list__item platform platform--ps4">
                                PS4
                            </li>
                            <li class="platforms-list__item platform platform--ps5">
                                PS5
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </section>
    </main>
</div>
<footer class="page__footer footer">
    <div class="page__background background background--top-shadow background--bottom-area">
        <div class="footer__inner footer-inner">
            <div class="footer-inner__left-block side-block side-block--center-inside">
                <img src="./assets/img/logo.png" alt="PS Price Tracker Logo">
            </div>
            <div class="footer-inner__center-block footer-center">
                <div class="footer-center__wide-text footer-wide-text">
                    <div class="footer-wide-text__inner footer-wide-text-inner">
                        Все данные об играх и дополнениях получаются путем обращения к открытым источникам на
                        <span class="footer-wide-text-inner footer-wide-text--bold">
                        <a href="https://store.playstation.com/">
                           официальном сайте PlayStation™Store</a></span>
                        с целью некоммерческого использования.
                    </div>
                </div>
                <div class="footer-center__links-container footer-links-container">
                    <div class="footer-links-container__links-block footer-links-block">
                        <h1 class="footer-links-block__header">Общее</h1>
                        <ul class="footer-links-block__links-list footer-links-list">
                            <li class="footer-links-list__item">
                                <a href="mailto:arteemkuznetsov@gmail.com">Связаться
                                    с нами</a>
                            </li>
                            <li class="footer-links-list__item">
                                <a href="#">Подробнее о сервисе</a>
                            </li>
                            <li class="footer-links-list__item">
                                <a href="#">Список желаемого</a>
                            </li>
                            <li class="footer-links-list__item">
                                <a href="#">Личный аккаунт</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-links-container__links-block footer-links-block">
                        <h1 class="footer-links-block__header">Поддержите нас</h1>
                        <ul class="footer-links-block__links-list footer-links-list">
                            <li class="footer-links-list__item">
                                <a href="#">Buy Me A Coffee</a>
                            </li>
                            <li class="footer-links-list__item">
                                <a href="mailto:arteemkuznetsov@gmail.com">Поддержать
                                    на Patreon</a>
                            </li>
                            <li class="footer-links-list__item">
                                <a href="#">Поддержать на PayPal</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-center__wide-text footer-wide-text footer-wide-text--light">
                    2020—<?=date("Y")?> PS Price Tracker
                </div>
            </div>
            <div class="footer-inner__right-block side-block side-block--center-inside">

            </div>
        </div>
    </div>
</footer>

<script src="./assets/js/script.js"></script>
</body>
</html>
