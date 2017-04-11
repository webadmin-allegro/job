 <div id="main-panel"><!--  Start of Main Panel -->

<div id="tab" class="ae-widget"> <!--  Start of Tab Widget -->

<ul class="ae-widget-header">  <!--  Start of Tab Controls -->
    <li><a href="#">Edit goods</a></li>
       <li><a href="#">New +</a></li>
</ul> <!--  End of Tab Controls -->

<div id="message_box">
    <div id="message">

    </div>
</div>
<div class="tabs" class="ae-widget-content">

<div id="tab1" > <!--  Start of Tab 1 -->

    <div class="ae-widget">
        <table id="pagetable" ><!--  Start of Table -->
            <thead><tr><th>Name</th><th>Home</th><th>Image</th><th>Edit</th><th>Delete</th></tr></thead>
            <tbody><?php  foreach($news as $art): ?>

            <tr><td><?=$art['title'];?></td>
                <td align="center"><form method="post" action="/admin_leks/goods/main">
                    <input type="hidden" name="id" value="<?=$art['id'];?>"/>
                    <input type="hidden" name="main" value="<?=$art['main'];?>"/>
                    <?php if ($art['main'] == 0){
                   echo "<input type='image' style='width: 20px; height: 20px;' src='/media/images/check2.png''/>";}
                    else {echo "<input type='image' style='width: 20px; height: 20px;' src='/media/images/check1.png''/>";}
                ?>
                </form></td>
                <td align="center">
                    <a id="<?=$art['id'];?>" href="#" rel="creat_new_category">
                        <img width="50px" height="50px" src="<?php echo URL::base(); ?>media/img/<?=$art['img'];?>" alt="edit" title="Изменить"/></a>

                </td>
                <td align="center">
                    <a href="/admin_leks/main/goods_edit/<?=$art['id'];?>">
                        <img class='img_ic' src="<?php echo URL::base(); ?>media/admin/css/icons/edit.png" alt="edit" title="Изменить"/></a>

                </td>
                <td align="center"> <form method="post" action="/admin_leks/goods/delete">
                    <input type="hidden" name="id" value="<?=$art['id'];?>"/>
                    <input onclick="return confirm('Вы уверены?')" type="image" src="/media/admin/css/icons/delete.png"/>
                </form></td> </tr>
            <!--  <a href=""><img class='img_ic' src="public_admin/css/icons/ad.png" title="Просмотр" alt="edit" /></a></td>  </tr>
    -->
                <?php  endforeach;?>
            </tbody>
        </table>  <!--  End of Tab 1 -->

    </div>


    <div class="creat_category" style="background: #fff;">
        <div class="popwindow">
            <div class="title_popwindow">
                Изменить изображение
            </div>


            <div class="close_popwindow">
                <a href="#" rel="cancel_creat_new_category" >
                    <img  src="/media/admin/css/i/close.png"/>
                </a>
            </div>
        </div>

        <form method="post" enctype="multipart/form-data" action="/admin_leks/goods/img">
            <table border="1" style="font-weight: bold;font-size: 16px;">

                <tr>
                    <td>Выбрать рисунок: </td><td><input type="hidden" name="edit_id"/>
                    <input type="file" name="flag">
                </td>
                </tr>


                <tr>
                    <td colspan="3" style="height:40px; text-align:right;">
                        <input type="submit" name="submit" value="Заменить рисунок"  class="button"/>
                    </td>
                </tr>
            </table></form>

    </div>



</div>  <!--  End of Tab 1 -->


