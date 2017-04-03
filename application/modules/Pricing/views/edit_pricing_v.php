<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?php echo $page_title; ?>
                </h2>
            </div>
            <div class="body">
                <ol class="breadcrumb">
                    <li class="active">Pricing</li>
                </ol>
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

                        <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Pricing/update_price">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label>Institution: <?php echo $institution; ?></label>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="state">State: <?php echo $state; ?></label>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="points">
                                    <label for='state'>Points: <?php echo $point; ?></label>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label for="state">Class Type: <?php echo $class; ?></label>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label for="motto">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">N</span>
                                        <div class="form-line">
                                            <input type="hidden" id="price_id" name="price_id" value="<?php echo $price_id; ?>">
                                            <input type="number" id="price" name="price" class="form-control" placeholder="Enter Price Tag" value="<?php echo $price; ?>">

                                        </div>
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-sm-offset-10">

                                    <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect"><?php echo $button_title; ?></button>
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
