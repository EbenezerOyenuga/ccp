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
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" <?php if ($add_update == 1){ ?>class="active" <?php } ?>><a href="#states" data-toggle="tab">Class Types</a></li>
                    <li role="presentation" <?php if ($add_update == 2){ ?>class="active" <?php } ?>><a href="#new" data-toggle="tab"><?php echo $button_title; ?></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" <?php if ($add_update == 1){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?>>
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Class Types</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Class Types</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if ($classes_table != "" )
                            {
                                echo $classes_table;
                            }
                            else{
                                ?>
                                <tr>
                                    <td colspan="6"><center>No class types to display</center></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" <?php if ($add_update == 2){ ?>class="tab-pane fade in active"  <?php } else { ?> class="tab-pane fade" <?php } ?> id="new">
                        <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Classtype/post_class_type/<?php echo $add_update; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label for="motto">Class Types</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" id="class_id" name="class_id" value="<?php echo $class_id; ?>">
                                            <input type="text" id="class_type" name="class_type" class="form-control" placeholder="Enter Class Types" value="<?php echo $class_type; ?>">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

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

