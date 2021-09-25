<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/boxicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/login.css'); ?>">
    <title>Login</title>
</head>

<body>
    <div class="container mx-auto my-5 d-flex flex-column align-items-center justify-content-center text-center p-5">
        <?php echo form_open('login', array('class' => 'p-3')); ?>
            <div class="container-fluid mt-3 d-flex mx-auto flex-column align-items-center justify-content-center text-center">
                <div class="username d-flex align-items-center">
                    <i class="bx bxs-user"></i><input type="text" class="m-2 ps-5 p-2 w-100 rounded-pill form-control" name="username" id="username" placeholder="Username">
                </div>
                <div class="password d-flex align-items-center">
                    <i class="bx bxs-lock-alt"></i><input type="text" class="m-2 ps-5 p-2 w-100 rounded-pill form-control" name="password" id="password" placeholder="Password">
                </div>
                <button class="btn m-4 w-50 rounded-pill" type="submit">Login</button>
                <a href="#" class="nav-link text-white link-dark">Forgot Username/Password?</a>
            </div>
        <?php echo form_close(); ?>
    </div>
</body>

</html>