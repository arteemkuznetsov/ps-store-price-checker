<?php

require_once "../application/views/includes/header.php";
?>
    <h2 class="main__header main-header main-header--central"><?= $isSuccess
            ? "Добро пожаловать" : "Неверная ссылка" ?></h2>
    <div class="main__inner main-inner">
        <div class="main-inner__box">
            <div class="main-inner-box__text">
                <?php
                if ($isSuccess): ?>
                    Ваш E-mail подтвержден. Войдите в учетную запись на странице авторизации.
                <?php
                else: ?>
                    Неверная ссылка (вероятно, адрес электронной почты пользователя уже подтвержден).
                <?php
                endif; ?>
            </div>
            <div class="main-inner-form__button-container">
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
        </div>
    </div>
<?php
require_once "../application/views/includes/footer.php";
