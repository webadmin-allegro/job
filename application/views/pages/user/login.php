<div class="container">
    <div class="row new">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 col-xs-12">
            <div class="login-wrapper">
                <h3>Вход в личный кабинет</h3>
                <div class="block">
                    <form method="post">
                        <div class="my-row">
                            <div class="text-zona">
                                <p>E-mail <span> *</span></p>
                            </div>
                            <div class="input-zona">
                                <input type="email" required class="input_width" name="email">
                            </div>
                        </div>
                        <div class="my-row">
                            <div class="text-zona">
                                <p>Пароль <span> *</span></p>
                            </div>
                            <div class="input-zona">
                                <input type="password" required class="input_width" name="password" minlength="8">
                            </div>
                        </div>

                        <div class="my-row">
                            <div class="text-zona" style="margin-left: 10px">
                            <p>Или войдите - </p>
                            <?php echo Ulogin::factory(array('type'=>'panel'))->render('panel') ?>
                            </div>
                        </div>

                        <div class="my-row">
                            <div class="button-zona">
                                <button class="main-button" type="submit" name="button">Войти</button>
                                <button onclick="window.location.href='/user/create'" class="main-button" type="button" name="button">Регистрация</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>

</div>
</div>