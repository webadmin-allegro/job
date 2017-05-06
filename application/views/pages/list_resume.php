<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -&gt; Поиск резюме
    </div>
</div>
<div class="sortvakanse">
    <div class="container">
        <form method="post">
        <div class="rowsort">
            <p>Категория:</p>
            <select name="category_id" style="max-width: 300px">
                <option value="0">Все</option>
                <?php if (!empty($category)) foreach ($category as $v):?>
                    <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="rowsort">
            <p>Страна:</p>
            <select name="country_id">
                <option value="0">Любая</option>
                <?php if (!empty($country)) foreach ($country as $k=>$v):?>
                    <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="rowsort">
            <p>Занятость:</p>
            <select name="employment_id">
                <option value="0">Любая</option>
                <?php if (!empty($employment)) foreach ($employment as $k=>$v):?>
                    <option value="<?php echo $k?>"><?php echo $v?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="rowsort">
            <p>Образование:</p>
            <select name="education_type">
                <option value="0">Любое</option>
                <?php if (!empty($education_type)) foreach ($education_type as $k=>$v):?>
                    <option value="<?php echo $k?>"><?php echo $v?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="rowsort">
            <p>Опыт работы:</p>
            <select name="experience_id">
                <option value="0">Любая</option>
                <?php if (!empty($experience)) foreach ($experience as $v):?>
                    <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
            <div class="rowsort">
                <p style="visibility: hidden">Нажмите на кнопку</p>
                <input type="submit" value="Искать">
            </div>
        </form>
    </div>
</div>
<div class="container">

    <?php if ($list['list']):?>

    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="headervakanse">
            Найдено: <?php echo count($list['list']);?> резюме. <span style="float: right;">За последние 30 дней</span>
        </div>

        <?php foreach ($list['list'] as $v): ?>

        <div class="vakanceblock">
            <div class="avatarvacanse">
                <?php if ($v['img']):?>
                <img src="/media/users/<?php echo $v['email']?>/<?php echo $v['img']?>" alt="Аватар без фото" title="name resume">
                <?php else:?>
                <img src="/media/img/nophoto.png" alt="Аватар без фото" title="name resume">
                <?php endif;?>
            </div>
            <h2><a href="/resume/cv/<?php echo $v['id']?>"><?php echo $v['position']?></a></h2>
            <p><?php echo $v['username']?> , <?php echo Helper_MyUrl::Calculate_Age($v['age']);?> года, <?php echo $v['residence']?></p>
            <p><?php if ($employment[$v['employment_id']]) echo $employment[$v['employment_id']];?> занятость.Желаемая зарплата: <?php echo $v['wage']?> <?php if ($curr[$v['curr_id']]) echo $curr[$v['curr_id']];?>.
              Опыт работы:  <?php $exp = unserialize($v['experience']);?>
                <?php if (is_array($exp)) for ($i=0;$i<count($exp['name']);$i++):?>
            <?php echo $exp['name'][$i]; ?>: <?php echo $exp['on'][$i]; ?>-<?php echo $exp['off'][$i]; ?>
            <?php echo $exp['proff'][$i]; ?>.
            <?php endfor;?>
                Образование: <?php $ed = unserialize($v['education']);?>
                <?php if (is_array($ed)) for ($i=0;$i<count($ed['name']);$i++):?>
            <?php  echo $education_type[$ed['type'][$i]]; ?>
            <?php echo $ed['name'][$i]; ?>: <?php echo $ed['on'][$i]; ?>-<?php echo $ed['off'][$i]; ?>
            <?php echo $ed['proff'][$i]; ?>
            <?php endfor;?>.
            </p>
        </div>

        <?php endforeach;?>

        <div class="col-md-12">
        </div>
    </div>
<?php endif; ?>

</div>
 