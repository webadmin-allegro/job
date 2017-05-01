<div id="main-panel"><!--  Start of Main Panel -->

    <div id="tab" class="ae-widget"> <!--  Start of Tab Widget -->

        <ul class="ae-widget-header">  <!--  Start of Tab Controls -->
            <li><a href="#">Резюме</a></li>
        </ul> <!--  End of Tab Controls -->

        <?php if ($message) echo('<h4 style="color:red">'.$message.'</h4>'); ?>
        <div class="tabs" class="ae-widget-content">

            <div id="tab1" > <!--  Start of Tab 1 -->

                <div class="ae-widget">
                    <table id="pagetable"><!--  Start of Table -->
                        <thead><tr><th>ID</th><th>Пользователь</th><th>Должность</th><th>Добавлено</th><th>Опции</th></tr></thead>
                        <tbody>
                        <?php  if (!empty($list)) foreach ( $list as $v) : ?>
                        <tr>

                                <td><?=$v['id'];?></td>
                                <td style="text-align: center"><?=$v['username'];?></td>
                            <td style="text-align: center"><a target="_blank" href="/resume/cv/<?=$v['id'];?>"> <?=$v['position'];?> </a> </td>
                                <td style="text-align: center"><?php echo date('d-m-Y H:i',$v['created']);?>  </td>
                                <td>
                                    <span class="resume_pochta">
                                       <a title="Написать автору резюме" href="#" rel="creat_new_category" data-param='["<?=$v['username'];?>","<?=$v['email'];?>","<?=$v['position'];?>"]'> <img src="/media/img/w512h3361380476923mail.png"></a>
                                    </span>
                                    <div class="frame_prod-on_off" data-rel="tooltip" data-placement="top" data-original-title="" title="Показать/скрыить на сайте">
                                    <span class="prod-on_off <?php if ($v['active'] != 1):?>disable_tovar" <?php endif;?> style="<?php if ($v['active'] != 1):?>left: -28px;<?php endif;?>" <?php if ($v['active'] ==1): ?> rel="true"<?php else:?>rel="false"<?php endif;?>
                                    onclick="ChangeStatus(this,<?php echo $v['id']?>);"></span>
                                   </div>
                                    <a class="delete_resume" data-id="<?=$v['id'];?>" data-action="del"></a>
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
                        Написать автору резюме
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
                            <td>Текст:</td><td><textarea style="width: 372px;height: 56px;" name="text" required/></textarea></td>
                        </tr>
                        <input type="hidden" name="send_email" value=""/>
                        <tr>
                            <td colspan="3" style="height:40px; text-align:right;">
                                <input type="submit" name="submit" value="Отправить"  class="button"/>
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
<script>
    $(document).ready(function(){

        $('.delete_resume').on('click', function() {

            if (confirm('Вы уверены что хотите удалить !')) {

                var id = $(this).data("id");

                $.post('/admin_site/main/resume_delete/',{id:id}, function (data) {

                    if (data == 1){
                        window.location.reload();
                    }
                });
            }
        });


    });

    function ChangeStatus(obj, id) {
        $.post('/admin_site/main/resume', {status: $(obj).attr('rel'), id: id}, function() {
            if ($(obj).attr('rel') == 'true')
                $(obj).addClass('disable_tovar').attr('rel', false);
            else
                $(obj).removeClass('disable_tovar').attr('rel', true);
        });

    }
</script>

        </div>

    </div>

</div><!--  End of Main Panel -->