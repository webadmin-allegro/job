<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/media/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300" rel="stylesheet">
</head>
<body>


<?php echo View::factory('/pages/header');?>

<?php if(!empty($content)) echo $content; ?>

<?php echo View::factory('/pages/footer');?>

</body>
</html>
