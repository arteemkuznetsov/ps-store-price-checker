<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
            <li class="header-links__item">
                <a href="#">Главная</a>
            </li>
            <li class="header-links__item">
                <a href="#">Список желаемого</a>
            </li>
            <li class="header-links__item">
                <a href="https://store.playstation.com/">Playstation Store</a>
            </li>
            <li class="header-links__item">
                <a href="#">Настройки</a>
            </li>
        </ul>
        <div class="header-inner__region side-block">/*регион*/</div>
    </div>
</header>
<div class="content">
    <div class="content__search">
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
    <main class="content__search-results results">
        <h1 class="results__header results-header">Вы искали: <em
                    class="results-header search-name search-name--marked"
                    id="item-name">death stranding</em></h1>
        <section class="results__section results-section">
            <ul class="results-section__list results-list">
                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

                <li class="results-list__item results-item">
                    <div class="results-item__img-container">
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
                            <li class="platforms-list__item platform platform--ps-vita">PS Vita</li>
                            <li class="platforms-list__item platform platform--ps3">PS3</li>
                            <li class="platforms-list__item platform platform--ps4">PS4</li>
                            <li class="platforms-list__item platform platform--ps5">PS5</li>
                        </ul>
                    </div>
                </li>

            </ul>
        </section>
    </main>
</div>

<script src="./assets/js/script.js"></script>
</body>
</html>
