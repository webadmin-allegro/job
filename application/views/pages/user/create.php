<script src="/media/js/register.js"></script>
<div class="reg_wrapper">
    <div class="container">
        <h3 style="color: red;"><?php if (!empty ($errors) && is_array($errors)) foreach( $errors as $v) echo $v;?></h3>
        <form method="post" enctype="multipart/form-data">
            <div class="main_form new reg_user">
                <h3 class="reg_user">Регистрация</h3>
                <div class="block">
                    <div class="row">
                        <div class="col-xs-5"></div>
                        <div class="col-xs-7">
                            <div class="input">
                                <input id="applicant"  type="radio" name="select" required value="1">
                                <label for="applicant">Соискатель</label>
                            </div>
                            <div class="input">
                                <input id="employer"  type="radio" name="select" value="2">
                                <label for="employer">Работодатель</label>
                            </div>
                            <div class="">
                                <P><span>*</span> Обязательные поля</P>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="row">
                        <div class="full_name">
                            <div class="col-xs-5">
                                <p>Ф.И.О <span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <input required class="input_width" type="text" name="username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="phone_number">
                            <div class="col-xs-5">
                                <p>Телефон</p>
                            </div>
                            <div class="col-xs-7">
                                <input class="input_width" type="tel" name="phone">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="block">
                    <div class="row">
                        <div class="email">
                            <div class="col-xs-5">
                                <p>email <span>*</span></p>
                            </div>
                            <div class="col-xs-7 ">
                                <input required class="input_width" type="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="password">
                            <div class="col-xs-5">
                                <p>Пароль <span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <input required class="input_width" type="password" name="password" minlength="8">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="password">
                            <div class="col-xs-5">
                                <p>Подтверждение пароля <span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <input required class="input_width" type="password" name="password_" minlength="8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                        <div class="row">
                            <div class="reg_name_company">
                                <div class="col-xs-5">
                                    <p>Название компании</p>
                                </div>
                                <div class="col-xs-7">
                                    <input required class="input_width" type="text" >
                                    <div>
                                        <input type="radio" name="sfera" value=""> Прямой работодатель
                                    </div>
                                    <div>
                                        <input type="radio" name="sfera" value=""> Кадровое агентство
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="reg_branch">
                                <div class="col-xs-5">
                                    <p>Отрасль <span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    <select required class="input_width" name="profession">
                                        <option>Сельское хозяйство</option>
                                        <option>Строительство, архитектура</option>
                                        <option>Сфера обслуживания</option>
                                        <option>Транспорт, водители</option>
                                        <option>Рабочие специальности, производство</option>
                                        <option>Другие сферы деятельности</option>
                                        <option>Гостинично ресторанный бизнес</option>
                                        <option>Охрана безопасность</option>
                                        <option>Красота, бизнес, спорт</option>
                                        <option>Издательство, полиграфия</option>
                                        <option>Работа для студентов</option>
                                        <option>Работа на дому</option>
                                        <option>IT</option>
                                        <option>Администрация, руководство среднего звена</option>
                                        <option>Бухгалтерия, аудит</option>
                                        <option>Дизайн, творчество</option>
                                        <option>Культура, музыка, шоу-бизнес</option>
                                        <option>Логистика, склад, ВЭД</option>
                                        <option>Маркетинг, реклама, PR</option>
                                        <option>Медицина, фармацевтика</option>
                                        <option>Образование, наука</option>
                                        <option>Секретариат, делопроизводство</option>
                                        <option>Топ-менеджмент, руководство высшего звена</option>
                                        <option>Телекоммуникации и связь</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="reg_country">
                                <div class="col-xs-5">
                                    <p>Страна <span>*</span></p>
                                </div>
                                <div class="col-xs-7">
                                    <select required class="input_width">
                                        <option>Австрия</option>
                                        <option>Болгария</option>
                                        <option>Германия</option>
                                        <option>Испания</option>
                                        <option>Лихтенштейн</option>
                                        <option>Монако</option>
                                        <option>Россия</option>
                                        <option>Словения</option>
                                        <option>Швейцария</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="reg_site">
                                <div class="col-xs-5">
                                    <p>Сайт</p>
                                </div>
                                <div class="col-xs-7">
                                    <input class="input_width" type="text" name="site">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="reg_site">
                            <div class="col-xs-5">
                                <p>Фото</p>
                            </div>
                            <div class="col-xs-7">
                                <div class="pull-left photo_album">
                                    <div class="fon"></div>
                                    <input type="hidden" class='additional_image_url' id="additionalImages_1" name="additionalImages1">
                                    <div id="frame_for_img_1" class="photo-block">
                                        <span class="helper"></span>
                                        <img src="/media/images/select-picture.png"
                                             class="img-polaroid selectPictureNew"
                                             style="max-width: 90px;max-height: 90px;"  >
                                    </div>
                            </div>
                                <div class="btn-group f-s_0 btn-group_u" style="">
                                    <label class="btn btn-small create_reg" for="fileImg_1"
                                           data-rel="tooltip"
                                           data-title="Добавить" >
                                        <i class="icon-edit"></i>
                                        <input type="file" class="btn-small btn fileImgNew" id="fileImg_1"  name="additionalImages_1" data-url="file2" data-rel="#frame_for_img_1">
                                        <input type="hidden" class='additional_image_url' id='add_img_urls_1' name='add_img_urls_1'>
                                    </label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="reg_submit">
                            <div class="col-xs-5"></div>
                            <div class="col-xs-7">
                                <div class="">
                                    <input required type="checkbox" >
                                    Согласен с <a href="#">правилами сайта</a> и <a href="#">политикой конфиденциальности</a>
                                </div>
                                <div class="button_reg_sub">
                                    <button type="submit">Регистрация</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>


            </div>
        </form>

    </div>
</div>
</div>