<div> <!--  Start of Tab 2 -->

    <h4 align="center">Добавить товар</h4>
    <form method="post" action="/admin_leks/goods/new" enctype="multipart/form-data" name="uploadform" id="uploadform">
        <h4 style="font-size: 14px;font-weight: bold;">Выберите категорию</h4>
        <select id='category_edit_select' name='cat'>
            <?php   foreach($menu as $cat):?>
            <option value="<?=$cat['id'];?>"><?=$cat['category'];?></option>
            <?php endforeach;?>
        </select>

        <label for="medium">Название</label>
        <input name="title" type="text" class="medium ui-corner-all" id="medium"/>
        <label for="medium">Meta_description</label>
        <input name="meta_d" type="text" class="medium ui-corner-all" id="medium"/>
        <label for="medium">Meta_keywords</label>
        <input name="meta_k" type="text" class="medium ui-corner-all" id="medium"/>

        <h4>Описание</h4>
        <!--<textarea name="desc" rows="8" cols="62"></textarea>-->
        <?php  Controller_Admin_Main::ckeditor('desc', '') ?>
        <h4>Текст</h4>
        <?php  Controller_Admin_Main::ckeditor('text', '') ?>

    <?php    function buildTree($data, $parent_id = 0) {
        $result = array();
        foreach ($data as $row) {
        if ($row['parent_id'] == $parent_id) {
        $result[$row['id']] = $row;
        $result[$row['id']]['children']  = buildTree($data, $row['id']);
        }
        }
        return $result;
    }
        $tree = buildTree($group, 0);
        ?>


          <?php foreach ($tree as $groups): ?>
        <select name="sort[]">
            <option value=""><?=$groups['category'];?></option>
        <?php foreach ($groups['children'] as $gr):
           ?>
            <option value="<?=$gr['category'];?>"><?=$gr['category'];?></option>
            <?php endforeach; ?>
        </select> <?php endforeach; ?>

        <h4>Выбрать фото</h4>
        <input type="file" name="flag" style="width:300px;"></label>

        <h4>Выбрать фото на слайдер</h4>
        <script type="text/javascript">
            upload = new adekMultiUpload('uploadform',15,[".jpg",".gif",".png"],'img');
            upload.init();
        </script>

        <h4>Выбрать файл download</h4>
        <input type="file" name="zip" style="width:300px;"></label>

        <input style="margin-top:20px" type="submit" name="submit" value="Занести в базу"  class="button"/>
    </form>

</div> <!--  End of Tab 2 -->


<div> <!--  Start of Tab 3 -->
    <div class="error"> This is an error message ! Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. </div>
    <div class="warning"> This is an warning message ! Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. </div>
    <div class="success"> This is an success message ! Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. </div>
    <div class="info"> This is an information message ! Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. </div>

    <div class="urgent">
        <h6>Urgent Attention required</h6>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet ornare lacus. Curabitur et lacus ligula.
        </p>
    </div>

</div><!--  End of Tab 3 -->

