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
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" <?php if ($add_update == 1){ ?>class="active" <?php } ?>><a href="#points" data-toggle="tab">Institutions</a></li>
                    <li role="presentation" <?php if ($add_update == 2){ ?>class="active" <?php } ?>><a href="#new" data-toggle="tab"><?php echo $button_title; ?></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" <?php if ($add_update == 1){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?> id="points">
                        <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="state">Point Types</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" id="pointdd" name="pointdd" onchange="load_pointtype()">
                                        <option value="">-- Please Select Point Location--</option>
                                        <option value="1">Institution</option>
                                        <option value="2">State</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="insti_state">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6" id="points_table">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Points</th>
                                    <th>Source</th>
                                    <th>Source Type</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Points</th>
                                    <th>Source</th>
                                    <th>Source Type</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                if ($points_table != "" )
                                {
                                    echo $points_table;
                                }
                                else{
                                    ?>
                                    <tr>
                                        <td colspan="6"><center>No points to display</center></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div role="tabpanel" <?php if ($add_update == 2){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?> id="new">
                        <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Points/post_point/<?php echo $add_update; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="state">Point Types</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="pointdds" name="pointdds" onchange="load_pointtypes()">
                                                <option value="">-- Please Select Point Location--</option>
                                                <option value="1">Institution</option>
                                                <option value="2">State</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="insti_states">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="point">
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
