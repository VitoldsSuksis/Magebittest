<?php 
session_start();
if($_SESSION["fullname"]) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Magebit</title>
    </head>
    <body>
        <p>Hello <?php echo $_SESSION['fullname'] ?></p>
        <a href="logout.php">Logout</a>
    </body>
    </html>
<?php } else {
    header("location:login.php");
} ?>
