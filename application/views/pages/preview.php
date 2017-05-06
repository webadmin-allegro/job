<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -> <a href="/resume">Поиск резюме</a> 
    </div>
</div>
<div class="container">
    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="headervakanse">
            <a href="javascript:history.back();">← Вернуться к списку</a><p style="float: right;"><span>Резюме обновлено 2 дня назад</span><a href="" download ><img alt="download" title="Скачать" src="/media/img/downl.png">Скачать</a>
                <a style="cursor: pointer;" onclick="javascript: print();"><img alt="print" title="Распечатать" src="/media/img/print.png">Распечатать</a>

            </p>
        </div>
        <div class="rezumeblock">
            <div class="avatarvacanse">
                <?php if  ($user->img):?>
                    <img src="/media/users/<?php echo $user->email?>/<?php echo $user->img?>" alt="Аватар без фото" title="name resume">
                <?php else:?>
                    <img src="/media/img/nophoto.png" alt="Аватар без фото" title="name resume">
                <?php endif;?>
            </div>
            <h1><?php echo $list['username']?></h1>
            <h2><?php echo $list['position']?></h2>
            <p>Место жительства: <?php echo $list['residence']?></p>
            <p>Возраст: <?php echo Helper_MyUrl::Calculate_Age($list['age']);?> лет</p>
            <p>Желаемая зарплата: <?php echo $list['wage']?> </p>
            <p><?php echo $list['wage_desc']?></p>
            <h3>Образование:</h3>
            <?php $ed = ($list['education']);?>
            <?php if (is_array($ed)) for ($i=0;$i<count($ed['name']);$i++):?>
                <p><?php echo $education_type[$ed['type'][$i]]; ?></p>
                <p><?php echo $ed['name'][$i]; ?>: <?php echo $ed['on'][$i]; ?>-<?php echo $ed['off'][$i]; ?></p>
                <p><?php echo $ed['proff'][$i]; ?></p>
            <?php endfor;?>
            <h3>Опыт работы:</h3>
            <?php $exp = ($list['experience']);?>
            <?php if (is_array($exp)) for ($i=0;$i<count($exp['name']);$i++):?>
                <p><?php echo $exp['name'][$i]; ?>: <?php echo $exp['on'][$i]; ?>-<?php echo $exp['off'][$i]; ?></p>
                <p><?php echo $exp['proff'][$i]; ?></p>
            <?php endfor;?>
            <h3>О себе</h3>
            <p><?php echo $list['desc']?></p>

        </div>
        <div class="col-md-12">
        </div>
    </div>
</div>