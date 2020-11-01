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
        <h1 class="results__header">Вы искали: <em
                    class="results__header search-name search-name--marked"
                    id="item-name">death stranding</em></h1>
    </main>
</div>

<script src="./assets/js/script.js"></script>
</body>
</html>
