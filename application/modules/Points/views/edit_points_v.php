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
                    <li class="active">Institutions</li>
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

                        <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Points/update_point/<?php echo $point_id; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label>Point Type:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label><?php if ($source_type == 1) {?>Institution<?php }else{ ?> State <?php } ?></label>

                                        </div>
                                    </div>
                                </div>
                                <?php if ($source_type == 1) { ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="insti_states">
                                        <label for="state">Institution:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php echo $insti; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($source_type == 2) { ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="insti_states">
                                        <option value="">-- Please Select State--</option>
                                        <?php echo $state; ?>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="point">
                                   <label for='point'>Point</label>
                                    <div class='form-group'>
                                        <div class='form-line'>
                                            <input type='text' id='point' name='point' class='form-control' placeholder='Enter Point Name' value="<?php echo $point; ?>"/>
                                        </div>
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
    function load_pointtype() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_point_type_table?type="+document.getElementById("pointdd").value, false);
        xmlhttp.send(null);
        document.getElementById("insti_state").innerHTML=xmlhttp.responseText;
        var xmlhttp_table = new XMLHttpRequest();
        xmlhttp_table.open("GET", "<?php echo base_url(); ?>Points/load_point_source_type_table?type="+document.getElementById("pointdd").value, false);
        xmlhttp_table.send(null);
        document.getElementById("points_table").innerHTML=xmlhttp_table.responseText;
    }

    function load_insti_table() {
        var xmlhttp_table = new XMLHttpRequest();
        xmlhttp_table.open("GET", "<?php echo base_url(); ?>Points/load_insti_table?insti="+document.getElementById("insti_state_dd").value, false);
        xmlhttp_table.send(null);
        document.getElementById("points_table").innerHTML=xmlhttp_table.responseText;
    }

    function load_state_table() {
        var xmlhttp_table = new XMLHttpRequest();
        xmlhttp_table.open("GET", "<?php echo base_url(); ?>Points/load_state_table?state="+document.getElementById("insti_state_dd").value, false);
        xmlhttp_table.send(null);
        document.getElementById("points_table").innerHTML=xmlhttp_table.responseText;
    }

    function load_pointtypes() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_point_type?type="+document.getElementById("pointdds").value, false);
        xmlhttp.send(null);
        document.getElementById("insti_states").innerHTML=xmlhttp.responseText;
    }

    function load_textbox() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_text_box?type="+document.getElementById("pointdds").value, false);
        xmlhttp.send(null);
        document.getElementById("point").innerHTML=xmlhttp.responseText;

    }
</script>
