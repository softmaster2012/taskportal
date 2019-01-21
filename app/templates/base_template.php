<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WebService for sysadmin tasks management">
    <meta name="author" content="Vladimir Popov">
    <link rel="icon" href="../../res/img/favicon.ico">
    <title>TaskPortal - <?=$this->view_title?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link href="../../res/css/base.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php include_once('app/templates/nav.php'); ?>
        <?php include_once('app/templates/header.php'); ?>    
    </header>
    <div class="container" style="text-align: center">
        <article>
            <?php include_once($this->view_path); ?>
        </article>
        <footer>
            <?php include_once('app/templates/footer.php'); ?> 
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="res/js/base.js"></script>
</body>
</html>
