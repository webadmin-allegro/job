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
                        <tbody><?php var_dump($roles); ?>
                        <?php  if (is_array($privileges)) foreach ( $privileges as $v) : ?>
                        <tr>
                            <td><input type="checkbox" name="<?=$v['action'];?>" value="" ></td>
                            <td><?=$v['action'];?></td>
                            <td><?=$v['desc'];?></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table><!--  End of Table -->



                </div>




            </div>  <!--  End of Tab 1 -->


        </div>

    </div>

</div><!--  End of Main Panel -->