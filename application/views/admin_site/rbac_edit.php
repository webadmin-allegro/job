<div id="main-panel"><!--  Start of Main Panel -->

    <div id="tab" class="ae-widget"> <!--  Start of Tab Widget -->

        <ul class="ae-widget-header">  <!--  Start of Tab Controls -->
            <li><a href="#">Редактирование прав</a></li>
        </ul> <!--  End of Tab Controls -->

        <div class="tabs" class="ae-widget-content">

            <div id="tab1" > <!--  Start of Tab 1 -->

                <div class="ae-widget">
                    <table class="table" ><!--  Start of Table -->
                        <thead><tr><th></th><th>Действие</th><th>Описание</th></tr></thead>
                        <tbody>
                        <form method="post">
                        <?php  if (is_array($privileges)) foreach ($privileges as $k=>$priv): ?>
                         <tr><td><?php echo $k;?></td></tr>
                        <?php  if ($priv) foreach ( $priv as $v): ?>
                        <tr>
                            <td><input type="checkbox" name="<?=$v['id'];?>" value="<?=$v['id'];?>" <?php if ($privileges_roles[$v['id']]): ?>checked <?php endif; ?>></td>
                            <td><?=$v['action'];?></td>
                            <td><?=$v['desc'];?></td>
                        </tr>
                            <?php endforeach;?>
                        <?php endforeach;?>
                            <tr><td></td><td></td>
                                <td><input style="display: inline-block;cursor: pointer;    color: white; background: green;" type="submit" value="Сохранить изминения"> </td>
                            </tr>
                        </form>
                        </tbody>
                    </table><!--  End of Table -->

                </div>




            </div>  <!--  End of Tab 1 -->


        </div>

    </div>

</div><!--  End of Main Panel -->