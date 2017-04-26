<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -&gt; Добавить резюме
    </div>
</div>

<div class="add_vac">
    <div class="container">
        <h3 style="color: red;"><?php if (!empty ($errors) && is_array($errors)) foreach( $errors as $v) echo $v.'<br>';?></h3>
        <div class="main_form new">
            <form id="form_for_all" enctype="multipart/form-data" method="post" name="my_forms">
                <div class="block">
                    <div class="info_vac">
                        <div class="row">
                            <div class="col-xs-5">
                                <h4>Информация о Резюме</h4>
                            </div>
                            <div class="col-xs-7 right">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">

                    <div class="row">
                        <div class="country_vac">
                            <div class="col-xs-5">
                                <p>Ваше ФИО<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    <input id="username_" class="border_illusion" required type="text" name="username" value="<?php echo $user->username;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vac_town">
                            <div class="col-xs-5">
                                <p>Ваше место жительства<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    <input class="border_illusion" required type="text" name="location" value="<?php echo $user->residence;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row education_block">
                        <div class="vac_worktime">
                            <div class="col-xs-5">
                                <p>Ваше образование<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <p>Название учебного заведения:</p>
                                <input class="border_illusion" required type="text" name="education[name][]">
                                <p></p>
                                <p>Выберите уровень образования</p>
                                <select id="typeId" name="education[type][]" class="input-block-level" required style="width: 233px;">
                                    <option></option>
                                    <option value="1">высшее</option>
                                    <option value="2">неоконченное высшее</option>
                                    <option value="3">средне-специальное</option>
                                    <option value="4">среднее</option>
                                </select>
                                <p></p>
                                <p class="margin-mmm">Годы обучения:</p>
                                <p>с <input class="border_illusion" type="number" required name="education[on][]"> по <input required name="education[off][]" class="border_illusion" type="number"> год</p>
                                <p>Специальность:</p>
                                <input class="border_illusion" required type="text" name="education[proff][]">
                                <p></p>
                                <button type="button" class="btn btn-info" onclick="education_add('education_block')">Добавить учебное заведение</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="age">
                            <div class="col-xs-5">
                                <p>Год рождения:<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <p> <input name="age" value="<?php echo $user->age?>" required class="input_width border_illusion" type="date" placeholder="дд.мм.гггг"> </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vac_town">
                            <div class="col-xs-5">
                                <p>Должность, на которой вы хотите работать<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    <input class="border_illusion" required type="text" name="position">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="category_vac">
                            <div class="col-xs-5">
                                <p>Категория размещения резюме<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="select_category border_illusion options_">
                                    <ul>
                                        <?php if (!empty($category)) foreach ($category as $v):?>
                                            <li><input type="checkbox" required name="profession_id[]" value="<?php echo $v['id']?>"><?php echo $v['name']?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="country_vac">
                            <div class="col-xs-5">
                                <p>Страна в которой желаете работать<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="select_category select_vac_country">
                                    <ul>
                                        <?php if (!empty($country)) foreach ($country as $k=>$v):?>
                                            <li><input type="radio" <?php if ($k==0):?>required<?php endif; ?> value="<?php echo $v['id']?>" name="country"><?php echo $v['name']?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vac_worktime">
                            <div class="col-xs-5">
                                <p>Занятость<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <select class="border_illusion" required style="width: auto" name="employment">
                                    <?php if (!empty($employment)) foreach ($employment as $v):?>
                                        <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="money_vac">
                            <div class="col-xs-5">
                                <p>Желаемая заработная пaлата<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div>
                                    <p>от <input class="border_illusion" type="number" required name="wage"></p>
                                    <select class="border_illusion" style="width: auto" name="curr">
                                        <?php if (!empty($curr)) foreach ($curr as $v):?>
                                            <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <p class="margin-mmm">коментарии зарплате:</p> <input class="input_width border_illusion" type="text" name="wage_desc">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row experience_block">
                        <div class="experience">
                            <div class="col-xs-5">
                                <p>Опыт работы</p>
                            </div>

                            <div class="col-xs-7">
                                <p class="margin-mmm">Название компании:</p> <input class="input_width border_illusion" type="text" name="experience[name][]">
                                <p class="margin-mmm">Период работы:</p>
                                <p>с <input class="border_illusion" type="number" name="experience[on][]"> по <input class="border_illusion" type="number" name="experience[off][]"> год</p>
                                <p class="margin-mmm">Должность:</p>
                                <p class="margin-mmm"><input class="input_width border_illusion" type="text" name="experience[proff][]"></p>
                                <p></p>
                                <button type="button" class="btn btn-info" onclick="education_add('experience_block')">Добавить место работы</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="row">
                        <div class="col-xs-5">
                            <p>Дополнительная информация о собе:</p>
                        </div>
                        <div class="col-xs-7">
                            <div class="textarea">
                                <textarea id="text" class="border_illusion" name="desc" maxlength="4000"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-5">
                            <div class="load_img">
                                <button type="button" name="button">Добавить фотографию</button>
                            </div>
                        </div>
                        <div class="col-xs-7">

                            <script src="/media/js/register.js"></script>

                       <div class="pull-left photo_album" style="width: 102px;height: 102px;margin-bottom: 15px;">
                           <div class="fon"></div>
                           <input type="hidden" class='additional_image_url' id="additionalImages_1" name="additionalImages1">
                           <?php if ($user->img) :?>
                                   <div class="pull-left photo_album">
                                       <div class="fon"></div>
                                       <input type="hidden" class='additional_image_url' id="additionalImages_1" name="additionalImages1">
                                       <div id="frame_for_img_1" class="photo-block">
                                           <span class="helper"></span>
                                           <img src="/media/users/<?php echo $user->email?>/<?php echo $user->img?>"
                                                class="img-polaroid"
                                                style="max-width: 90px; max-height: 90px;"  >
                                       </div>
                                   </div>
                                   <div class="btn-group f-s_0 btn-group_u" style="display: block;">
                                       <label style=" margin-left: 0px !important; margin-top: -32px;" class="btn btn-small create_reg" for="fileImg_1"
                                              data-rel="tooltip"
                                              data-title="Добавить" >
                                           <i class="icon-edit"></i>
                                           <input type="file" class="btn-small btn fileImgNew" id="fileImg_1"  name="additionalImages_1" data-url="file2" data-rel="#frame_for_img_1">
                                           <input type="hidden" class='additional_image_url' id='add_img_urls_1' name='add_img_urls_1'>
                                       </label>
                                   </div>
                           <?php else: ?>
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
                               <div class="btn-group f-s_0 btn-group_u" style="display: block; ">
                                   <label style=" margin-left: 0px !important; margin-top: -32px;" class="btn btn-small create_reg" for="fileImg_1"
                                          data-rel="tooltip"
                                          data-title="Добавить" >
                                       <i class="icon-edit"></i>
                                       <input type="file" class="btn-small btn fileImgNew" id="fileImg_1"  name="additionalImages_1" data-url="file2" data-rel="#frame_for_img_1">
                                       <input type="hidden" class='additional_image_url' id='add_img_urls_1' name='add_img_urls_1'>
                                   </label>
                               </div>
                           <?php endif;?>
                       </div>


                        </div>

                    </div>
                </div>
                  <input type="hidden" name='id' value="<?php echo $user->id;?>">
                    <?php echo Form::hidden('csrf', Security::token());?>

                <div class="block">

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="load_img">
                                <a id="Lnk"  class="button_width" >Предосмотр</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="load_img ">
                                <button class="button_width" type="submit" form="form_for_all">Добавить Резюме</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $('#Lnk').on('click', function(e){
        e.preventDefault();

        $.post(
            '/resume/preview', $("#form_for_all").serialize(),
            function(data) {
                if (data == 1) {
                    window.open('/resume/preview', '_blank', 'menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes');
                }
            }
        );
    });
    function education_add(class_name){
        var c = '.' + class_name;
        var block =  $(c+":first").clone();
        $( block ).find('input[type=text],input[type=number]').attr('value','');
        $(c+":last").after(block);
    }
    $(function(){
        var requiredCheckboxes = $('.options_ :checkbox[required]');
        requiredCheckboxes.change(function(){
            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });
</script>