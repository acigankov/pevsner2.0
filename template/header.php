<?php $maintenanceMode = false ?>

<?php if ($maintenanceMode): ?>

<div class="maintenance"
    style="display: flex; align-items: center; justify-content: center; margin: 3rem auto; max-width: 90%;">
    <img src="img/maintenance.jpg" style="max-width: 100%;height: auto;" alt="">
</div>
<?php die(); ?>

<?php endif; ?>


<?php include_once 'config/config.php'; ?>

<?php

$orderUrl = $_SERVER['REQUEST_URI'];
$orderUrl = explode('?', $orderUrl);
$orderUrl = $orderUrl[0];

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Доставка еды для диетического питания" />
    <meta name="description" content="Доставка еды для диетического питания" />
    <meta property="og:title" content="Доставка еды для диетического питания">
    <meta property="og:site_name" content="pevsner.ru">
    <meta property="og:url" content="https://pevsner.ru/">
    <meta property="og:description" content="Доставка еды для диетического питания">
    <meta property="og:image" content="https://pevsner.ru/img/design/logo/logo.png">
    <meta property="og:type" content="website">
    <!--Bootstrap-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font-Awesome Css -->
    <link rel="stylesheet" href="/libs/fontawesome/css/all.css">
    <!--Fancybox css-->
    <link rel="stylesheet" href="libs/fancybox/jquery.fancybox.min.css" />
    <!-- Animate Css-->
    <link rel="stylesheet" href="/css/animate.css" />
    <!-- Main Css -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
    <title>Доставка еды для диетического питания</title>
    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '499479300709526');
    fbq('track', 'PageView');
    </script>

    <!-- End Facebook Pixel Code -->

    <?php if($orderUrl === '/order.php'):?>

    <script id="alfa-payment-script" type="text/javascript" src="https://pay2.alfabank.ru/assets/alfa-payment.js">
    </script>

    <?php endif; ?>

</head>

<body>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=499479300709526&ev=PageView&noscript=1" alt="" />
    </noscript>
    <!--button UP-->
    <div id="button-up" class="animated fadeInRightBig"><i class="fas fa-arrow-up"></i></div>
    <!--конец button UP-->
    <!--button CALL-->
    <div class="pulse d-none d-md-block" data-toggle="modal" data-target="#modal-call" data-placement="left"
        title="Хотите, мы Вам перезвоним?">
        <i class="fa fa-phone" aria-hidden="true"></i>
    </div>
    <a class="pulse d-block d-md-none" href="tel:+74955858203"><i class="fa fa-phone" aria-hidden="true"></i></a>
    <!--конец button CALL-->
    <header>
        <div class="container">
            <div class="row top-line align-items-center">
                <nav class="top-line w-100 navbar navbar-expand-md navbar-dark">

                    <div class="logo col-2 d-flex">
                        <a href="/"><img src="img/design/logo/logo.png" alt="logo" class="img-fluid"></a>
                    </div>

                    <div class="top-line__phone d-flex flex-column justify-content-between text-color-white ml-2">
                        <span class="top-line__city "><i class="fab fa-instagram" style="text-align: center;"></i>
                            &nbsp; <a href="https://www.instagram.com/dieta_pevsner.ru/"
                                target="_blank">Instagram</a></span>
                        <a href="tel:+74955858203" class="d-none d-sm-flex"><span><i
                                    class="fas fa-phone"></i></span>&nbsp; +7 (495) 585-8203</a>
                        <span class="align-items-center d-flex"><i class="fas fa-business-time"></i> &nbsp; 09:00 -
                            21:00</span>
                        <!--<button class="my-btn btn-green">перезвоните мне</button>-->
                    </div>
                    <?php if($orderUrl === '/') :?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
                        aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation-Top">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarTop">
                        <div class="navbar-nav text-uppercase text-right">
                            <a class="nav-item nav-link anchor__link" href="#how_anchor">Как это работает<span
                                    class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link anchor__link" href="#menu_anchor">Цены</a>
                            <a class="nav-item nav-link anchor__link" href="#checkout_anchor">Меню</a>
                            <a class="nav-item nav-link anchor__link" href="#contacts_anchor">Контакты</a>
                        </div>
                    </div>
                    <?php endif;?>
                </nav>
            </div>
            <div class="row">
                <a href="https://www.instagram.com/p/CGmDbQ0B_An/" target="_blank"><img class="img-fluid"
                        src="/img/design/header/banner.jpg" alt=""></a>
                <!-- <div
                    class="main-banner d-flex w-100 text-color-white align-items-center justify-content-center flex-column">
                    <img src="/img/design/header/logo-pic-white.png" alt="logo-pic" class="main-banner__logo img-fluid">
                    <div class="main-banner__text">
                        <h1>Доставка готового питания по диетическим столам Певзнера</h1>
                    </div>
                </div> -->
            </div>
        </div>
    </header>