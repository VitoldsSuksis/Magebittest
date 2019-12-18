<?php 
session_start();
include_once 'user.php';

$form_state = 'login';
$login_errors = array();
$register_errors = array();
$user = new User();

//var_dump($_POST);

if (isset($_POST['register-btn'])){
    $form_state = 'register';

    if (empty($_POST['fullname'])) {
        array_push($register_errors, 'Name required!');
    }
    if (empty($_POST['email'])) {
        array_push($register_errors, 'Email required!');
    }
    if (empty($_POST['password'])) {
        array_push($register_errors, 'Password required!');
    } 

    if (count($register_errors) == 0) {
        $register_result = $user->register($_POST['fullname'], $_POST['email'], $_POST['password']);    
        if ($register_result) {  
            header("location:index.php");     
        } else {
            array_push($register_errors, 'E-mail already in use');
        }
    }
    
} else if (isset($_POST['login-btn'])) {
    $login_result = $user->login($_POST['email'], $_POST['password']);
    if ($login_result) {
        header("location:index.php");
    } else {
        $form_state = 'login';
        array_push($login_errors, 'Wrong email or password');        
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body onload="formSlider()">
    <div class="login-register-container">
        <div class="login-panel">
            <h3>Don't have an account?</h3>
            <hr>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit amet consectetur adipisicing consectetur
                adipisicing elit. Repudiandae est maxime officiis unde quis?
            </p>
            <button class="dark-btn" id="dark-right">Sign Up</button>
        </div>
        <div class="register-panel">
            <h3>Have an account?</h3>
            <hr>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <button class="dark-btn" id="dark-left">Login</button>
        </div>

        <div class="login-register-form-container" id="formContainer">
            <div style="position: realtive;">

                <form class="login-box <?php echo $form_state == 'login' ? 'visible' : 'hidden' ?>" method="post" id="loginForm">
                    <div>
                        <p class="header-name">Login</p>
                        <img class="header-logo" src="images/head/logo.png" alt="logo">
                    </div>
                    <hr>
                    <div>
                        <img class="input-icons" src="images/icons/active/mail.png" alt="mail">
                        <input type="email" name="email" placeholder="Email*">
                    </div>
                    <div>
                        <img class="input-icons" src="images/icons/active/lock.png" alt="password">
                        <input type="password" name="password" placeholder="Password*">
                    </div>
                    <div>
                        <button type="submit" class="form-btn" name="login-btn">Login</button>
                        <a href="#">Forgot?</a>
                    </div>
                    <?php include('login-errors.php'); ?>
                </form>

                <form class="register-box <?php echo $form_state == 'login' ? 'hidden' : 'visible' ?>" method="post" id="registerForm">
                    <div>
                        <p class="header-name">Sign Up</p>
                        <img class="header-logo" src="images/head/logo.png" alt="logo">
                    </div>

                    <hr>
                    <div>
                        <img class="input-icons" src="images/icons/active/user.png" alt="name">
                        <input type="text" name="fullname" placeholder="Name*">
                    </div>
                    <div>
                        <img class="input-icons" src="images/icons/active/mail.png" alt="mail">
                        <input type="email" name="email" placeholder="Email*">
                    </div>
                    <div>
                        <img class="input-icons" src="images/icons/active/lock.png" alt="password">
                        <input type="password" name="password" placeholder="Password*">
                    </div>
                    <div>
                        <button type="submit" class="form-btn" name="register-btn">Sign Up</button>
                    </div>
                    <?php include('register-errors.php'); ?>
                </form>

            </div>
        </div>
    </div>

    <script>

        function formSlider() {

            var formState = '<?php echo $form_state ?>'; 

            var loginForm = document.getElementById('loginForm');
            var registerForm = document.getElementById('registerForm');

           var form = document.getElementById('formContainer');

            if (formState == 'register') {
                form.style.left = '30px';                
                form.style.right = 'calc(50% - 50px)';
            }

            var loginBtn = document.getElementById('dark-left');

            loginBtn.addEventListener('click', function () {

                var form = document.getElementById('formContainer');
                form.style.right = '30px';                
                form.style.left = 'calc(50% - 50px)';

                registerForm.classList.remove('visible');
                registerForm.classList.add('hidden');

                loginForm.classList.remove('hidden');
                loginForm.classList.add('visible');                
            });

            var registerBtn = document.getElementById('dark-right');

            registerBtn.addEventListener('click', function () {

                var form = document.getElementById('formContainer');
                form.style.left = '30px';
                form.style.right = 'calc(50% - 50px)';

                loginForm.classList.remove('visible');
                loginForm.classList.add('hidden');

                registerForm.classList.remove('hidden');
                registerForm.classList.add('visible');                
            });
        }
    </script>
</body>

</html>