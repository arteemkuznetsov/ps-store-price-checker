</section>
</main>
</div>
<footer class="page__footer footer">
    <div class="page__background background background--top-shadow background--bottom-area">
        <div class="footer__inner footer-inner">
            <div class="footer-inner__left-block side-block side-block--center-inside">
                <img src="<?= $ROOT ?>/assets/img/logo.png"
                     alt="PS Price Tracker Logo">
            </div>
            <div class="footer-inner__center-block footer-center">
                <div class="footer-center__wide-text footer-wide-text">
                    <div class="footer-wide-text__inner footer-wide-text-inner">
                        Все данные об играх и дополнениях получаются путем
                        обращения к открытым источникам на
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
                                <a href="mailto:<?= $adminEmail ?>">Связаться
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
                        <h1 class="footer-links-block__header">Поддержите
                            нас</h1>
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
                    2020—<?= date("Y") ?> PS Price Tracker
                </div>
            </div>
            <div class="footer-inner__right-block side-block side-block--center-inside">

            </div>
        </div>
    </div>
</footer>
<script src="<?= $ROOT ?>/assets/js/common.js"></script>
</body>
</html>
