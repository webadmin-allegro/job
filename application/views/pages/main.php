<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="eta">
                <div class="col-sm-3 col-xs-12" >
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="search">
                        <form action="/search">
                        <input name="text" type="text" placeholder="Поиск">
                        <button onclick="submit()" type="button" name="button"></button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h1><a style="color: #337ab7;" href="rabota-za-granicey.php">Работа За Границей</a></h1>
                </div>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <a class="links" href="/vacancy">Доска вакансий</a><!--http://shengenvisa.net/vakansii.php-->
                <a class="links" href="/">Кадровые агентства</a><!--http://shengenvisa.net/base-cadrovuh-agenstv.php-->
                <a class="links" href="/">Визовые центры</a><!--http://shengenvisa.net/vizovue-centru.php-->
            </div>
        </div>

        <?php if ($list) foreach ($list as $k=>$v): ?>
          <?php if ($k==0 || $k==6 || $k==12 || $k==18): ?>  <div class="row new"> <?php endif;?>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="job">
                    <?php $str = Helper_MyUrl::SEOIt($v['name'],true); ?>
                    <a href="/resume/<?php echo $v['id'].'/'.$str;?>">
                        <div class="img-wrapper">
                            <img width="110" height="110" class="img-rounded" src="/media/img/<?=$v['img'];?>" title="<?=$v['name'];?>" alt="<?=$v['name'];?>">
                        </div>
                        <div class="job_name">
                            <p><?=$v['name'];?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php if ($k==5 || $k==11 || $k==17 || $k==23): ?>  </div> <?php endif;?>
        <?php endforeach; ?>



        <br>
        <div class="vakanceblock">
            <h2><a href="rezume-blank.php">Web developer</a></h2>, 30 000 грн
            <p>Seor Company , Киев, 2 ч. назад</p>
            <p>Полная занятость. Опыт работы от 2 лет. Среднее специальное образование.
                Баядера Групп • крупный национальный холдинг, специализирующийся на производстве и реализации высококачественной…</p>
        </div>
        <div class="vakanceblock">
            <h2><a href="rezume-blank.php">Web developer</a></h2>, 30 000 грн
            <p>Seor Company , Киев, 2 ч. назад</p>
            <p>Полная занятость. Опыт работы от 2 лет. Среднее специальное образование.
                Баядера Групп • крупный национальный холдинг, специализирующийся на производстве и реализации высококачественной…</p>
        </div>
    </div>
</div>