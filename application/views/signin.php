<?php

require_once "../application/views/includes/header.php";
?>
    <h2 class="main__header main-header main-header--central">Авторизация</h2>
    <div class="main__inner main-inner">
        <form action="./" class="main-inner__form main-inner-form" method="post"
              onsubmit="return loginUser(this)">
            <!-- display:flex for .main-inner-form__error -->
            <div class="main-inner-form__error error-message">
                <span class="error-message__img">
                    <img src="<?= $ROOT ?>/assets/img/warning.svg" alt="Error">
                </span>
                <div class="error-message__text">
                    Введен неверный логин или пароль. Проверьте правильность
                    введенных данных и повторите попытку.
                </div>
            </div>
            <div class="main-inner__input-container input-container input-container--contrasting">
                <div class="input-text-box">
                    <input class="input-text-box__input-element"
                           id="login"
                           name="login"
                           placeholder="Логин или e-mail"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="text"
                           pattern="[a-zA-Z][a-zA-Z0-9-_.]{5,}|[^@\s]+@[^@\s]+\.[^@\s]+"
                           title="Логин должен содержать только буквы (в любом регистре), цифры, дефисы, подчеркивания и точки.
                           Имя пользователя должно начинаться с буквы и содержать не менее 5 символов."
                           required
                    >
                </div>
            </div>
            <div class="main-inner__input-container input-container input-container--contrasting">
                <div class="input-container__input-text-box input-text-box">
                    <input class="input-text-box__input-element"
                           id="password"
                           name="password"
                           placeholder="Пароль"
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                           type="password"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
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
                            <span class="button-element__text button-element__text--white">Войти</span>
                        </button>
                    </div>
                </div>
                <div class="main-inner__input-container input-container input-container--small-shadow">
                    <a href="<?= $ROOT ?>/registration/"
                       class="button-element__inner-link">
                        <div class="input-text-box">
                            <button class="input-text-box__button-element button-element button-element--white"
                                    type="button">
                                <span class="button-element__text button-element__text--black">Создать учетную запись</span>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="main-inner-form__link">
                <a href="#">Забыли пароль?</a>
            </div>
        </form>
    </div>
<?php
require_once "../application/views/includes/footer.php";
