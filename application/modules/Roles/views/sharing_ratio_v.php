<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?php echo $page_title; ?>
                </h2>
            </div>
            <div class="body">

                <?php if (isset($_SESSION['failed'])) {?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?php  echo $_SESSION['failed'];?>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['success'])) {?>
                    <div class="alert alert-success">
                        <?php  echo $_SESSION['success'];?>
                    </div>
                <?php } ?>

                <?php if (validation_errors() !="") {?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>

                        <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Roles/update_ratio">
                            <div class="row clearfix">
                                <?php echo $ratio_input; ?>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-sm-offset-9">

                                    <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Update Sharing Ratio</button>
                                </div>
                            </div>
                        </form>
            </div>

        </div>


    </div>
</div>


<!-- #END# Basic Examples -->
<script type="text/javascript">
    function load_state_points() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_state_points_select?state="+document.getElementById("statedd").value, false);
        xmlhttp.send(null);
        document.getElementById("points").innerHTML=xmlhttp.responseText;
    }
</script>
