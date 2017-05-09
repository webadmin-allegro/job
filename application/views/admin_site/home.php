<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">

<head>

    <!-- Styling Sheets   -->
    <link rel="stylesheet" type="text/css" href="/media/admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/media/admin/css/theme/jquery-ui-1.8.2.custom.css" />


    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css" /><![endif]-->
    <!-- End of Styling Sheets   -->

    <!-- Scripts  -->
    <script type="text/javascript" src="/media/admin/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/media/admin/js/jquery-ui-1.8.2.custom.min.js"></script>
    <script type="text/javascript" src="/media/admin/js/jQuery.tree.js"></script>
    <script type="text/javascript" src="/media/admin/js/cufon-yui.js"></script>
    <script type="text/javascript" src="/media/admin/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/media/admin/js/raphael-min.js"></script>
    <script type="text/javascript" src="/media/admin/js/custom.js"></script>
    <script type="text/javascript" src="/media/admin/js/admin.js"></script>
    <script type="text/javascript" src="/media/admin/js/category.js"></script>
    <script type="text/javascript" src="/media/admin/js/upload.js"></script>
    <!-- End of Scripts  -->


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Панель админа</title>
</head>

<body>

<!-- Start of Message Box, shows when message text is clicked  -->

<div id="message-box" title="Message Box">

    <h5>Message 1</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet ornare lacus.</p>
    <h5>Message 2</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet ornare lacus.</p>
    <h5>Message 3</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet ornare lacus.</p>

</div>

<!-- End of Message Box  -->

<div id="header"><!-- Start of Header -->


    <div id="notice-bar">

        <ul>  <!--  Start of Tab Controls -->
            <li><a href="#">Привет, <?php echo $user->username;?> </a></li>
            <li><a href="/admin_site/main/str">Личный кабинет</a></li>
            <!--<li><a href="#" id="message-button"> 1 Сообщения</a></li>-->
            <li><a href="/admin_site/user/logout">Выход</a></li>
            <!--<li><a href="" style="font-weight:bold; color:#FF0000">Exit</a></li> ,  <img src=/public_admin/css/icons/exit.png>-->
        </ul> <!--  End of Tab Controls --> <!--  End of Tab Controls -->
    </div><!-- Notice bar at the right side  -->
    <form action="#" method="post" id="search-bar"><!-- Start of AutoComplete Search Bar -->
        <fieldset>
            <input type="text" id="search"  class=" ui-corner-left"  /><input type="submit" value=" " id="search_submit"  />
        </fieldset><!-- End of Search Bar  -->
    </form>
    <a href="/admin_site/main/index"> <div align="center" style="font-weight: bold;font-size: 28px; color: #fff;">Админ панель</div></a>
</div><!-- End of Header  -->

<!--  End of Head Panel container -->



<div class="container"><!--  Start of container -->

    <div class="left-col"><!--  Start of Left Column -->

        <div class="ae-widget-sidebar  minimizable"><!--  Start of Widget Box -->
            <h4 class="ae-widget-header">Side Menu</h4><!--  Widget  header -->
            <div class="ae-widget-content"><!--  Start of Widget Content -->

                <ul style="font-weight: bold;color: #000000;font-size: 16px;">

                    <li><a href="/admin_site/main/resume">Резюме</a>
                        
                    </li>
                    <li><a href="/admin_site/main/users">Пользователи</a>
                    
                    </li>
                    <li><a class="main-item" href="javascript:void(0);">Настройки</a>
                        <ul class="sub-menu">
                            <li><a href="/admin_site/main/country">Страны</a></li>
                            <li><a href="/admin_site/main/lang">Языки</a></li>
                        </ul>


                    </li>
                    <li><a href="#">Статические страницы</a>

                    </li>

                </ul>


            </div><!--  End of Widget Content -->

        </div><!--  End of Widget Box -->

        <!--  End of Widget Box -->

<style>
    .sub-menu  { display: none; }
</style>
        <script>
            $( document ).ready(function() {
                $(".main-item").click(function () {
                    $(".sub-menu").toggle("slow");
                });

            });
        </script>
    </div><!--  End of Left Column -->

    <?php if (!empty($content)) echo $content;?>


    <div class="right-col"><!--  Start of Right Column -->

        <div class="ae-widget-sidebar"><!--  Start of Widget Box -->
            <h4 class="ae-widget-header">Recent Activities</h4>
            <div class="ae-widget-content">

                <ul style="font-weight: bold;color: #000000;font-size: 16px;">
                    <li><a href="#">О нас</a>


                    </li>
                    <li><a href="#">Контакты</a>

                    </li>
                    <li><a href="#">Promotions</a>

                    </li>
                    <li><a href="#">Delivery & Payment</a>

                    </li>
                    <li><a href="#">Партнеры</a>

                    </li>
                    <li><a href="#">FAQ</a>

                    </li>
                    <li><a href="#">Как заказать</a>

                    </li>
                </ul>


            </div>

        </div><!--  End of Widget Box -->


        <!--  End of Widget Box -->


    </div><!--  End of Right Column -->





</div><!--  End of container -->


</body>

</html>