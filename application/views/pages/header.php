<header>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-2" id="logo">
                <a href="/">
                    <img title="Поиск вакансий в Европе" src="http://shengenvisa.net/img/jobseor.png" alt="Логотип компании"  class="logotype" />
                </a>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-6 float_right" style="margin-left: -15px;" id="headermenu">
                <div class="dropdown enter">
                    <a href="/visa-country.php" style="padding-left: 10px; padding-right: 10px">Визы и страны</a>
                    <a href="/poisk-rezume.php" style="padding-left: 10px; padding-right: 10px;">Найти резюме</a>
                    <a href="/resume/add" style="padding-left: 10px; padding-right: 10px;">Добавить резюме</a>
                    <a href="/dobavit-vakansiyu.php" style="padding-left: 10px; padding-right: 10px;">Добавить вакансию</a>
                <?php if ($user->username): ?>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                         Привет <?php echo $user->username; ?>
                    </a>
                    <ul class="dropdown-menu" style=" left: 83%;">
                        <li><a href="/user">Личный кабинет</a></li>
                        <li><a href="/user/logout">Выход</a></li>
                    </ul>

                    <?php else:?>
                    <a href="/user/login" style="padding-left: 10px; padding-right: 10px;">Войти</a>
                    <?php endif; ?>
                    <!--
                                    <ul id="nav">
                                       <li>
                                      <a>Язык</a>
                                  <ul>
                                      <div class="uldiv">
                                     <li><a class="lia" href="#">Русский</a></li>
                                     <li><a class="lia" href="#">English</a></li>
                                     <li><a class="lia" href="#">Polski</a></li>
                                     <li><a class="lia" href="#">Deutsch</a></li>
                                     <li><a class="lia" href="#">Français</a></li>
                                      </div>
                                  </ul>
                                   </li>
                                      </ul>
                    -->
                </div>
            </div>
        </div>
    </div>
</header>