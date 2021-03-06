<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | CCP Vehicle Owner Registration Page</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
<div class="signup-box">
    <div class="logo">
        <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/images/CCP_blue.jpg"></a>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_up" method="POST" action="<?php echo base_url(); ?>Users/signup" enctype="multipart/form-data">
                <div class="msg">Register as vehicle owner</div>
                <?php echo validation_errors('<p style="color: red" />'); ?>
                <?php if (isset($_SESSION['reg']))echo $_SESSION['reg'];?>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                      <select class="form-control show-tick" id="title" name="title">
                          <option value="">-- Please Select Title--</option>
                          <?php echo $titles; ?>
                      </select>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="surname" placeholder="Surname" value="<?php echo set_value('surname');?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo set_value('firstname');?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email');?>" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">contact_phone</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="phone" placeholder="Tel. Number" value="<?php echo set_value('phone');?>" required>
                    </div>
                </div>
                <div class="input-group">
                  <label>Users Picture</label>

                    <div class="form-line">
                        <input type="file" name="user_pic" />
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">directions_car</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="vehicle" placeholder="Vehicle Name" value="<?php echo set_value('vehicle');?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">drive_eta</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="vehicle_model" placeholder="Vehicle Model" value="<?php echo set_value('vehicle_model');?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">confirmation_number</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="plate_number" placeholder="Vehicle Plate Number" value="<?php echo set_value('plate_number');?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">drive_eta</i>
                        </span>
                    <div class="form-line">
                      <select class="form-control show-tick" id="vehicle_type" name="vehicle_type">
                          <option value="">-- Please Select Vehicle Type--</option>
                          <?php echo $vehicle_types; ?>
                      </select>
                    </div>
                </div>
                <div class="input-group">
                    <label>Vehicle Picture</label>
                    <div class="form-line">
                        <input type="file" name="vehicle_pic" />
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username');?>" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                    <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                </div>

                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                <div class="m-t-25 m-b--5 align-center">
                    <a href="<?php echo base_url(); ?>Login">You already have a membership?</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/examples/sign-up.js"></script>
</body>

</html>
