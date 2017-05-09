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
                        <div class="col-xs-7 radios-as-buttons">
                            <div class="input">
                                <input id="applicant"  type="radio" name="emp_applic" required value="1">
                                <label for="applicant">Соискатель</label>
                            </div>
                            <div class="input ">
                                <input id="employer"  type="radio" name="emp_applic" value="2">
                                <label for="employer">Работодатель</label>
                            </div>
                            <div style="float: right;">
                                <p><span>*</span> Обязательные поля</p>
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
                                <p>Телефон<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <input class="input_width" type="tel" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden employer">
                        <div class="phone_number">
                            <div class="col-xs-5">
                                <p>Название вашей компании<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <input class="input_width" type="text" name="company_name">
                            </div>
                        </div>
                    </div>
                    <div class="row hidden employer">
                        <div class="phone_number">
                            <div class="col-xs-5">
                                <p>Ваша должность<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <input class="input_width" type="text" name="profession">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="phone_number">
                            <div class="col-xs-5">
                                <p>Ваше местоположение<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <input class="input_width" type="text" name="residence" required>
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
                                <input id="password1" required class="input_width" type="password" name="password" minlength="8">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="password">
                            <div class="col-xs-5">
                                <p>Подтверждение пароля <span>*</span></p>
                            </div>
                            <div class="col-xs-7"><span id="password22"></span>
                                <input id="password2" required class="input_width" type="password" name="password_" minlength="8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">

                    <div class="row">
                        <div class="reg_site">
                            <div class="col-xs-5 f_logo">
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

        <script>
            $('input[name=emp_applic]').on('click', function(){
               var val = $( this ).val();
               if (val == 2){
                   $('div.employer').attr('style','display:block !important;').find('input[type=text]').prop('required',true);
                   $('.reg_site .f_logo p').text('Логотип');
               }else{
                   $('div.employer').attr('style','display:none').find('input[type=text]').prop('required',false);
                   $('.reg_site .f_logo p').text('Фото');
               }
            });
        </script>

    </div>
</div>
</div>