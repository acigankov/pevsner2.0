<?php include_once './template/header.php'; ?>

<main>


    <?php if ($timer_section) : ?>
    <section class="timer-section" id="timer-section">
        <div class="container bg-color-white">
            <div class="timer-container">
                <div class="timer-title text-center pt-3">
                    <h3>До старта продаж: </h3>
                </div>
                <ul class="timer" id="timer">
                    <li><span class="big-text" id="days">0</span><span class="small-text">дней</span></li>
                    <li><span class="big-text" id="hours">0</span><span class="small-text">часов</span></li>
                    <li><span class="big-text" id="minutes">0</span><span class="small-text">минут</span></li>
                    <li><span class="big-text" id="seconds">0</span><span class="small-text">секунд</span></li>
                </ul>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <section class="how" id="how_anchor">
        <div class="container bg-color-white">
            <div class="row">
                <div class="section-title">
                    <h2>Как это работает</h2>
                </div>
            </div>
            <div class="row">
                <div class="how-content">
                    <div class="how-content-item">
                        <img src="img/design/sections/how/icon_1.png" alt="icon" class="how-content-item__img">
                        <div class="how-content-item__descr">Вы выбираете диету, которую Вам прописал врач</div>
                    </div>
                    <div class="how-content-item">
                        <img src="img/design/sections/how/icon_2.png" alt="icon" class="how-content-item__img">
                        <div class="how-content-item__descr">мы все приготовим и бесплатно доставим по Москве</div>
                    </div>
                    <div class="how-content-item">
                        <img src="img/design/sections/how/icon_3.png" alt="icon" class="how-content-item__img">
                        <div class="how-content-item__descr">Вы получаете готовые блюда, останется только разогреть
                        </div>
                    </div>
                    <div class="how-content-item">
                        <img src="img/design/sections/how/icon_4.png" alt="icon" class="how-content-item__img">
                        <div class="how-content-item__descr">Питаетесь правильно и вкусно</div>
                    </div>
                </div>
            </div>
            <div class="row how-descr">
                <!-- <div class="how-descr-title d-flex w-100 align-items-center justify-content-between mb-1 p-2">
                    <div class="how-descr-title__logo">
                        <img src="img/design/logo/logo2.png" alt="logo" class="img-fluid">
                    </div>
                    <div class="how-descr-title__text w-100 ml-3">
                        <h3>Соблюдать диету теперь просто! </h3>
                        <span>Мы доставляем готовое диетическое питание по столам №1-15.</span>

                    </div>
                    <div class="how-descr-title__logo-right">
                        <img src="img/design/sections/how/icon_title.png" alt="logo" class="img-fluid">
                    </div>

                </div> -->
                <img src="img/design/sections/how/tables.jpg" alt="tables" class="img-fluid">
                <div class="d-flex w-100 flex-column align-items-center justify-content-center p-2">
                    <span class="text-center">Оформить заказ можно на сайте или по телефону +7 (495) 585-82-03</span>
                    <a class="anchor__link call-title__button my-btn btn-green my-5" href="#menu_anchor">заказать</a>
                </div>
            </div>
            <div class="row how-descr-content">
                <div class="col-md-6">
                    <div class="how-descr-item">
                        <div class="how-descr__badge"><i class="fas fa-check"></i></div>
                        <h3>Тщательно подобранные меню</h3>
                        <span>Для каждого из 15 столов мы разработали свое меню. Блюда содержат только разрешенные
                            для каждой диеты продукты.
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="how-descr-item">
                        <div class="how-descr__badge"><i class="fas fa-check"></i></div>
                        <h3>Доставка домой или в офис</h3>
                        <span>Каждый день мы будем доставлять вам готовые блюда по вашему адресу
                            в пределах Москвы.
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="how-descr-item">
                        <div class="how-descr__badge"><i class="fas fa-check"></i></div>
                        <h3>Удобная упаковка</h3>
                        <span>Мы доставляем блюда в специальных контейнерах, которые сохраняют свежесть продуктов.
                            Вы можете их хранить в холодильнике!
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="how-descr-item">
                        <div class="how-descr__badge"><i class="fas fa-check"></i></div>
                        <h3>Удобно использовать</h3>
                        <span>Вы можете разогреть наши блюда в простой микроволновке
                            буквально за несколько минут!
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <?php if ($showMenu) : ?>
    <section class="menu" id="checkout_anchor">
        <div class="container bg-color-white">
            <div class="row">
                <div class="section-title-img w-100 d-flex justify-content-center pt-5">
                    <img src="img/design/sections/menu/heart.png" alt="image">
                </div>
                <div class="section-title">
                    <h3>меню</h3>
                </div>
            </div>
            <div class="row">
                <div class="menu-content w-100">
                    <div class="pills-tab-line d-flex align-items-center justify-content-center bg-color-white py-3">
                        <div class="col-md-4 ">
                            <select class="custom-select" id="pills-tab-select" role="tablist">
                                <?php foreach ($tables as $table) : ?>
                                <option value="<?= $table['id']?>"><?= $table['name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <!--карусель со слайдами-->
                    <div class="tab-content pb-5" id="pills-tabContent">
                        <div class="tab-pane show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">

                            <div class="menu-table-description py-3" id="table-description">
                                Применять на протяжении 6-12 мес. после обострения язвенной
                                болезни желудка или двенадцатиперстной кишки
                            </div>

                            <div class="days-line d-flex align-items-center justify-content-center text-center pb-5">
                                <div class="col-md-8">
                                    <button class="btn-green active day-switcher" data-day-id="1">пн</button>
                                    <button class="btn-green day-switcher" data-day-id="2">вт</button>
                                    <button class="btn-green day-switcher" data-day-id="3">ср</button>
                                    <button class="btn-green day-switcher" data-day-id="4">чт</button>
                                    <button class="btn-green day-switcher" data-day-id="5">пт</button>
                                    <button class="btn-green day-switcher" data-day-id="6">сб</button>
                                    <button class="btn-green day-switcher" data-day-id="7">вс</button>
                                </div>
                            </div>

                            <div id="menu-carousel-block" class="carousel slide" data-ride="carousel"
                                data-interval="false">

                                <ol class="carousel-indicators">
                                    <li data-target="#menu-carousel-block" data-slide-to="0" class="active"></li>
                                    <li data-target="#menu-carousel-block" data-slide-to="1"></li>
                                    <li data-target="#menu-carousel-block" data-slide-to="2"></li>
                                    <li data-target="#menu-carousel-block" data-slide-to="3"></li>
                                    <li data-target="#menu-carousel-block" data-slide-to="4"></li>
                                    <li data-target="#menu-carousel-block" data-slide-to="5"></li>
                                    <li data-target="#menu-carousel-block" data-slide-to="6"></li>
                                    <li data-target="#menu-carousel-block" data-slide-to="7"></li>
                                </ol>

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="carousel-item-slide">
                                            <div class="carousel-item-img">


                                                <?php if( getCurrentWeek() == '4' || (strpos($dishes_first[0]['table_image'], 'tables/4-')!==false)) : ?>
                                                <img src="/img/design/sections/menu/no_menu_image.jpg" class="img-fluid"
                                                    id="table-image" alt="image">
                                                <?php else : ?>
                                                <img src="<?= $dishes_first[0]['table_image']?>" class="img-fluid"
                                                    id="table-image" alt="image">
                                                <?php endif; ?>


                                            </div>
                                            <div class="carousel-item-text">
                                                <div class="menu-results">
                                                    <div class="menu-results-res" id="dishes-names-all">
                                                        <!--<h5>Всего</h5>-->
                                                        <span>1. <?= $dishes_first[0]['product_name']?></span>
                                                        <span>2. <?= $dishes_first[1]['product_name']?></span>
                                                        <span>3. <?= $dishes_first[2]['product_name']?></span>
                                                        <span>4. <?= $dishes_first[3]['product_name']?></span>
                                                        <span>5. <?= $dishes_first[4]['product_name']?></span>
                                                    </div>
                                                    <div class="menu-results-res kbgu">

                                                        <span class="calories-text kbgu-calories-all">
                                                            <?= $kbgu['calories']; ?>
                                                            Ккал
                                                        </span>

                                                        <div class="menu-results-descr">
                                                            <ul class="countdown">
                                                                <li>
                                                                    <span
                                                                        class="kbgu-proteins-all"><?= $kbgu['proteins']; ?></span>
                                                                    <div>Белки</div>
                                                                </li>
                                                                <li>
                                                                    <span
                                                                        class="kbgu-fats-all"><?= $kbgu['fats']; ?></span>
                                                                    <div>Жиры</div>
                                                                </li>
                                                                <li>
                                                                    <span
                                                                        class="kbgu-carbohydrates-all"><?= $kbgu['carbohydrates']; ?></span>
                                                                    <div>Углеводы</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!--блюдо-->
                                    <?php foreach ($dishes_first as $dish) :?>
                                    <div class="carousel-item carousel-dishes">
                                        <div class="carousel-item-slide">
                                            <div class="carousel-item-img">
                                                <div class="carousel-item-img__badge shadow"><?= $dish['food_time']?></div>
                                                <img src="<?= $dish['product_image']?>" class="img-fluid" alt="image">
                                            </div>


                                            <div class="menu-results kbgu">
                                                <div class="carousel-item-text">
                                                    <h3 class="dish-name"><?= $dish['product_name']?></h3>
                                                    <span
                                                        class="dish-description">(<?= $dish['product_description']?>)</span>
                                                    <?php if($dish['product_weight']) :?>
                                                    <!-- <span class="dish-weight">(<? //$dish['product_weight']?> гр.)</span> -->
                                                    <?php endif?>
                                                </div>
                                                <div class="menu-results-res">
                                                    <span class="kbgu-calories-item">
                                                        <?php if($dish['product_calories']) : ?>
                                                        <?= $dish['product_calories']; ?>
                                                        Ккал
                                                        <?php else : ?>
                                                        Уточняйте у менеджера
                                                        <?php endif ?>

                                                    </span>



                                                    <div class="menu-results-descr">
                                                        <ul class="countdown">
                                                            <li>
                                                                <span
                                                                    class="kbgu-proteins-item"><?= $dish['product_proteins']; ?></span>
                                                                <div>Белки</div>
                                                            </li>
                                                            <li>
                                                                <span
                                                                    class="kbgu-fats-item"><?= $dish['product_fats']; ?></span>
                                                                <div>Жиры</div>
                                                            </li>
                                                            <li>
                                                                <span
                                                                    class="kbgu-carbohydrates-item"><?= $dish['product_carbohydrates']; ?></span>
                                                                <div>Углеводы</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                    <!--/блюдо-->

                                </div>

                                <a class="carousel-control-prev" href="#menu-carousel-block" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"><i
                                            class="fas fa-chevron-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#menu-carousel-block" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"><i
                                            class="fas fa-chevron-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                            <!--/карусель со слайдами-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="menu-order" id="menu_anchor">
        <div class="container bg-color-white">
            <div class="row">
                <div class="section-title-img w-100 d-flex justify-content-center pt-5">
                    <img src="img/design/sections/menu/peppers.png" alt="image">
                </div>
                <div class="section-title">
                    <h3>выберите свой план питания</h3>
                </div>
            </div>
            <div class="row menu-cards">
                <div class="menu-cards-title w-100 text-center p-3">
                    <h4 class="text-color-green text-uppercase">Мы бережно приготовим и доставим Вам диетические блюда
                    </h4>
                </div>
            </div>
            <div class="menu-cards row">

                <?php foreach ($foodsets as $foodset) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="menu-cards-content__item card shadow">
                        <div class="card-body">
                            <div class="card-title"><?= $foodset['name'] ?></div>
                            <?php if($foodset['sum_for_show'] == 1490):?>
                            <h6 class="card-subtitle"><span
                                    style="text-decoration:line-through; color: red;"><?=$foodset['sum_for_show']?></span>
                                990 руб/день</h6>
                            <?php else:?>
                            <h6 class="card-subtitle"><?=$foodset['sum_for_show']?> руб/день</h6>
                            <?php endif ?>
                            <div class="card-text">
                                <?= $foodset['description'] ?>
                            </div>
                            <div class="card-link align-items-center justify-content-center d-flex w-100 p-4">
                                <?php if($showOrderButton) : ?>
                                <a href="/order.php?order_sum=<?= $foodset['price'] ?>&order=<?= $foodset['name'] ?>&product_code=<?= $foodset['frontpad_api_id'] ?>&days=<?= $foodset['days']?>"
                                    style="color:#fff" class="my-btn btn-green" type="button"
                                    data-sum="<?= $foodset['price'] ?>" aria-disabled="true">заказать</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>
    </section>

    <section class="banner" id="banner">
        <div class="container bg-color-white">
            <div class="banner__img d-flex align-items-center justify-content-center w-100 py-3">
                <a class="anchor__link" href="#checkout_anchor">
                    <img src="img/design/sections/banner/banner-big.png" alt="banner"
                        class="img-fluid banner__img_big d-none d-md-inline">
                    <img src="img/design/sections/banner/banner-mob.png" alt="banner"
                        class="img-fluid banner__img_mob d-md-none">
                </a>
            </div>
        </div>
    </section>


    <section class="testimonials" id="testimonials">
        <div class="container bg-color-white">
            <div class="row">
                <div class="section-title">
                    <h3>Отзывы</h3>
                </div>
            </div>
            <div class="row">
                <div id="carousel-testimonials" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($testimonials as $key => $t) : ?>
                        <div class="carousel-item <?php if ($key == 0) {echo 'active';}?>">
                            <div class="testimonial-slide d-flex flex-column">

                                <h3><?= $t['author'] ?></h3>
                                <span class="testimonial-slide__date py-2">
                                    <?= date('d.m.Y', strtotime($t['date_add'])) ?>
                                </span>

                                <?php if($t['image']) : ?>
                                <a href="<?= $t['url'] ?>" target="_blank">
                                    <img src="<?= $t['image'] ?>" alt="" class="img-fluid shadow">
                                </a>
                                <?php endif; ?>
                                <p class="testimonial-slide__text py-3"><?= $t['text'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-testimonials" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-testimonials" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <button class="my-btn btn-green" type="button" data-toggle="modal"
                    data-target="#modal-testimonial">написать отзыв</button>
            </div>
        </div>
    </section>



    <section class="map">
        <div class="container bg-color-white">
            <div class="row">
                <div class="section-title">
                    <h3>Зона Доставки</h3>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="pevsner__img">
                        <img src="img/design/sections/map/truck.gif" alt="Чух-Чух" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pevsner__text">
                        <p>Доставка осуществляется бесплатно по Москве.</p>
                        <ul>
                            <li>От 0 до 5 км от МКАД - бесплатно</li>
                            <li>От 5 до 10 км от МКАД - 100₽</li>
                            <li>От 10 до 20 км от МКАД - 200₽</li>
                            <li>От 20 до 30 км от МКАД - 300₽</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <img src="/img/design/sections/map/map.jpg" alt="map" class="img-fluid shadow map-img">

            </div>
        </div>
    </section>

    <?php if ($showSectionAkcii) : ?>
    <section class="akcii">
        <div class="container bg-color-white">
            <div class="row">
                <div class="section-title">
                    <h3>Специальные предложения</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <?php foreach($akcii as $item) : ?>
                <div class="col-md-6 p-2">
                    <a href="#" class="akcii__item shadow" data-id="<?= $item['id']?>">
                        <img src="<?= $item['image']?>" alt="<?= $item['name']?>" class="img-fluid ">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif;?>

    <section class="woman-section">
        <div class="container bg-color-white">
            <div class="woman pt-5">
                <div class="row">
                    <div class="section-title">
                        <h3>Мнение Эксперта</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 align-items-center d-flex">
                        <div class="woman-description">
                            <p>
                                Я изучаю взаимосвязь питания и здоровья более пяти лет и могу с уверенностью сказать,
                                что
                                многие проблемы со здоровьем, такие как гастрит, панкреатит и т.д. можно решить с
                                помощью диетотерапии. Поэтому с удовольствием решила присоединиться к проекту
                                Pevsner.ru.
                            </p>
                            <p>Жители столицы теперь могут вкусно и разнообразно питаться, не тратя время на готовку.
                            </p>
                            <p>Если Вам нужна индивидуальная консультация по питанию или услуга food - коучинг, я всегда
                                открыта для общения в Instagram.
                            </p>
                            <a href="https://www.instagram.com/dasha_nutritionist/"
                                target="_blank">@dasha_nutritionist&nbsp;<i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="woman-image">
                            <img class="img-fluid shadow" src="/img/design/sections/woman/woman.jpg" alt="woman">
                        </div>
                        <div class="woman-title text-center py-3 ">
                            <h3>Будыко Дарья Николаевна</h3>
                            <span>Нутрициолог, Коуч по питанию</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if($showSectionFaq) : ?>
    <section class="faq" id="faq">
        <div class="container pb-5 bg-color-white w-80">
            <div class="row">
                <div class="section-title">
                    <h3>FAQ</h3>
                </div>
            </div>
            <div id="accordion">
                <?php foreach($faqs as $faq) : ?>
                <div class="card">
                    <div class="card-header" id="heading-<?= $faq['id']?>">
                        <h5 class="mb-0">
                            <button class="btn faq-title-item" data-toggle="collapse"
                                data-target="#collapse-<?= $faq['id']?>" aria-expanded="true"
                                aria-controls="collapse-<?= $faq['id']?>">
                                <?= $faq['title']?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse-<?= $faq['id']?>" class="collapse" aria-labelledby="heading-<?= $faq['id']?>"
                        data-parent="#accordion">
                        <div class="card-body">
                            <?= $faq['text']?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif;?>

    <section class="call" id="contacts_anchor">
        <div class="container bg-color-white">
            <div class="row">
                <div class="section-title-img w-100 d-flex justify-content-center">
                    <img src="img/design/sections/call/apple.png" alt="image">
                </div>
                <div class="section-title">
                    <h3 class="text-color-green">Узнайте больше про наше меню</h3>
                </div>
            </div>
            <div class="row">
                <div class="call-title w-100 d-flex flex-column align-items-center justify-content-center">
                    <span class="call-title__text py-2">Мы готовим по всем 15 диетам/столам.
                        Просто скажите какую диету прописал вам врач
                        и мы подготовим для вас меню.
                    </span>
                    <div class="section-title">
                        <h3 class="text-color-green">Остались вопросы? закажи обратный звонок</h3>
                    </div>
                    <a class="call-title__button my-btn btn-green mt-2 mb-5" href="#menu_anchor" data-toggle="modal"
                        data-target="#modal-call">заказать</a>
                </div>
            </div>
        </div>
    </section>

    <section class="promotion">
        <div class="container bg-color-white">
            <div class="row ">
                <div class="section-title bg-color-green">
                    <h3>Есть промокод ?</h3>
                </div>
            </div>
            <div class="row">
                <div class="promotion-content d-flex py-4 w-100 align-items-center justify-content-center flex-column">
                    <div class="promotion-content__text">
                        <span class="d-block mb-4 text-muted col text-center">Для получения промокода введите кодовое
                            слово в поле ниже.</span>
                    </div>
                    <form class="form-get-promo form-inline">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="keyword" placeholder="Кодовое слово"
                                    value="" minlength="5" maxlength="20" required>
                            </div>
                            <div class="col">
                                <button class="btn text-uppercase btn-secondary bg-color-green" type="submit">Получить
                                    код</button>
                            </div>
                            <input type="hidden" name="form_get_promo_by_keyword">
                        </div>
                    </form>
                    <div class="form-get-promo-result d-none pt-5">
                        <span>Ваш промокод : <strong class="text-uppercase result__"></strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="info">
        <div class="container bg-color-gray">
            <div class="row info-content align-items-center justify-content-center py-5">
                <div class="col-md-8">
                    <div class="w-100 d-flex flex-column">
                        <div class="info-item">
                            <div class="info-item__img">
                                <img src="img/design/sections/info/1.png" alt="icon" class="img-fluid">
                            </div>
                            <div class="info-item__text">
                                <h5 class="text-color-green text-uppercase">СТРОГО ПРИДЕРЖИВАЕМСЯ МЕНЮ СТОЛОВ №1-15
                                </h5>
                                <span>Меню проработано с учетом всех особенностей
                                    отдельных столов №1-15.
                                    Мы используем только разрешенные ингредиенты.
                                </span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-item__img">
                                <img src="img/design/sections/info/2.png" alt="icon" class="img-fluid">
                            </div>
                            <div class="info-item__text">
                                <h5 class="text-color-green text-uppercase">ТОЛЬКО НАТУРАЛЬНЫЕ ПРОДУКТЫ</h5>
                                <span>Мы не используем консерванты, красители, усилители вкуса и ГМО в приготовлении
                                    блюд.
                                    Все соусы, включая майонез готовятся на нашем производстве только
                                    из натуральных компонентов.
                                </span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-item__img">
                                <img src="img/design/sections/info/3.png" alt="icon" class="img-fluid">
                            </div>
                            <div class="info-item__text">
                                <h5 class="text-color-green text-uppercase">ОСТАЕТСЯ ТОЛЬКО РАЗОГРЕТЬ</h5>
                                <span>Все блюда упакованы в контейнеры сохраняющие
                                    свежесть и вкус наших блюд.
                                    На каждом контейнере указывается номер очередности,
                                    так что вам останется только разогреть!
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item__img-big text-center">
                        <img src="img/design/sections/info/big.png" alt="image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php if($showPevsnerSection) : ?>
    <section class="pevsner">
        <div class="container bg-color-white">
            <div class="row align-items-center pb-5">
                <div class="col-md-6">
                    <div class="pevsner__text">
                        Мануил Исаакович Певзнер (20 июня 1872 — 23 мая 1952) —
                        терапевт, один из организаторов Института питания в Москве и
                        основоположников диетологии и клинической гастроэнтерологии в СССР,
                        заслуженный деятель науки РСФСР (1936). Профессор Центрального института
                        усовершенствования врачей (с 1932).
                        Разработал систему из 15 диет по группам заболеваний.
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pevsner__img">
                        <img src="img/design/sections/pevsner/pevsner.jpg" alt="Мануил Исаакович Певзнер"
                            class="img-fluid shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php include_once './template/footer.php';?>