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
                    <li role="presentation" <?php if ($add_update == 1){ ?>class="active" <?php } ?>><a href="#institutions" data-toggle="tab">Institutions</a></li>
                    <li role="presentation" <?php if ($add_update == 2){ ?>class="active" <?php } ?>><a href="#new" data-toggle="tab"><?php echo $button_title; ?></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" <?php if ($add_update == 1){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?> id="institutions">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Institution</th>
                                <th>Address</th>
                                <th>Contact Name</th>
                                <th>Contact Phone</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Institution</th>
                                <th>Address</th>
                                <th>Contact Name</th>
                                <th>Contact Phone</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if ($institutions_table != "" )
                            {
                                echo $institutions_table;
                            }
                            else{
                                ?>
                                <tr>
                                    <td colspan="6"><center>No institutions to display</center></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" <?php if ($add_update == 2){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?> id="new">
                        <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Institutions/post_institution/<?php echo $add_update; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                    <label for="motto">Institution Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" id="institution_id" name="institution_id" value="<?php echo $institution_id; ?>">
                                            <input type="text" id="institution" name="institution" class="form-control" placeholder="Enter Institution Name" value="<?php echo $institution; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="motto">Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="<?php echo $address; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="motto">City</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="city" name="city" class="form-control" placeholder="Enter City" value="<?php echo $city; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="state">State</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="statedd">
                                                <option value="">-- Please Select State--</option>
                                                <?php echo $states; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="motto">Contact Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Contact Name" value="<?php echo $name; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="motto">Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Contact Phone Number" value="<?php echo $phone; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <label for="motto">Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter Contact Email Address" value="<?php echo $email; ?>">

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

    </div>
</div>


<!-- #END# Basic Examples -->

