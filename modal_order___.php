<!-- Modal -->
<div class="modal fade" id="modal-order" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Оформить заказ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--                <div class="w-100 justify-content-center">
                                    <p>Для оформления заказа заполните форму ниже.</p>
                                </div>-->
                <dl class="row">
                    <dt class="col-sm-3">Сумма :</dt>
                    <dd class="col-sm-9 form-sum_forShow"></dd>
                    <dt class="col-sm-3">Заказ :</dt>
                    <dd class="col-sm-9 form-order_forShow"></dd>
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
                    <small id="redeem-result_" class="form-text text-muted mb-3">Если у вас есть промокод, не забудьте
                        его применить :)</small>
                </div>

                <form class="needs-validation" id="form-order" novalidate>
                    <div class="form-row">
                        <div class="col mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control check" name="order-input-name" placeholder="ФИО"
                                    value="" minlength="3" required>
                                <div class="invalid-feedback">
                                    неверно заполнено поле
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control check" name="order-input-adress"
                                    placeholder="Адрес" value="" minlength="3" required>
                                <div class="invalid-feedback">
                                    неверно заполнено поле
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control check" name="order-input-tel"
                                    placeholder="Телефон" minlength="3" required>
                                <div class="invalid-feedback">
                                    неверно заполнено поле
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" class="form-control check" name="order-input-email"
                                    placeholder="Email" required>
                                <div class="invalid-feedback">
                                    неверный email
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label for="order-comment">Комментарий к заказу</label>
                            <textarea class="form-control" name="comment" id="order-comment" rows="3"
                                placeholder="Комментарий к заказу"></textarea>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col md-3">
                            <span class="py-2">Привезти: </span>
                            <div class="form-check">
                                <input class="form-check-input check" type="radio" name="delivery_time"
                                    id="deliveryTime_morning" value="Утром" checked required>
                                <label class="form-check-label " for="deliveryTime_morning">
                                    Утром
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input check" type="radio" name="delivery_time"
                                    id="deliveryTime_evening" value="Вечером" required>
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

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" value="" id="order_input_check"
                                required>
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
                    <input type="hidden" name="form_order_sum" value="">
                    <input type="hidden" name="form_order_order" value="">
                    <button class="my-btn btn-green" type="submit">Заказать</button>
                </form>
                <div class="result_ d-none animated fadeIn"></div>
                <div class="result_button d-none align-items-center justify-content-center py-2">
                    <a class="btn btn-outline-success px-2" style="color:#000" id="btn-yk-url" href="#"
                        role="button">Ваша ссылка для оплаты</a>
                </div>
            </div>
        </div>
    </div>


</div>