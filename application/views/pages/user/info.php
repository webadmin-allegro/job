<div class="container">


    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Мои объявления</a></li>
        <li><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Профиль</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">

            <div class="control_center">

                <div class="menu-control_center row">
                    <div class="col-xs-12">
                        <h3 id="go_to-letter1" class="menu_element">Объявления</h3>
                        <h3 id="go_to-letter5" class="menu_element">Сообщения</h3>
                    </div>
                </div>
                <div id="hide-show-vac">

                    <div class="objavlenie">

                        <?php if ($resume) foreach ($resume as $v):?>
                        <div class="post-control_center row">
                            <div class="col-xs-12">

                                <div class="image_for-vac">
                                    <?php if ($user->img) $img = '/media/users/'.$user->email.'/'.$user->img; else $img = '/media/img/non-photo.png'; ?>
                                    <img width="100" height="100" src="<?php echo $img; ?>"  title="Логотип обьявления" alt="Изображения обьявления">
                                </div>
                                <div class="data">
                                    <p>Дата добавления</p>
                                    <p><?php echo date('d-m-Y',$v['created']); ?></p>
                                </div>
                                <div class="data" style="width: 120px; margin-left: 25px">
                                    <?php if($v['active'] == 1):?>
                                    <p><a href="/resume/<?php echo $v['id'];?>">Ваше резюме размещено</a></p>
                                    <?php  elseif($v['active'] == 2):?>
                                        <p>Ваше резюме заблокировано ! Свяжитесь с администратором.</p>
                                    <?php elseif($v['active'] == 3):?>
                                        <p>Ваше резюме не показывается на сайте</p>
                                        <?php else:?>
                                        <p>На модерации</p>
                                    <?php endif; ?>
                                </div>
                                <div class="about_this-job" style="min-width: 390px;width: auto;">
                                    <h5><?php echo $v['position']; ?></h5>
                                </div>
                                <a href="">
                                    <div class="messages_button">
                                        <p>1</p>
                                        <img src="/media/img/w512h3361380476923mail.png" title="Сообщения" alt="Massage">
                                    </div>
                                </a>
                                <div class="add_the-ad">
                                    <button class="button-main">рекламировать</button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Действия</button>
                                    <ul class="dropdown-menu">
                                        <li><a href="/resume/edit/<?php echo $v['id']?>">Редактировать</a></li>
                                        <?php if($v['active'] == 1 || $v['active'] == 3):?>
                                            <li>
                                                <a data-action="hidden" data-rel="<?php echo $v['active']?>" data-id="<?php echo $v['id']?>" data-hash="<?php echo Security::token();?>" class="hidden_resume" href="#">Скрыть/Показать на сайте</a>
                                            </li>
                                        <?php endif;?>
                                        <li><a data-action="del" data-id="<?php echo $v['id']?>" data-hash="<?php echo Security::token();?>" class="hidden_resume" href="#">Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

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

        </div>
        <div role="tabpanel" class="tab-pane" id="profile">

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
    </div>

</div>

<script>
    $('.hidden_resume').on('click', function() {

        var action = $(this).data("action");

        if (action == 'del') {
            var text = 'Вы уверены что хотите удалить !';
            var rel = null;
        }else{
            var text = 'Если вы уверены подтвердите действие !';
            var rel = $(this).data("rel");
        }

        if (confirm(text)) {

            var id = $(this).data("id");
            var hash = $(this).data("hash");

            $.post('/resume/hidden_resume/',{id:id,hash:hash,action:action,rel:rel}, function (data) {

                if (data == 1){
                    window.location.reload();
                }
            });
        }
    });
</script>
 