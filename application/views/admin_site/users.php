<div id="main-panel"><!--  Start of Main Panel -->

    <div id="tab" class="ae-widget"> <!--  Start of Tab Widget -->

        <ul class="ae-widget-header">  <!--  Start of Tab Controls -->
            <li><a href="#">Все пользователи</a></li>
            <li><a href="#">Управление группами</a></li>
        </ul> <!--  End of Tab Controls -->

        <div class="tabs" class="ae-widget-content">

            <div id="tab1" > <!--  Start of Tab 1 -->

                <div class="ae-widget">
                    <table id="pagetable" ><!--  Start of Table -->
                        <thead><tr><th>ID</th><th>Пользователи</th><th>Email</th><th>Дата регистрации</th><th>Опции</th></tr></thead>
                        <tbody>
                        <?php  if (!empty($users)) foreach ( $users as $v) : ?>
                        <tr>

                                <td><?=$v['id'];?></td>
                                <td><?=$v['username'];?></td>
                                <td><?=$v['email'];?></td>
                                <td><?=$v['created'];?></td>
                                <td>
                                    <a href="/admin_site/main/user_edit/<?=$v['id'];?>" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') 11px 4px"></a>
                                    <a class="delete_user" data-id="<?=$v['id'];?>" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') -77px 4px"></a>
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
                    <?php if (!empty($roles)) foreach ( $roles as $v) : ?>
                    <tr data-id="1" data-imp="1">

                        <td><?=$v['id'];?></td>
                        <td>
                            <?=$v['name'];?>
                        </td>
                        <td>
                            <?=$v['description'];?>
                        </td>
                        <td>
                            <?php if ($v['name'] != 'admin' && $v['name'] != 'login'):?>
                            <a href="/admin_site/main/rbac_edit/<?=$v['id'];?>" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') 11px 4px"></a>
                            <a class="delete_roles" data-id="<?=$v['id'];?>" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') -77px 4px"></a>
                            <?php endif;?>
                        </td>

                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </div> <!--  End of Tab 2 -->
<script>
    $(document).ready(function(){

        $(".rbac_add").click(function () {
            $(".rbac-catalog").toggle("slow");
        });

        $('.delete_roles').on('click', function() {

            if (confirm('Вы уверены что хотите удалить !')) {
                
            var id = $(this).data("id");

            $.post('/admin_site/main/rbac_delete/',{id:id}, function (data) {
               
                if (data == 1){
                    window.location.reload();
                }
            });
        }
        });

        $('.delete_user').on('click', function() {

            if (confirm('Вы уверены что хотите удалить !')) {

                var id = $(this).data("id");

                $.post('/admin_site/main/user_delete/',{id:id}, function (data) {

                    if (data == 1){
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>

        </div>

    </div>

</div><!--  End of Main Panel -->