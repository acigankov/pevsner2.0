        <footer>
            <div class="container bg-color-footer">
                <div class="row">
                    <div class="footer-top-line">
                        <div class="logo"><a href="/"><img src="img/design/logo/logo.png" alt="logo"
                                    class="img-fluid"></a></div>
                        <div class="footer-content-info__tel py-2">
                            <a href="tel:+74955858203"><span><i class="fas fa-phone"></i></span> +7 (495) 585-8203</a>
                        </div>
                        <div class="cr_cards-img">
                            <span>Оплата банковскими картами осуществляется через АО «АЛЬФА-БАНК».К оплате принимаются
                                карты VISA, MasterCard, МИР.</span>
                            <!-- <img src="img/design/sections/footer/visa.png" alt="Мы принимаем Visa" class="img-fluid">
                            <img src="img/design/sections/footer/mastercard.png" alt="Мы принимаем MasterCard" class="img-fluid"> -->
                            <img src="./img/design/sections/footer/bank-logos.jpg" alt="Мы принимаем" class="img-fluid">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="footer-content w-100 d-flex align-items-center justify-content-between text-center">
                        <div class="footer-content-info">
                            <div class="footer-content-info__email">
                                <a href="mailto:zakaz@pevsner.ru?subject=Вопрос&nbsp;с&nbsp;сайта&nbsp;pevsner.ru"
                                    target="_blank" title="E-mail"><span><i class="fas fa-envelope"></i></span>
                                    zakaz@pevsner.ru</a>
                                <span
                                    class="footer-content-info__hours align-items-center d-flex justify-content-center"><i
                                        class="fas fa-business-time"></i> &nbsp; 09:00 - 21:00</span>
                            </div>
                            <div
                                class="footer-content-info__contact d-flex text-left align-items-center justify-content-around py-2">
                                <?php if($showWAphone) : ?>
                                <a href="https://sapp.com/send?phone=79055576669" target="_blank" title="WhatsApp"
                                    class="footer-content-info-soc__link"> <i class="fab fa-whatsapp"></i> </a>
                                <?php endif ?>
                                <?php if($showInstIcon) : ?>
                                <a href="https://www.instagram.com/dieta_pevsner.ru/" target="_blank" title="WhatsApp"
                                    class="footer-content-info-soc__link"> <i class="fab fa-instagram"></i> </a>
                                <?php endif ?>
                                <a href="mailto:zakaz@pevsner.ru?subject=Вопрос&nbsp;с&nbsp;сайта&nbsp;pevsner.ru"
                                    target="_blank" title="E-mail" class="footer-content-info-soc__link"> <i
                                        class="far fa-envelope"></i>
                                </a>
                            </div>
                        </div>

                        <div class="footer-content__img p-2 d-none d-sm-flex">
                            <img src="img/design/sections/footer/cloud.png" alt="Мы принимаем MasterCard"
                                class="img-fluid">
                        </div>

                        <div class="footer-content__add">
                            <p>ООО "УК "ФФМ", ОГРН: 1187746930117, ИНН: 9723068649, КПП: 772301001.
                            </p>
                            <p>Внешний вид блюда может отличаться от
                                фотографий, представленных на сайте. Цены в рекламных материалах на сайте являются
                                усредненными показателями и не являются
                                публичной офертой
                            </p>
                            <div class="dropdown-divider"></div>
                            <p>Оформляя заказ на сайте, Вы соглашаетесь с условиями публичной оферты и обработки
                                персональных данных :
                                <a href="../agreement.php" title="Соглашение на обработку персональных данных"
                                    target="_blank">Соглашение</a>
                                |
                                <a href="../oferta.php" title="Публичная Оферта" target="_blank">Оферта</a> |
                                <a href="../payment-rules.php" title="Правила оплаты" target="_blank">Правила оплаты</a>
                            </p>
                            <p>© 2019 Pevsner.ru — доставка еды для диетического питания
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!--modals-->

        <?php include_once 'modal_call.php'; ?>
        <?php include_once 'modal_testimonial.php'; ?>
        <!--modals end-->



        <?php if ($_SERVER['HTTP_HOST'] === 'pevsner.ru'): ?>
        <!-- Yandex.Metrika counter -->
        <script>
(function(m, e, t, r, i, k, a) {
    m[i] = m[i] || function() {
        (m[i].a = m[i].a || []).push(arguments)
    };
    m[i].l = 1 * new Date();
    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k,
        a)
})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym(54740014, "init", {
    clickmap: true,
    trackLinks: true,
    accurateTrackBounce: true,
    webvisor: true
});
        </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/54740014" style="position:absolute; left:-9999px;" alt="" /></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->



        <?php endif ?>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <!--mask in forms plugin-->
        <script src="/libs/inputmask.js/jquery.inputmask.bundle.js"></script>
        <!-- Fancybox -->
        <script src="/libs/fancybox/jquery.fancybox.min.js"></script>
        <!--Custom JS for additional-->
        <script src="/js/custom.js"></script>
        <script src="/js/menu.js"></script>
        </body>

        </html>