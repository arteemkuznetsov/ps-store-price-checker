<?php

require_once "../application/views/includes/header.php";
?>
    <h2 class="main__header main-header main-header--central">Создать учетную
        запись</h2>
    <div class="main__inner main-inner">
        <form class="main-inner__form main-inner-container" method="post"
              onsubmit="return registerNewUser(this)">
            <div class="main-inner-form__error error-message" id="error_block">
                <span class="error-message__img">
                    <img src="<?= $ROOT ?>/assets/img/warning.svg" alt="Error">
                </span>
                <div class="error-message__text" id="error_text"></div>
            </div>
            <div class="main-inner-form__info">Отмеченные
                <span class="main-inner-form__info--red">*</span> поля
                обязательны для заполнения.
            </div>
            <div class="main-inner__input-container input-container input-container--contrasting">
                <div class="input-text-box">
                    <input class="input-text-box__input-element"
                           id="first_name"
                           name="first_name"
                           placeholder="Имя"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="text"
                           pattern="[a-zA-Zа-яА-Я '-]+"
                           minlength="1"
                           maxlength="50"
                    >
                </div>
            </div>
            <div class="main-inner__input-container input-container input-container--contrasting">
                <div class="input-text-box">
                    <input class="input-text-box__input-element"
                           id="last_name"
                           name="last_name"
                           placeholder="Фамилия"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="text"
                           pattern="[a-zA-Zа-яА-Я '-]+"
                           minlength="1"
                           maxlength="50"
                    >
                </div>
            </div>
            <div class="main-inner__input-container input-container input-container--contrasting input-container--required">
                <div class="input-text-box">
                    <input class="input-text-box__input-element"
                           id="login"
                           name="login"
                           placeholder="Логин"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="text"
                           pattern="[a-zA-Z][a-zA-Z0-9-_]{4,255}"
                           minlength="5"
                           maxlength="255"
                           title="Логин должен содержать только буквы (в любом регистре), цифры, дефисы, подчеркивания и точки.
                           Имя пользователя должно начинаться с буквы и содержать не менее 5 символов."
                           required
                    >
                </div>
            </div>
            <div class="main-inner__input-container input-container input-container--contrasting input-container--required">
                <div class="input-text-box">
                    <input class="input-text-box__input-element"
                           id="email"
                           name="email"
                           placeholder="E-mail"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="email"
                           pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                           minlength="5"
                           maxlength="255"
                           required
                    >
                </div>
            </div>
            <div class="main-inner__input-container input-container input-container--contrasting input-container--required">
                <div class="input-container__input-text-box input-text-box">
                    <input class="input-text-box__input-element"
                           id="password"
                           name="password"
                           placeholder="Пароль"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="password"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,255}"
                           minlength="8"
                           maxlength="255"
                           title="Пароль должен содержать как минимум одну цифру, одну заглавную и строчную букву.
                           Длина пароля должна составлять не менее 8 символов."
                           required
                    >
                </div>
            </div>
            <div class="main-inner-form__button-container">
                <div class="main-inner__input-container input-container input-container--small-shadow">
                    <div class="input-container__input-text-box input-text-box">
                        <button class="input-text-box__button-element button-element button-element--submit"
                                type="submit">
                            <span class="button-element__text button-element__text--white">Регистрация</span>
                        </button>
                    </div>
                </div>
                <div class="main-inner__input-container input-container input-container--small-shadow">
                    <a href="<?= $ROOT ?>/signin/"
                       class="button-element__inner-link">
                        <div class="input-text-box">
                            <button class="input-text-box__button-element button-element button-element--white"
                                    type="button">
                                <span class="button-element__text button-element__text--black">Войти в существующую учетную запись</span>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
        </form>
    </div>
<?php
require_once "../application/views/includes/footer.php";