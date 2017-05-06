<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -&gt; Поиск резюме
    </div>
</div>
<div class="container">

    <?php if ($list):?>

        <div class="row" style="margin-left: 0; margin-right: 0;">
            <div class="headervakanse">
                Найдено: <?php echo count($list);?> резюме.
            </div>

           <div><?php if ($messages) echo $messages; ?></div>

            <?php foreach ($list as $v): ?>

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
