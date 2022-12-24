<!doctype html>
<html lang="en">

<head>
    <?= $this->include('layouts/title-meta') ?>
    <?= $this->include('layouts/css') ?>
</head>

<body data-sidebar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?= $this->include('layouts/topbar') ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?= $this->include('layouts/sidebar') ?>

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" id="result">
            <div class="page-content">
                <?= $this->include('layouts/page-title') ?>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="<?= base_url(session('role') . '/task/edit_submit/' . $record['id']) ?>" method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/task') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel create task?');">Cancel</a>
                                        </div>



                                        <div class="row mb-5">
                                            <h6 class="mb-3">Task Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Task Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="task_owner" id="task_owner">
                                                        <option disabled selected>-None-</option>
                                                        <option <?= (1 == $record['task_owner'] ? 'selected="selected"' : '') ?> value="1">Owner 1</option>
                                                        <option <?= (2 == $record['task_owner'] ? 'selected="selected"' : '') ?> value="2">Owner 2</option>
                                                        <option <?= (3 == $record['task_owner'] ? 'selected="selected"' : '') ?> value="3">Owner 3</option>
                                                        <option <?= (4 == $record['task_owner'] ? 'selected="selected"' : '') ?> value="4">Owner 4</option>
                                                    </select>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Current PIC Name (Task)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="PIC_name" id="PIC_name">
                                                        <option value="None" hidden>-None-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" id="type" name="type">
                                                        <option hidden>-None-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Subject</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= $record['subject'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Due Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" id="due_date" name="due_date" value="<?= $record['due_date'] ?>">
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Contact</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="<?= $record['contact'] ?>" id="contact" name="contact">
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Contact</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="contact" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php
                                                        foreach ($contacts as $contact) {
                                                        ?>
                                                            <option value="<?= $contact['lastName'] ?>"><?= $contact['lastName'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label"> Account</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="account" name="account" value="<?= $record['account'] ?>">
                                                    <div class="input-group-prepend">

                                                        <div class="input-group-text h-100"><i class="fa fa-users"></i></div>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="account" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php
                                                        foreach ($accounts as $acc) {
                                                        ?>
                                                            <option value="<?= $acc['accountname'] ?>"><?= $acc['accountname'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Status</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="status">

                                                        <option diabled selected hidden>-None-</option>
                                                        <option <?= (2 == $record['status'] ? 'selected="selected"' : '') ?> value="2">Just Started</option>
                                                        <option <?= (1 == $record['status'] ? 'selected="selected"' : '') ?> value="1">completed</option>
                                                        <option <?= (0 == $record['status'] ? 'selected="selected"' : '') ?> value="0">On Going</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Priority</label>
                                                <div class="input-group">
                                                    <select class="form-select" id="priority" name="priority">
                                                        <option hidden>-None-</option>
                                                        <option value="2">High</option>
                                                        <option value="1">Medium</option>
                                                        <option value="0">Low</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <label class="col-form-label">Repeat</label>
                                                <div class="input-group">
                                                    <!-- <div class="input-group-prepend bg-danger" style="width:3px;"></div> -->
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="repeat" <?= (1 == $record['repeat'] ? 'checked="checked"' : '') ?>>
                                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Reminder</label>
                                                <div class="input-group">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="reminder" <?= (1 == $record['reminder'] ? 'checked="checked"' : '') ?>>
                                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"><?= $record['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->

                </div>
                <!-- End Page-content -->

                <?= $this->include('layouts/footer') ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <?= $this->include('layouts/script') ?>
</body>

</html>