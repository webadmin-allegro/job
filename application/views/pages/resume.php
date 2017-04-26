<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -> <a href="/resume">Поиск резюме</a> 
    </div>
</div>
<div class="container">
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="headervakanse">
            <a href="javascript:history.back();">← Вернуться к списку</a><p style="float: right;"><span>Резюме обновлено 2 дня назад</span><a href="" download ><img alt="download" title="Скачать" src="/img/downl.png">Скачать</a>
                <a style="cursor: pointer;" onclick="javascript: print();"><img alt="print" title="Распечатать" src="/img/print.png">Распечатать</a>

            </p>
        </div>
        <div class="rezumeblock">
            <div class="avatarvacanse">
                <?php if ($list[0]['img']):?>
                    <img src="/media/users/<?php echo $list[0]['email']?>/<?php echo $list[0]['img']?>" alt="Аватар без фото" title="name resume">
                <?php else:?>
                    <img src="/media/img/nophoto.png" alt="Аватар без фото" title="name resume">
                <?php endif;?>
            </div>
            <h1><?php echo $list[0]['username']?></h1>
            <h2><?php echo $list[0]['position']?></h2>
            <p>Город: <?php echo $list[0]['residence']?></p>
            <p>Возраст: <?php echo Helper_MyUrl::Calculate_Age($list[0]['age']);?> лет</p>
            <p>Желаемая зарплата: <?php echo $list[0]['wage']?> <?php echo $list[0]['curr_name']?></p>
            <p><a href="#">Показать контакты</a></p>
            <h3>Опыт работы:</h3>
            <?php $o = unserialize($list[0]['experience']);?>
            <p><?php echo $o['name']; ?>: <?php echo $o['on']; ?>-<?php echo $o['off']; ?></p>
            <p><?php echo $o['proff']; ?></p>
            <h3>Ключевая информация:</h3>
            <h3>Образование:</h3>
            <h3>Владения языками:</h3>
            <h3>Дополнительная информация:</h3>

        </div>
        <div class="col-md-12">
        </div>
    </div>
</div>