<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .center{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            box-shadow: 0 0 9px 1px #777272;
            border-radius:8px;
            padding:20px;
            text-align:center;
        }
        p{
            font-size:20px;
        }
    </style>
</head>
<body>
    <div class="container center col-md-6">
        <h1>Hi <b><?php echo $_SESSION['name'] ?></b></h1><br>
        <p>According to your information, you are the citizen of <b><?php echo $_SESSION['countries'] ?></b></p>
        <p>And your full address is - <b><?php echo $_SESSION['cities'] ?>,<?php echo $_SESSION['states'] ?>,<?php echo $_SESSION['countries'] ?></b></p>
    </div>
</body>
</html>