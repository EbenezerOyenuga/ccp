<?php if ($this->session->userdata('loggedin') == 1 && $this->session->userdata('user_role') == 4){

 ?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Citizenship Grading System::<?php echo $page_title ?></title>

    <!-- Font awesome -->

    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
<div class="brand clearfix">
    <a class="logo"><img src="<?php echo base_url(); ?>assets/img/bulogo1.png" class="img-responsive" alt=""></a>
    <span class="menu-btn"><i class="fa fa-bars"></i></span>
    <ul class="ts-profile-nav">
        <li class="ts-account">
            <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> <?php echo ($this->session->userdata('username')); ?> <i class="fa fa-angle-down hidden-side"></i></a>
            <ul>
                <li><a href="<?php echo base_url(); ?>Admin/change_password">Change Password</a></li>
                <li><a href="<?php echo base_url(); ?>Login/sign_out">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="ts-main-content">
    <nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">

            <li class="ts-label">Citizenship Grading System</li>
            <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url().'Admin/load_semesters'; ?>"><i class="fa fa-users"></i> Load Students</a></li>
            <li><a href="<?php echo base_url().'Admin/users'; ?>"><i class="fa fa-users"></i> Manage Users</a></li>
            <li><a href="<?php echo base_url().'Admin/pass'; ?>"><i class="fa fa-check-circle"></i> Manage Pass Mark</a></li>
            <li><a href="<?php echo base_url().'Admin/weights'; ?>"><i class="fa fa-check-circle"></i> Manage Weights</a></li>
            <li><a href="<?php echo base_url().'Admin/requirements'; ?>"><i class="fa fa-check-circle"></i> Manage Requirements</a></li>
            <li><a href="<?php echo base_url().'Admin/graded_semesters'; ?>"><i class="fa fa-list"></i> View Scores</a></li>
            <li><a href="<?php echo base_url().'Admin/show_resubmission_requests'; ?>"><i class="fa fa-check-circle"></i> Approve Resubmission Request (<?php echo $num_resub_req; ?>)</a></li>
            <li><a href="<?php echo base_url().'Admin/show_pending_resubmissions'; ?>"><i class="fa fa-check-circle"></i> Approved Resubmissions Pending(<?php echo $num_resub_pending; ?>)</a></li>
            <li><a href="<?php echo base_url().'Admin/show_resubmissions'; ?>"><i class="fa fa-check-circle"></i> Approved Resubmissions (<?php echo $num_resubs; ?>)</a></li>
            <li><a href="<?php echo base_url().'Admin/show_rejections'; ?>"><i class="fa fa-check-circle"></i> Rejected Requests (<?php echo $num_rej; ?>)</a></li>
            <li><a href="<?php echo base_url().'Admin/forwarded_semesters'; ?>"><i class="fa fa-check-circle"></i> Forwarded Scores (<?php echo $num_for; ?>)</a></li>

        </ul>
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <h2 class="page-title"><?php echo $page_title ?></h2>
                    <?php $this->load->view($content_view); ?>

                </div>
            </div>

           

        </div>
    </div>
</div>

<!-- Loading Scripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fileinput.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chartData.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>

</html>
<?php } else {redirect(base_url().'Login');}