<div><!--  Start of Tab 4 -->

    <div id="bar" class="ae-widget-sidebar"><!-- Start of Graph -->
        <h4 class="ae-widget-header">Bar Graphs</h4>
        <div class="ae-widget-content">
            <table style="width:400px" >
                <caption>Envato Marketplace</caption>

                <caption id="legend">Profit</caption>

                <thead><td></td><th>GraphicRiver</th><th>Themeforest</th><th>CodeCanyon</th><th>VideoHive</th><th>Activeden</th><th>Audiojungle</th></thead>
                <tbody>
                <tr><th>2006</th><td>10</td><td>40</td><td>0</td><td>20</td><td>10</td><td>20</td>  </tr>
                <tr><th>2007</th><td>20</td><td>120</td><td>0</td><td>50</td><td>30</td><td>40</td>  </tr>
                <tr><th>2008</th><td>50</td><td>140</td><td>0</td><td>60</td><td>70</td><td>50</td>  </tr>
                <tr><th>2009</th><td>70</td><td>160</td><td>10</td><td>70</td><td>80</td><td>60</td>  </tr>
                <tr><th>2010</th><td>100</td><td>220</td><td>20</td><td>10</td><td>180</td><td>80</td>  </tr>

                </tbody>
            </table>
        </div>

    </div><!-- End of Graph -->


    <div id="pie" class="ae-widget-sidebar"><!-- Start of Graph -->
        <h4 class="ae-widget-header">Pie Charts</h4>
        <div class="ae-widget-content">
            <table style="width:400px" >
                <caption>Envato Marketplace</caption>

                <caption id="legend">Profit</caption>

                <thead><td></td><th>GraphicRiver</th><th>Themeforest</th><th>CodeCanyon</th><th>VideoHive</th><th>Activeden</th><th>Audiojungle</th></thead>
                <tbody>
                <tr><th>2006</th><td>10</td><td>40</td><td>0</td><td>20</td><td>10</td><td>20</td>  </tr>
                <tr><th>2007</th><td>20</td><td>120</td><td>0</td><td>50</td><td>30</td><td>40</td>  </tr>
                <tr><th>2008</th><td>50</td><td>140</td><td>0</td><td>60</td><td>70</td><td>50</td>  </tr>
                <tr><th>2009</th><td>70</td><td>160</td><td>10</td><td>70</td><td>80</td><td>60</td>  </tr>
                <tr><th>2010</th><td>100</td><td>220</td><td>20</td><td>10</td><td>180</td><td>80</td>  </tr>

                </tbody>
            </table>
        </div>

    </div><!-- End of Graph -->


    <div id="area" class="ae-widget-sidebar"><!-- Start of Graph -->
        <h4 class="ae-widget-header">Area Graphs</h4>
        <div class="ae-widget-content">
            <table style="width:400px" >
                <caption>Envato Marketplace</caption>

                <caption id="legend">Profit</caption>

                <thead><td></td><th>GraphicRiver</th><th>Themeforest</th><th>CodeCanyon</th><th>VideoHive</th><th>Activeden</th><th>Audiojungle</th></thead>
                <tbody>
                <tr><th>2006</th><td>10</td><td>40</td><td>0</td><td>20</td><td>10</td><td>20</td>  </tr>
                <tr><th>2007</th><td>20</td><td>120</td><td>0</td><td>50</td><td>30</td><td>40</td>  </tr>
                <tr><th>2008</th><td>50</td><td>140</td><td>0</td><td>60</td><td>70</td><td>50</td>  </tr>
                <tr><th>2009</th><td>70</td><td>160</td><td>10</td><td>70</td><td>80</td><td>60</td>  </tr>
                <tr><th>2010</th><td>100</td><td>220</td><td>20</td><td>10</td><td>180</td><td>80</td>  </tr>

                </tbody>
            </table>
        </div>

    </div><!-- End of Graph -->


    <div id="line" class="ae-widget-sidebar"><!-- Start of Graph -->
        <h4 class="ae-widget-header">Line Graphs</h4>
        <div class="ae-widget-content">
            <table style="width:400px" >
                <caption>Envato Marketplace</caption>

                <caption id="legend">Profit</caption>

                <thead><td></td><th>GraphicRiver</th><th>Themeforest</th><th>CodeCanyon</th><th>VideoHive</th><th>Activeden</th><th>Audiojungle</th></thead>
                <tbody>
                <tr><th>2006</th><td>10</td><td>40</td><td>0</td><td>20</td><td>10</td><td>20</td>  </tr>
                <tr><th>2007</th><td>20</td><td>120</td><td>0</td><td>50</td><td>30</td><td>40</td>  </tr>
                <tr><th>2008</th><td>50</td><td>140</td><td>0</td><td>60</td><td>70</td><td>50</td>  </tr>
                <tr><th>2009</th><td>70</td><td>160</td><td>10</td><td>70</td><td>80</td><td>60</td>  </tr>
                <tr><th>2010</th><td>100</td><td>220</td><td>20</td><td>10</td><td>180</td><td>80</td>  </tr>

                </tbody>
            </table>



        </div>

    </div><!-- End of Graph -->


    <div id="bubble" class="ae-widget-sidebar"><!-- Start of Graph -->
        <h4 class="ae-widget-header">Bubble Graphs</h4>
        <div class="ae-widget-content">
            <table style="width:400px" >
                <caption>Envato Marketplace</caption>

                <caption id="legend">Profit</caption>

                <thead><td></td><th>GraphicRiver</th><th>Themeforest</th><th>CodeCanyon</th><th>VideoHive</th><th>Activeden</th><th>Audiojungle</th></thead>
                <tbody>
                <tr><th>2006</th><td>10</td><td>40</td><td>0</td><td>20</td><td>10</td><td>20</td>  </tr>
                <tr><th>2007</th><td>20</td><td>120</td><td>0</td><td>50</td><td>30</td><td>40</td>  </tr>
                <tr><th>2008</th><td>50</td><td>140</td><td>0</td><td>60</td><td>70</td><td>50</td>  </tr>
                <tr><th>2009</th><td>70</td><td>160</td><td>10</td><td>70</td><td>80</td><td>60</td>  </tr>
                <tr><th>2010</th><td>100</td><td>220</td><td>20</td><td>10</td><td>180</td><td>80</td>  </tr>

                </tbody>
            </table>
        </div>

    </div><!-- End of Graph -->

</div><!--  End of Tab 4 -->

</div>

</div>

</div><!--  End of Main Panel -->