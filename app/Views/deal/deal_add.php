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
                                <form action="<?= base_url(session('role') . '/deal/add_submit') ?>" method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/deal') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel create deal?');">Cancel</a>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Deal Information</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Type</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="type">
                                                        <option value="Type one">Type one</option>
                                                        <option value="Type two">Type two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Deal Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="dealName">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Deal Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="dealOwner">
                                                        <option value="deal owner one">deal owner one</option>
                                                        <option value="deal owner two">deal owner two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Closing Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="closingDate">
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="accountName">
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="accountName" class="form-select">
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
                                                <label class="col-form-label">Lead Source</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="leadSource">
                                                        <option value="Lead Source one">Lead Source one</option>
                                                        <option value="Lead Source two">Lead Source two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="contactName">
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="contactName" class="form-select">
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

                                            <div class="col-md-6">
                                                <label class="col-form-label">Model</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="model">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Amount</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="amount">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="productName">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Stage</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="stage">
                                                        <option value="stage one">stage one</option>
                                                        <option value="stage two">stage two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Brands</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="brands">
                                                        <option value="brands one">brands one</option>
                                                        <option value="brands two">brands two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Customer Type</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="customerType">
                                                        <option value="Customer Type one">Customer Type one</option>
                                                        <option value="Customer Type two">Customer Type two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Serial No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="serialNo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Bee Opportunity No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="beeOpportunityNo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Warranty Status</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="warrantyStatus">
                                                        <option value="Warranty Status one">Warranty Status one</option>
                                                        <option value="Warranty Status two">Warranty Status two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Enquiry Type</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="enquiryType">
                                                        <option value="Enquiry Type one">Enquiry Type one</option>
                                                        <option value="Enquiry Type two">Enquiry Type two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Purchased Date</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="purchasedDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">PIC Name</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="PICName">
                                                        <option value="PIC Name one">PIC Name one</option>
                                                        <option value="PIC Name two">PIC Name two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">IRS Refrer</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="IRSRefer">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Device Info (Loan/Calib must fill)</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Sent Calibration Status</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="sentCalibrationStatus">
                                                        <option value="Sent Calibration Status one">Sent Calibration Status one</option>
                                                        <option value="Sent Calibration Status two">Sent Calibration Status two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">External Lab</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="externalLab">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">TDO Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="TDODate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Calibration Due Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="calibrationDueDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">TDO No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="TDONo">
                                                </div>
                                            </div>

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">On Loan Status</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="onLoanStatus">
                                                        <option value="On Loan Status one">On Loan Status one</option>
                                                        <option value="On Loan Status two">On Loan Status two</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Process Column</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Quotation No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="quotationNo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Delivered By</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="deliveredBy">
                                                        <option value="Delivered By one">Delivered By one</option>
                                                        <option value="Delivered By two">Delivered By two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Quotation Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="quotationDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Lost Reason</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="lostReason">
                                                        <option value="Lost Reason one">Lost Reason one</option>
                                                        <option value="Lost Reason two">Lost Reason two</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Repair Info</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Inspection By</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="inspectionBy">
                                                        <option value="Inspection By one">Inspection By one</option>
                                                        <option value="Inspection By two">Inspection By two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Repair Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="repairDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Inspection Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="inspectionDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Goods In Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="goodsInDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Ordering Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="orderingDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">invoicing Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="invoicingDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Ordering No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="orderingNo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">invoicing No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="invoicingNo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Distribution Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="distributionDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Send Back DO</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="sendBackDO">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Distribution No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="distributionNo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Send Back Cust TDO Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="sendBackCustTDODate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Customer PO No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="customerPONo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Send Back Cust TDO No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="sendBackCustTDONo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Description Information</h6>

                                            <div class="col-md-12">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Cost info</h6>

                                            <div class="col-md-12">
                                                <label class="col-form-label">Cost Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="costdescription"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Cost Attachment</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="costAttachment">
                                                        <option value="Cost Attachment one">Cost Attachment one</option>
                                                        <option value="Cost Attachment two">Cost Attachment two</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
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