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
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" <?php if ($add_update == 1){ ?>class="active" <?php } ?>><a href="#pricing" data-toggle="tab">Pricing</a></li>
                    <li role="presentation" <?php if ($add_update == 2){ ?>class="active" <?php } ?>><a href="#new" data-toggle="tab"><?php echo $button_title; ?></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" <?php if ($add_update == 1){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?> id="pricing">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Institution</th>
                                <th>State</th>
                                <th>State's Point</th>
                                <th>Class</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Institution</th>
                                <th>State</th>
                                <th>State's Point</th>
                                <th>Class</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if ($pricing_table != "" )
                            {
                                echo $pricing_table;
                            }
                            else{
                                ?>
                                <tr>
                                    <td colspan="6"><center>No pricing to display</center></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" <?php if ($add_update == 2){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?> id="new">
                        <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Pricing/post_price/<?php echo $add_update; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="state">Institution</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="instidd">
                                                <option value="">-- Please Select Institution--</option>
                                                <?php echo $institutions; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="state">State</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="statedd" id="statedd" onchange="load_state_points()">
                                                <option value="">-- Please Select State--</option>
                                                <?php echo $states; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="points">

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label for="state">Class Type</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="classdd">
                                                <option value="">-- Please Select Class--</option>
                                                <?php echo $classes; ?>
                                            </select>
                                        </div>
                                    </div>
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
