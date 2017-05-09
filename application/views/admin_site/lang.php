<div id="main-panel"><!--  Start of Main Panel -->

    <div id="tab" class="ae-widget"> <!--  Start of Tab Widget -->

        <ul class="ae-widget-header">  <!--  Start of Tab Controls -->
            <li><a href="#">Языки</a></li>
            <li><a href="#">Уровень владения</a></li>
        </ul> <!--  End of Tab Controls -->

        <!--     <a href="#" rel="creat_new_category" id="0" class="button" style="margin-top:3px; float:right; margin-bottom: 10px;z-index: 100; "><img src="/media/admin/css/i/plus.png">  &nbsp;&nbsp;Добавить</a>-->

           <div class="tabs" class="ae-widget-content">

               <div id="tab1" > <!--  Start of Tab 1 -->

                <div class="ae-widget">
                    <table ><!--  Start of Table -->
                        <thead><tr><th>ID</th><th>Названия</th><th>Опции</th></tr></thead>
                        <tbody>
                        <?php  if (!empty($lang)) foreach ( $lang as $v) : ?>
                        <tr>

                                <td><?=$v['id'];?></td>
                                <td style="text-align: center"><input class="edit" type="text" data-tab="lang" name="name" data-id="<?=$v['id'];?>" data-action="edit" value="<?=$v['name'];?>"></td>

                                <td>
                                    <a class="delete" data-tab="lang" data-id="<?=$v['id'];?>" data-action="del" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') -77px 4px"></a>
                                </td>

                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table><!--  End of Table -->



                </div>




            </div>  <!--  End of Tab 1 -->


            <div> <!--  Start of Tab 2 -->


                <table ><!--  Start of Table -->
                    <thead><tr><th>ID</th><th>Названия</th><th>Опции</th></tr></thead>
                    <tbody>
                    <?php  if (!empty($lang_level)) foreach ( $lang_level as $v) : ?>
                        <tr>

                            <td><?=$v['id'];?></td>
                            <td style="text-align: center"><input class="edit" type="text" data-tab="lang_level" name="name" data-id="<?=$v['id'];?>" data-action="edit" value="<?=$v['name'];?>"></td>

                            <td>
                                <a class="delete" data-tab="lang_level" data-id="<?=$v['id'];?>" data-action="del" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') -77px 4px"></a>
                            </td>

                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table><!--  End of Table -->

            </div> <!--  End of Tab 2 -->

            <!-- Modal -->
            <div class="creat_category" style="background: #fff;">
                <div class="popwindow">
                    <div class="title_popwindow">
                        Новая страна
                    </div>


                    <div class="close_popwindow">
                        <a href="#" rel="cancel_creat_new_category" >
                            <img  src="/media/admin/css/i/close.png"/>
                        </a>
                    </div>
                </div>

                <form method="post">
                    <table border="1" style="font-weight: bold;font-size: 16px;">

                        <tr>
                            <td>Название:</td><td><input type="text" name="name" required/></td>
                        </tr>
                        <input type="hidden" name="action" value="add"/>
                        <tr>
                            <td colspan="3" style="height:40px; text-align:right;">
                                <input type="submit" name="submit" value="Сохранить"  class="button"/>
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
<script>
    $(document).ready(function(){

        $('.delete').on('click', function() {

            if (confirm('Вы уверены что хотите удалить !')) {

                var id = $(this).data("id");
                var del = $(this).data("action");
                var tab = $(this).data("tab");

                $.post('/admin_site/main/lang/',{id:id,action:del,tab:tab}, function (data) {

                    if (data == 1){
                        window.location.reload();
                    }
                });
            }
        });

        $('input[type=checkbox]').on('change', function() {

            var id = $(this).data("id");
            var name = $(this).data("name");
            var value = $(this).val();

            if (value == 1){
                var val = 0;
            }else{
                var val = 1;
            }
            $(this).val(val);
            $.post('/admin_site/main/lang/',{id:id,name:name,value:val,action:'checked'}, function (data) {

                if (data == 1) {

                    console.log(val);
                }
            });

        });

        $('.edit').on('change', function() {

                var id = $(this).data("id");
                var action = $(this).data("action");
                var name = $(this).val();
                var tab = $(this).data("tab");

                $.post('/admin_site/main/lang/',{id:id,action:action,name:name,tab:tab}, function (data) {

                    if (data == 2){
                        $(this).val(name);
                    }
                });

        });


    });
</script>

        </div>

    </div>

</div><!--  End of Main Panel -->