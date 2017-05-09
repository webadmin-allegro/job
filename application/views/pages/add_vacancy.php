<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -&gt; Добавить вакансию
    </div>
</div>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo URL::base(true); ?>media/css/select.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo URL::base(true); ?>media/css/bootstrap3-wysihtml5.css">
<script type='text/javascript' src="<?php echo URL::base(true); ?>media/js/select.js"></script>
<script type='text/javascript' src="<?php echo URL::base(true); ?>media/js/bootstrap3-wysihtml5.all.js"></script>
<script type='text/javascript' src="<?php echo URL::base(true); ?>media/js/bootstrap3-wysihtml5.js"></script>
<script type='text/javascript' src="<?php echo URL::base(true); ?>media/js/bootstrap-wysihtml5.ru-RU.js"></script>

<div class="add_vac">
    <div class="container">
        <h3 style="color: red;"><?php if (!empty ($errors) && is_array($errors)) foreach( $errors as $v) echo $v.'<br>';?></h3>
        <div class="main_form new">
            <form id="form_for_all" enctype="multipart/form-data" method="post" name="my_forms">
                <div class="block">
                    <div class="info_vac">
                        <div class="row">
                            <div class="col-xs-5">
                                <h4>Добавление вакансии</h4>
                            </div>
                            <div class="col-xs-7 right">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">

                    <div class="row">
                        <div class="vac_town">
                            <div class="col-xs-5">
                                <p>Название вакансии<span>*</span></p>
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
                                <p>Рубрика<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div>

                                    <select id="proff_parent" class="border_illusion selectpicker" required style="width: auto" name="profession_id[]" data-live-search="true">
                                        <?php if (!empty($category)) foreach ($category as $v):?>
                                            <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div><br>
                                        <ul id="proff_child" class="proff_check options_"> </ul>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="country_vac">
                            <div class="col-xs-5">
                                <p>Контактное лицо<span>*</span></p>
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
                                <p>Регион<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    <input class="border_illusion" required type="text" name="location" value="<?php echo $user->residence;?>">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="country_vac">
                            <div class="col-xs-5">
                                <p>Контактный телефон<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div class="town">
                                    <input class="border_illusion" required type="tel" name="phone" value="<?php echo $user->phone;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vac_worktime">
                            <div class="col-xs-5">
                                <p>Вид занятости<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <select class="border_illusion selectpicker" required style="width: auto" name="employment">
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
                                <p>Заработная пaлата<span>*</span></p>
                            </div>
                            <div class="col-xs-7">
                                <div>
                                    <p><input class="border_illusion" type="number" required name="wage"></p>
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
                    <div class="row">
                        <div>
                            <div class="col-xs-5">
                                <p>Иностранный язык</p>
                            </div>
                            <div class="col-xs-7">
                                <div>
                                        <span class="lang_s">Не имеет значения</span>
                                        <div class="lang_t">
                                            <ul>
                                        <?php if (!empty($lang)) foreach ($lang as $v):?>
                                            <li> <input type="checkbox" name="lang[]" value="<?php echo $v['id']?>"><span><?php echo $v['name']?></span></li>
                                        <?php endforeach; ?>
                                            </ul>
                                        </div>

                                    <div id="lang_level">
                                        <select class="proff_check">
                                            <?php if (!empty($lang_level)) foreach ($lang_level as $k=>$v):?>
                                                <option value="<?php echo $k?>"><?php echo $v?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="money_vac">
                            <div class="col-xs-5">
                                <p>Опыт работы</p>
                            </div>
                            <div class="col-xs-7">
                                <div>
                                    <select class="border_illusion selectpicker" style="width: auto" name="experience">
                                        <option value="0">Не имеет значения</option>
                                        <?php if (!empty($experience)) foreach ($experience as $v):?>
                                            <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="money_vac">
                            <div class="col-xs-5">
                                <p>Требуемый уровень образования</p>
                            </div>
                            <div class="col-xs-7">
                                <div>
                                    <select class="border_illusion selectpicker" style="width: auto" name="education_type">
                                        <option value="0">Не имеет значения</option>
                                        <?php if (!empty($education_type)) foreach ($education_type as $v):?>
                                            <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="row">
                        <div class="col-xs-5">
                            <p>Описание вакансии:<span>*</span></p>
                           <span style="font-size: 10px;"> Примечание: Минимум 150, максимум 500 символов.</span>
                        </div>
                        <div class="col-xs-7">
                            <div class="textarea">
                                <textarea id="text" class="border_illusion" name="desc" maxlength="500" minlength="150">
                                    <p>Требования:</p>
                                    <p>Условия работы:</p>
                                    <p>Обязанности:</p>
                                </textarea>
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
                                <button class="button_width" type="submit" form="form_for_all">Добавить Вакансию</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $('#Lnk').on('click', function(){

        $.post(
            '/vacancy/preview', $("#form_for_all").serialize(),
            function(data) {
                if (data == 1) {
                    window.open('/vacancy/preview', '_blank', 'menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes');
                }
            }
        );
        return false;
    });

    $(function(){
        $(document).on('change', '.options_ input[type=checkbox]', function() {
        var requiredCheckboxes = $('.options_ :checkbox[required]');
        requiredCheckboxes.change(function(){
            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });
    });


    $( document ).ready(function() {
        $('.selectpicker').selectpicker();
        $('#text').wysihtml5({
            locale: "ru-RU",
            toolbar: {
            "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false, //Button to change color of font
            "blockquote": false, //Blockquote
        },
        });
        $(".lang_s").click(function () {
            $(".lang_t").toggle("slow");
        });
    });



    $(function() {
        $(document).on('change', 'select#proff_parent', function() {

           var parent_id = $("#proff_parent").val();

            if(parent_id) {

                $.ajax({
                    type: "POST",
                    url: '/resume/proff_ajax',
                    data: {id : parent_id},
                    dataType: "json",
                    cache: false,
                    success: function(html) {

                        $("#proff_child").empty();

                            $.each(html, function(id, value) {
                                $('#proff_child').append($("<li><input required value='"+ id +"' name='profession_id[]' type='checkbox'><span>" + value + "</span></li>"));
                            });

                        $('#proff_child').css("display","block");

                    }

                });

            }
            return false;
        });


    });

    $(function() {
        $(document).on('change', '.lang_t li', function() {

            var block =   $("#lang_level:last").clone() ;

            var child_id =  $('input',this).val();
            var child_value =  $('span',this).text();
            var status = $('input',this).prop("checked");

            if (status == true){
                $(block).addClass('proff_' + child_id).find('select').attr({name:'lang_level[]'}).prepend('<option selected disabled>Укажите уровень владения ' + child_value + '</option>').addClass("selectpicker").selectpicker('refresh');
                $("#lang_level:last").after(block);
            }else{
                $('.proff_' + child_id).remove();
            }


            return false;
        });


    });


</script>