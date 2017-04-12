<div id="main-panel"><!--  Start of Main Panel -->

    <div id="tab" class="ae-widget"> <!--  Start of Tab Widget -->

        <ul class="ae-widget-header">  <!--  Start of Tab Controls -->
            <li><a href="#">Все пользователи</a></li>
            <li><a href="#">Управление правами</a></li>
        </ul> <!--  End of Tab Controls -->

        <div class="tabs" class="ae-widget-content">

            <div id="tab1" > <!--  Start of Tab 1 -->

                <div class="ae-widget">
                    <table id="pagetable" ><!--  Start of Table -->
                        <thead><tr><th>ID</th><th>Пользователи</th><th>Дата регистрации</th><th>Опции</th></tr></thead>
                        <tbody>
                        <?php  if (!empty($users)) foreach ( $users as $v) : ?>
                        <tr>

                                <td><?=$v['id'];?></td>
                                <td><?=$v['username'];?></td>
                                <td><?=$v['created'];?></td>
                                <td><img src="/media/admin/css/icons/option-sprite.jpg" alt="option-sprite" /></td>

                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table><!--  End of Table -->



                </div>




            </div>  <!--  End of Tab 1 -->


            <div> <!--  Start of Tab 2 -->

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
                            <a data-rel="tooltip" data-placement="top" data-original-title="Редактировать роль" href="/admin_site/main/rbac_edit/<?=$v['id'];?>"><?=$v['name'];?></a>
                        </td>
                        <td>
                            <?=$v['description'];?>
                        </td>
                        <td>
                            <?php if ($v['name'] != 'admin'):?>
                            <a href="/admin_site/main/rbac_edit/<?=$v['id'];?>" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') 11px 4px"></a>
                            <a class="delete_roles" href="" style="display: inline-block; width:40px; height:40px; background: url('/media/admin/css/icons/option-sprite.jpg') -77px 4px"></a>
                            <?php endif;?>
                        </td>

                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </div> <!--  End of Tab 2 -->


        </div>

    </div>

</div><!--  End of Main Panel -->