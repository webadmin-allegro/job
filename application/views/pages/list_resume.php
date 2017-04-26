<div class="full-width_blue-background">
    <div class="container" id="breadcumps">
        <a href="/">Главная</a> -&gt; Поиск резюме
    </div>
</div>
<div class="sortvakanse">
    <div class="container">
        <div class="rowsort">
            <p>Категория:</p>
            <select>
                <option>Все</option>
                <option>Сельское хозяйство</option>
                <option>Строительство, архитектура</option>
                <option>Сфера обслуживания</option>
                <option>Транспорт, водители</option>
                <option>Рабочие на производство</option>
                <option>Другие сферы</option>
                <option>Гостинично-ресторанный бизнес</option>
                <option>Охрана, безопасность</option>
                <option>Красота, спорт</option>
                <option>Издательство, полиграфия</option>
                <option>Работа для студентов</option>
                <option>Работа на дому</option>
                <option>IT</option>
                <option>Руководство среднего звена</option>
                <option>Бухгалтерия, аудит</option>
                <option>Культура, музыка, шоу-бизнес</option>
                <option>Логистика, склад, ВЭД</option>
                <option>Дизайн, творчество</option>
                <option>Маркетинг, реклама, PR</option>
                <option>Медицина, фармацевтика</option>
                <option>Образование, наука</option>
                <option>Секретариат, делопроизводство</option>
                <option>Руководство высшего звена</option>
                <option>Телекоммуникации и связь</option>
            </select>
        </div>
        <div class="rowsort">
            <p>Страна:</p>
            <select>
                <option>Любая</option>
                <option>Австрия</option>
                <option>Австралия</option>
                <option>Албания</option>
                <option>Ангола</option>
                <option>Алжир</option>
                <option>Аруба</option>
                <option>Аргентина</option>
                <option>Бангладеш</option>
                <option>Бельгия</option>
                <option>Болгария</option>
                <option>Боливия</option>
                <option>Венгрия</option>
                <option>Вьетнам</option>
                <option>Венесуэла</option>
                <option>Великобритания</option>
                <option>Гана</option>
                <option>Гвинея</option>
                <option>Германия</option>
                <option>Греция</option>
                <option>Гренландия</option>
                <option>Дания</option>
                <option>Зимбамве</option>
                <option>Индия</option>
                <option>Индонезия</option>
                <option>Иран</option>
                <option>Испания</option>
                <option>Италия</option>
                <option>Ирландия</option>
                <option>Исландия</option>
                <option>Камерун</option>
                <option>Канада</option>
                <option>Колумбия</option>
                <option>Конго</option>
                <option>Конго(ДРК)</option>
                <option>Китай</option>
                <option>Куба</option>
                <option>Латвия</option>
                <option>Латва</option>
                <option>Мальта</option>
                <option>Марокко</option>
                <option>Мьянма(Бирма)</option>
                <option>Мексика</option>
                <option>Нидеранды</option>
                <option>Норвегия</option>
                <option>Новая Зеландия</option>
                <option>ОАЄ</option>
                <option>Папуа-Новую Гвинею</option>
                <option>Польша</option>
                <option>Португалия</option>
                <option>Панама</option>
                <option>Пуэрто-Рико</option>
                <option>Саудовская Аравия</option>
                <option>Словения</option>
                <option>Словакия</option>
                <option>Сингапур</option>
                <option>Сьерра Леоне</option>
                <option>США</option>
                <option>Уругвай</option>
                <option>Уганда</option>
                <option>Финляндия</option>
                <option>Франция</option>
                <option>Филиппины</option>
                <option>Чехия</option>
                <option>Чили</option>
                <option>Швейцария</option>
                <option>Швеция</option>
                <option>Эстония</option>
                <option>ЮАР</option>
                <option>Южная Корея</option>
                <option>Япония</option>
            </select>
        </div>
        <div class="rowsort">
            <p>Занятость:</p>
            <select>
                <option>Любая</option>
                <option>Полная</option>
                <option>Не полная</option>
                <option>Удаленная</option>
            </select>
        </div>
        <div class="rowsort">
            <p>Образование:</p>
            <select>
                <option>Любое</option>
                <option>Высшее</option>
                <option>Неоконченное высшее</option>
                <option>Среднее специальное</option>
                <option>Среднее</option>

            </select>
        </div>
        <div class="rowsort">
            <p>Опыт работы:</p>
            <select>
                <option>Любая</option>
                <option>Без опыта</option>
                <option>1-2 года</option>
                <option>2-5 лет</option>
                <option>5-10 лет</option>
                <option>10-20 лет</option>
            </select>
        </div>
    </div>
</div>
<div class="container">

    <?php if ($list)?>

    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="headervakanse">
            Найдено: <?php echo $list[0]['count'];?> резюме. <span style="float: right;">За последние 30 дней</span>
        </div>

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
            <p><?php echo $v['employment_name']?> занятость. Опыт работы от 2 лет. Среднее специальное образование.
                Баядера Групп • крупный национальный холдинг, специализирующийся на производстве и реализации высококачественной…</p>
        </div>

        <?php endforeach;?>

        <div class="col-md-12">
        </div>
    </div>


</div>
 