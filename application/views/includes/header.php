<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= $ROOT ?>/assets/css/reset.css" rel="stylesheet">
    <link href="<?= $ROOT ?>/assets/css/styles.css" rel="stylesheet">
    <title>PS Price Tracker</title>
</head>
<body class="page">
<header class="page__header header header--animated">
    <div class="header__inner header-inner">
        <div class="header-inner__logo side-block">
            <a href="<?= $ROOT ?>">
                <img src="<?= $ROOT ?>/assets/img/logo.png"
                     alt="PS Price Tracker">
            </a>
        </div>
        <ul class="header-inner__links header-links">
            <li class="header-links__item">
                <a href="#">
                    <div class="header-link__inner-text">Список желаемого</div>
                </a>
            </li>
            <li class="header-links__item">
                <a href="https://store.playstation.com/">
                    <div class="header-link__inner-text">PlayStation Store</div>
                </a>
            </li>
            <li class="header-links__item">
                <a href="#">
                    <div class="header-link__inner-text">О проекте</div>
                </a>
            </li>
        </ul>
        <div class="header-inner__right side-block">
            <?php
            if (! in_array(Library::getCurrentDirectory(), $accountDirs)): ?>
                <a href="<?= $ROOT ?>/signin/">Войти</a>
            <?php
            endif; ?>
        </div>
    </div>
</header>
<div class="page__content">
    <?php
    if (isset($isMainPage) && $isMainPage == true): ?>
    <div class="page__background background--bottom-shadow background--top-area background--vertical-center">
        <form action="./">
            <div class="input-container">
                <div class="input-text-box">
                    <input class="input-text-box__input-element"
                           name="name"
                           placeholder="Поиск игры или дополнения"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="search" id="input"
                           value="<?= isset($_GET["name"]) ? $searchQuery
                               : "" ?>"
                           required>
                    <button class="input-text-box__button-element button-element button-element--search"
                            type="submit">
                        <img class="button-element__img"
                             src="<?= $ROOT ?>/assets/img/loupe.svg"
                             alt="Поиск">
                    </button>
                </div>
            </div>
        </form>
        <?php
        endif; ?>
    </div>
    <main class="content__main main">
        <section class="main__section results-section">
