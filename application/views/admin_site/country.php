<div id="main-panel"><!--  Start of Main Panel -->

    <div id="tab" class="ae-widget"> <!--  Start of Tab Widget -->

        <ul class="ae-widget-header">  <!--  Start of Tab Controls -->
            <li><a href="#">Страны</a></li>
        </ul> <!--  End of Tab Controls -->

        <a href="#" rel="creat_new_category" id="0" class="button" style="margin-top:3px; float:right; margin-bottom: 10px;z-index: 100; "><img src="/media/admin/css/i/plus.png">  &nbsp;&nbsp;Добавить</a>

        <div class="tabs" class="ae-widget-content">

            <div id="tab1" > <!--  Start of Tab 1 -->

                <div class="ae-widget">
                    <table ><!--  Start of Table -->
                        <thead><tr><th>ID</th><th>Страны</th><th>Опции</th></tr></thead>
                        <tbody>
                        <?php  if (!empty($country)) foreach ( $country as $v) : ?>
                        <tr>

                                <td><?=$v['id'];?></td>
                                <td><input class="edit_country" type="text" name="name" data-id="<?=$v['id'];?>" data-action="edit" value="<?=$v['name'];?>"></td>
                                <td>
                                    <a class="delete_country" data-id="<?=$v['id'];?>" data-action="del" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') -77px 4px"></a>
                                </td>

                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table><!--  End of Table -->



                </div>




            </div>  <!--  End of Tab 1 -->


            <div> <!--  Start of Tab 2 -->
                <div class="rbac_add" style=" float: right; display: block;cursor: pointer; color: green;">Добавить группу</div>

                <div class="rbac-catalog" style="display: none">
                    <form method="post" action="/admin_site/main/rbac_add">
                      <div><span style="margin-right: 10px; float: left"> Название группы пользователей</span><input type="text" name="name" required> </div>
                        <div><span style="margin-right: 58px; float: left"> Краткое описание группы </span>  <input type="text" name="description"> </div>
                        <input style="cursor: pointer" type="submit" value="Добавить">
                    </form>

                </div>

                <table class="table  table-bordered table-hover table-condensed">
                    <thead>
                    <tr>

                        <th class="span1">ID</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Опции</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

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

        $('.delete_country').on('click', function() {

            if (confirm('Вы уверены что хотите удалить !')) {

                var id = $(this).data("id");
                var del = $(this).data("action");

                $.post('/admin_site/main/country/',{id:id,action:del}, function (data) {

                    if (data == 1){
                        window.location.reload();
                    }
                });
            }
        });


        $('.edit_country').on('change', function() {

                var id = $(this).data("id");
                var action = $(this).data("action");
                var name = $(this).val();

                $.post('/admin_site/main/country/',{id:id,action:action,name:name}, function (data) {

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