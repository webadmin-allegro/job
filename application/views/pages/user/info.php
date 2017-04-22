<div class="container">

    <div class="row">
        <div class="col-xs-12">
            <div class="my_money">
                <div class="my_money-score">
                    <p>Ваш счет:</p>
                    <h2>4.79</h2>
                </div>
                <div class="my_money-button">
                    <button type="button" name="button">пополнить счет</button>
                </div>

                <div style="margin-top: 10px; margin-left: 13px; display: inline-block;">
                    <?php if ($user->img): ?>
                    <img width="70" height="70" src="/media/users/<?php echo $user->email; ?>/<?php echo $user->img; ?>">
                     <?php else: ?>
                        <img width="70" height="70" src="/media/images/nophoto.jpg">
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <div class="personal">
        <div class="block">
            <div class="row">
                <div class="col-xs-5">
                    <p><strong>Личный кабинет</strong></p>
                </div>
                <div class="col-xs-7"></div>
            </div>
            <div class="personal_name">
                <div class="row">
                    <div class="col-xs-5">
                        <p>ФИО</p>
                    </div>
                    <div class="col-xs-7">
                        <input class="input_width" type="text" value="<?php echo $user->username; ?>">
                        <button class="button-main" type="button" name="button">Изменить</button>
                    </div>
                </div>
            </div>
            <div class="change_password">
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Изменить пароль</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Старый пароль</p>
                    </div>
                    <div class="col-xs-7">
                        <input type="password" class="input_width">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Новый пароль</p>
                    </div>
                    <div class="col-xs-7">
                        <input type="password" class="input_width">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5"></div>
                    <div class="col-xs-7">
                        <p><input type="checkbox"> Показывать пароль</p>
                        <button class="button-main">Изменить</button>
                    </div>
                </div>
            </div>
            <div class="personal_email-tel">
                <div class="row">
                    <div class="col-xs-12">
                        <p><strong>Изменить E-mail/Телефон</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Телефон</p>
                    </div>
                    <div class="col-xs-7">
                        <input type="tel" class="input_width" value="<?php echo $user->phone; ?>">
                        <small>(телефон указывается в международном формате)</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Старый e-mail</p>
                    </div>
                    <div class="col-xs-7">
                        <input type="email" class="input_width" value="<?php echo $user->email; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <p>Новый e-mail</p>
                    </div>
                    <div class="col-xs-7">
                        <input type="email" class="input_width">
                        <button class="button-main">Изменить</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="control_center">
        <div class="header-control_center row" >
            <div class="col-xs-12">
                <h3>Платежи и счёт</h3>
            </div>
        </div>
        <div class="menu-control_center row">
            <div class="col-xs-12">
                <div id="go_to-letter1" class="menu_element">Объявления</div>
                <div id="go_to-letter2" class="menu_element">Активные</div>
                <div id="go_to-letter3" class="menu_element">Удаленные</div>
                <div id="go_to-letter4" class="menu_element">Ожидающие</div>
                <div id="go_to-letter5" class="menu_element">Сообщения</div>
            </div>
        </div>
        <div id="hide-show-vac">
            <div class="header-post-control_center row">
                <div class="col-xs-12">
                    <h2>Активные объяления</h2>
                </div>
            </div>
            <div class="choto row">
                <div class="col-xs-12">
                    <input type="checkbox"> Выделить все
                </div>
            </div>
            <div class="objavlenie">
                <div class="post-control_center row">
                    <div class="col-xs-12">
                        <input class="top1" type="checkbox">
                        <div class="data">
                            <p>1.11.1111</p>
                            <p>2.12.2012</p>
                        </div>
                        <div class="image_for-vac">
                            <img src="img/call-center-woman-resized-600.png" alt="img">
                        </div>
                        <div class="about_this-job">
                            <h5>Повар 23 года Украина Киев опыт роботы 5 лет</h5>
                        </div>
                        <a href="">
                            <div class="messages_button">
                                <p>1</p>
                                <img src="img/w512h3361380476923mail.png" alt="">
                            </div>
                        </a>
                        <div class="add_the-ad">
                            <button class="button-main">рекламировать</button>
                        </div>
                    </div>
                </div>
                <div class="post-control_center row">
                    <div class="col-xs-12">
                        <input type="checkbox">
                        <div class="data">
                            <p>1.11.1111</p>
                            <p>2.12.2012</p>
                        </div>
                        <div class="image_for-vac">
                            <img src="img/call-center-woman-resized-600.png" alt="img">
                        </div>
                        <div class="about_this-job">
                            <h5>Повар 23 года Украина Киев опыт роботы 5 лет</h5>
                        </div>
                        <a href="">
                            <div class="messages_button">
                                <p>1</p>
                                <img src="img/w512h3361380476923mail.png" alt="">
                            </div>
                        </a>
                        <div class="add_the-ad">
                            <button class="button-main">рекламировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="hide-show-letter">
            <div class="row top_line">
                <div class="col-xs-12 sorting">
                    <a href="">Полученные</a>
                    <a href="">Отправленные</a>
                </div>
            </div>
            <div class="row top_line">
                <div class="col-xs-12">
                    <h3>Поиск по запросу</h3>
                </div>
                <div class="col-xs-7">
                    <p>Показать входящие сообщения для:
                        <select class="input_width">
                            <option value="">Все входящии сообщения</option>
                            <option value="">Все исходяще сообщения</option>
                        </select>
                    </p>
                </div>
                <div class="col-xs-5">
                    <p>Фильтровать сообщения:
                        <select class="input_width">
                            <option value="">Все</option>
                            <option value="">Не все</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="row top_line">
                <div class="col-xs-1">
                    <input type="checkbox">
                </div>
                <div class="col-xs-1"></div>
                <div class="hide-menu">
                    <div class="col-xs-3">
                        <h5>Пользователь</h5>
                    </div>
                    <div class="col-xs-5">
                        <h5>Объявление</h5>
                    </div>
                    <div class="col-xs-2">
                        <h5>Дата</h5>
                    </div>
                </div>
            </div>
            <div class="row letter top_line">
                <div class="col-xs-12 col-sm-2">
                    <input type="checkbox">
                    <div class="glyphicon">
                        <a href=""><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
                        <a href=""><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <h5>Пользователь 1</h5>
                </div>
                <div class="col-xs-12 col-sm-5 overflow">
                    <h5><strong>Работа по строительсту в Израиле</strong></h5>
                    <p>Звоните в вайбере +3035464688</p>
                </div>
                <div class="col-xs-12">
                    <p class="float_right">Вчера, 11:52</p>
                </div>
            </div>
            <div class="row letter top_line">
                <div class="col-xs-12 col-sm-2">
                    <input type="checkbox">
                    <div class="glyphicon">
                        <a href=""><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
                        <a href=""><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <h5>Пользователь 1</h5>
                </div>
                <div class="col-xs-12 col-sm-5 overflow">
                    <h5><strong>Работа по строительсту в Израиле</strong></h5>
                    <p>Звоните в вайбере +3035464688</p>
                </div>
                <div class="col-xs-12">
                    <p class="float_right">Вчера, 11:52</p>
                </div>
            </div>
            <div class="row letter top_line">
                <div class="col-xs-12 col-sm-2">
                    <input type="checkbox">
                    <div class="glyphicon">
                        <a href=""><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
                        <a href=""><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <h5>Пользователь 1</h5>
                </div>
                <div class="col-xs-12 col-sm-5 overflow">
                    <h5><strong>Работа по строительсту в Израиле</strong></h5>
                    <p>Звоните в вайбере +3035464688</p>
                </div>
                <div class="col-xs-12">
                    <p class="float_right">Вчера, 11:52</p>
                </div>
            </div>
            <div class="row letter top_line">
                <div class="col-xs-12 col-sm-2">
                    <input type="checkbox">
                    <div class="glyphicon">
                        <a href=""><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
                        <a href=""><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <h5>Пользователь 1</h5>
                </div>
                <div class="col-xs-12 col-sm-5 overflow">
                    <h5><strong>Работа по строительсту в Израиле</strong></h5>
                    <p>Звоните в вайбере +3035464688</p>
                </div>
                <div class="col-xs-12">
                    <p class="float_right">Вчера, 11:52</p>
                </div>
            </div>
        </div>
    </div>
    <div class="two-big_button">
        <div class="row">
            <div class="col-sm-7 col-xs-12">
                <button class="button-main">Поиск работы с помощью кадрового агентства</button>
            </div>
            <div class="col-sm-5 col-xs-12">
                <button class="button-main">Удалить аккаунт</button>
            </div>
        </div>
    </div>
</div>
 