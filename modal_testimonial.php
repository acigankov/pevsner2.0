<!-- Modal -->

<div class="modal fade" id="modal-testimonial" tabindex="-1" role="dialog" aria-labelledby="modal_testimonialTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_testimonialTitle">Ваш отзыв важен!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="needs-validation" id="form-testimonial" action="libs/mail.php" method="post" novalidate>
                    <div class="form-row">
                        <div class="col mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control name_mask check" name="testimonial_input_name"
                                    placeholder="Имя" value="" required>
                                <div class="invalid-feedback">
                                    неверное имя
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
                                <input type="text" class="form-control tel_mask check" name="testimonial_input_tel"
                                    placeholder="Телефон" minlength="3" required>
                                <div class="invalid-feedback">
                                    неверный телефон
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label for="testimonial-comment">Текст сообщения <span class="symbols">0/200</span></label>
                            <textarea class="form-control check" name="testimonial" id="testimonial-comment" rows="3"
                                placeholder="Напишите отзыв" minlength="10" maxlength="200" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" id="testimonial_input_check" value=""
                                required>
                            <label class="form-check-label" for="testimonial_input_check">
                                Я прочитал и согласен с <a href="/agreement.php" target="_blank">пользовательским
                                    соглашением</a>
                            </label>
                            <div class="invalid-feedback">
                                необходимо принять условия пользовательского солашения
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="form_testimonial">
                    <button class="my-btn btn-green" type="submit">Отправить</button>
                </form>

                <div class="result_ d-none animated fadeIn"></div>

            </div>
        </div>
    </div>
</div>