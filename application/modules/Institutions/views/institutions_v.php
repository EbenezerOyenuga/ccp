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

                <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Institution/add_institution">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <label for="motto">Institution</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="institution" name="institution" class="form-control" placeholder="Enter Institution Name" value="">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <label for="motto">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Contact Name" value="">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <label for="motto">Phone</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Contact Phone Number" value="">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <label for="motto">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter Contact Email Address" value="">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-sm-offset-10">

                            <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Add Institution</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Schools</th>
                        <th>Edit</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Schools</th>
                        <th>Edit</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    if ($institutions_table !="" )
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


            </div>
        </div>

    </div>


<!-- #END# Basic Examples -->

