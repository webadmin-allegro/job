<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -> <a href="e">Категория</a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="get" class="form-inline">
                <h3>Категории</h3>

          <?php  if ($arr['filter']) foreach ($arr['filter'] as $k=>$v):?>
                 <div class="checkbox checkbox-success">
         <input type="checkbox" name="category[]" id="checkbox<?php echo $k;?>" value="<?php echo $v['id']?>">
              <label for="checkbox<?php echo $k;?>"><?php echo $v['name']?></label>
                </div><br>
          <?php endforeach;?>

            </form>
        </div>
        <div class="col-md-8">
            <?php if ($arr['category']):
                foreach ($arr['category'] as $v): ?>

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
                            <?php echo $ed['type'][$i]; ?>
                            <?php echo $ed['name'][$i]; ?>: <?php echo $ed['on'][$i]; ?>-<?php echo $ed['off'][$i]; ?>
                            <?php echo $ed['proff'][$i]; ?>
                        <?php endfor;?>.
                    </p>
                </div>

            <?php endforeach;?>
            <?php else: ?>
                <div>В этой категории нет резюме.</div>
            <?php endif;?>
        </div>
    </div>
</div>