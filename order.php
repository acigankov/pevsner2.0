<?php include_once './template/header.php'; ?>

<?php

if (isset($_GET['order_sum']) && !empty($_GET['order_sum'])) {
    $sum = (int) $_GET['order_sum'];
} else {
    $goaway = 'yes';
}

if (isset($_GET['order']) && !empty($_GET['order'])) {
    $order = (array) getFoodsetById($_GET['order']);
} else {
    $goaway = 'yes';
}

if (isset($_GET['product_code']) && !empty($_GET['product_code'])) {
    $product_code = $_GET['product_code'];
} else {
    $goaway = 'yes';
}

if (isset($_GET['days']) && !empty($_GET['days'])) {
    $days = $_GET['days'];
} else {
    $goaway = 'yes';
}

if (isset($_GET['table']) && !empty($_GET['table'])) {
    $tableFromUrl = getTableNameById($_GET['table']);
} 

?>

<?php if(isset($goaway) && $goaway==='yes'):?>
<script>
window.location.href = '/';
</script>
<?php endif;?>

<script>
//history.pushState('', document.title, window.location.pathname);
</script>



<section class="how" id="how_anchor">
    <div class="container bg-color-white">
        <div class="row">
            <div class="section-title">
                <h2>Оформить заказ</h2>
            </div>
        </div>  
        <div class="order-check" data-order-check-body>
            <div class="section-title">
                <h6>Выберите Ваш регион доставки</h6>
            </div>

            <div class="row justify-content-center pb-5">
                <button type="button" class="my-btn btn-green mr-5" data-check-region-button value="Москва и МО"><i class="fas fa-map-marker-alt"></i>&nbsp;Москва и МО</button>
                <button type="button" class="my-btn btn-green" data-check-region-button value="Ростов"><i class="fas fa-map-marker-alt"></i>&nbsp;Ростов</button>
            </div>

        </div><!-- /.order-check -->

        <div class="order-body pb-3" data-order-body>
            <!--                <div class="w-100 justify-content-center">
                                    <p>Для оформления заказа заполните форму ниже.</p>
                                </div>-->
            <dl class="row justify-content-center">
                <dt class="col-sm-3">Сумма :</dt>
                <dd class="col-sm-9 form-sum_forShow bold">
                    <?echo $sum; ?> руб.
                </dd>
                <dt class="col-sm-3">Заказ :</dt>
                <dd class="col-sm-9 form-order_forShow">
                    <?echo $order['name']; ?>
                </dd>
            </dl>

            <div class="redeem-promo">
                <form class="form-redeem-promo form-inline">
                    <div class="form-row">
                        <div class="col ">
                            <div class="input-group">
                                <input type="text" class="form-control-sm" name="redeem_code" placeholder="промокод"
                                    id="promo-input" value="" minlength="3">
                            </div>
                        </div>
                        <button class="btn btn-outline-danger btn-sm" type="submit">Применить</button>
                    </div>
                    <input type="hidden" name="form_redeem_code">
                </form>
                <small id="redeem-result_" class="form-text text-muted mb-3">Если у вас есть промокод, не забудьте его
                    применить :)</small>
            </div>

            <form class="needs-validation justify-content-center" id="form-order" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control check order-input-name" name="order-input-name"
                                placeholder="ФИО" value="" minlength="3" required>
                            <div class="invalid-feedback">
                                неверно заполнено поле
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="fas fa-map-marker-alt"></i><span data-ckecked-region-text></span></span>
                            </div>
                            <input type="text" class="form-control check" name="order-input-adress" placeholder="Адрес"
                                value="" minlength="3" required>
                            <div class="invalid-feedback">
                                неверно заполнено поле
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control check" name="order-input-tel" placeholder="Телефон"
                                minlength="3" required>
                            <div class="invalid-feedback">
                                неверно заполнено поле
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="text" class="form-control check" class="order-input-email"
                                name="order-input-email" placeholder="Email" required>
                            <div class="invalid-feedback">
                                неверный email
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select class="custom-select check" name="selected_table" id="selected_table"  required>
                            <option value="0">выберите стол</option>
                            <?php foreach ($tables as $table) : ?>
                            <option value="<?= $table['name']?>" <?echo ($tableFromUrl == $table['name']) ? 'selected' : '' ?>><?= $table['name']?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            неверно заполнено поле
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="order-comment">Комментарий к заказу</label>
                        <textarea class="form-control" name="comment" id="order-comment" rows="3"
                            placeholder="Комментарий к заказу"></textarea>
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-md-4 md-3">
                        <span class="py-2">Привезти: </span>
                        <!--<div class="form-check">
                            <input class="form-check-input check" type="radio" name="delivery_time"
                                id="deliveryTime_morning" value="Утром" checked required>
                            <label class="form-check-label " for="deliveryTime_morning">
                                Утром
                            </label>
                        </div>-->
                        <div class="form-check">
                            <input class="form-check-input check" type="radio" name="delivery_time"
                                id="deliveryTime_evening" value="Вечером" required checked>
                            <label class="form-check-label" for="deliveryTime_evening">
                                Вечером
                            </label>
                        </div>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <div class="form-row flex-column">
                    <div class="col md-3">
                        <div class="form-group">
                            <span class="py-2">Оплата: </span>
                            <div class="form-check ">
                                <input class="form-check-input check" type="radio" name="payment_type" value="1"
                                    id="order_input_check_cash" checked required>
                                <label class="form-check-label" for="order_input_check_cash">
                                    Наличными при получении
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input check" type="radio" name="payment_type" value="2"
                                    id="order_input_check_card" required>
                                <label class="form-check-label" for="order_input_check_card">
                                    Оплата картой на сайте онлайн
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input check" type="radio" name="payment_type" value="3"
                                    id="order_input_check_card_2" required>
                                <label class="form-check-label" for="order_input_check_card_2">
                                    Картой при получении
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <div class="form-row flex-column">
                    <div class="col md-3">
                        <div class="form-group">
                            <span class="py-2">Дополнительно: </span>
                            <!-- <div class="form-check">
                                <input class="form-check-input-kisel" type="checkbox" value=""
                                    id="order_input_check_kisel">
                                <label class="form-check-label-kisel" for="order_input_check_kisel">
                                    Добавить Ягодный Кисель (+100 руб / день)
                                </label>
                            </div> -->
                            <div class="form-check">
                                <input class="form-check-input-addproduct" type="checkbox" value=""
                                    id="order_input_check_addproduct">
                                <label class="form-check-label-addproduct" for="order_input_check_addproduct">
                                    Добавить Блюдо (+200 руб / день)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input check" type="checkbox" value="" id="order_input_check" required>
                        <label class="form-check-label" for="order_input_check">
                            Я прочитал и согласен с <a href="/agreement.php" target="_blank">пользовательским
                                соглашением</a>
                        </label>
                        <div class="invalid-feedback">
                            необходимо принять условия пользовательского солашения
                        </div>
                    </div>
                </div>
                <input type="hidden" name="form_order">
                <input type="hidden" class="form_order_sum" name="form_order_sum" value="<?= $sum;?>">
                <input type="hidden" class="form_order_order" name="form_order_order" value="<?= $order;?>">
                <input type="hidden" class="form_order_number" name="form_order_number" value="">
                <input type="hidden" class="form_order_product_code" name="form_order_product_code"
                    value="<?= $product_code;?>">
                <input type="hidden" class="form_order_product_days" name="form_order_product_days"
                    value="<?= $days;?>">
                <input type="hidden" class="form_order_kisel_add" name="form_order_kisel_add" value="">
                <input type="hidden" class="form_order_product_add" name="form_order_product_add" value="">
                <input type="hidden" class="form_order_regon" name="form_order_region" data-field-form-region value="" >
                <button class="my-btn btn-green" type="submit">Заказать</button>
            </form>
            <div class="result_ d-none animated fadeIn"></div>
            <div class="result_button d-none align-items-center justify-content-center py-2" s>
                <!-- <a class="btn btn-outline-success px-2" style="color:#000" id="btn-yk-url" href="#" role="button">Ваша ссылка для оплаты</a> -->
                <div id="alfa-payment-button" style="color:#000" data-amount-selector='.form_order_sum'
                    data-order-number-selector='.form_order_number' data-version='1.0' data-amount-format='rubli'
                    data-client-info-selector='.order-input-name' data-email-selector='.order-input-email'
                    data-token='sfu12nupv41kaadpsu40acof9c' data-description-selector='.form_order_order'
                    data-language='ru' data-stages='1'>
                </div>
            </div>
        </div>

</section>

<?php include_once './template/footer.php'; ?>