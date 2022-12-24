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
                                    <form action="<?= base_url(session('role').'/lead/save_update/'.$lead['id']) ?>" method="post">
                                        <input type="hidden" name="_method" value="PUT" />
                                        <div class="card-body">
                                            <div class="d-flex flex-row-reverse">
                                                <button type="submit" name="submitaddlead" class="btn btn-primary mb-3">Save</button>
                                                <!-- <a href="<?= base_url(session('role').'/lead/add_submit') ?>" class="btn btn-primary mb-3">Save</a> -->
                                                &ensp;
                                                <a href="<?= base_url(session('role').'/lead') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel update lead?');">Cancel</a>
                                            </div>
                                                
                                            <div class="row mb-5">
                                                <h6 class="mb-3">Lead Information</h6>
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Lead Owner</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="updatedby" value="<?php echo $updatedby; ?>">
                                                        <select name="leadowner" class="form-select">
                                                            <option hidden>-None-</option>
                                                            <option value="1">Owner 1</option>
                                                            <option value="2">Owner 2</option>
                                                            <option value="3">Owner 3</option>
                                                            <option value="4">Owner 4</option>
                                                        </select>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text h-100"><i class="fa fa-user"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Lead Status</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <select name="leadstatus" class="form-select">
                                                            <option value="0">-None-</option>
                                                             <?php foreach ($leadstatus as $key => $value): ?>
                                                                <option <?=$lead['leadstatus']==$value['id']?'selected':''?> value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Prefix</label>
                                                    <div class="input-group">
                                                        <select name="prefix" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <?php foreach ($prefixes as $key => $prefix): ?>
                                                                <option <?=$lead['prefix']==$prefix['id']?'selected':''?> value="<?=$prefix['id'];?>"><?=$prefix['name'];?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Lead Source</label>
                                                    <div class="input-group">
                                                        <select name="leadsource" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <?php foreach ($leadsources as $key => $leadsource): ?>
                                                                <option <?=$lead['leadsource']==$leadsource['id']?'selected':''?> value="<?=$leadsource['id'];?>"><?=$leadsource['name'];?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Last Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <input name="lastname" type="text" class="form-control" value="<?= $lead['lastname']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Source Remark</label>
                                                    <div class="input-group">
                                                        <input name="sourceremark" type="text" class="form-control" value="<?= $lead['sourceremark']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Title</label>
                                                    <div class="input-group">
                                                        <input name="title" type="text" class="form-control" value="<?= $lead['title']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Industry</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <select name="industry" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <?php foreach ($industries as $key => $industry): ?>
                                                                <option <?=$lead['industry']==$industry['id']?'selected':''?> value="<?=$industry['id'];?>"><?=$industry['name'];?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Company</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <input name="company" type="text" class="form-control" value="<?= $lead['company']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Phone</label>
                                                    <div class="input-group">
                                                        <input name="phone" type="text" class="form-control" value="<?= $lead['phone']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Mobile</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <input name="mobile" type="text" class="form-control" value="<?= $lead['mobile']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Fax</label>
                                                    <div class="input-group">
                                                        <input name="fax" type="text" class="form-control" value="<?= $lead['fax']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <input name="email" type="text" class="form-control" value="<?= $lead['email']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Website</label>
                                                    <div class="input-group">
                                                        <input name="website" type="text" class="form-control" value="<?= $lead['website']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Secondary Email</label>
                                                    <div class="input-group">
                                                        <input name="secondaryemail" type="text" class="form-control" value="<?= $lead['secondaryemail']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label"></label>
                                                    <div class="form-check">
                                                    <input name="" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Email Opt Out
                                                    </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Customer Type</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <select name="customertype" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <?php foreach ($customertypes as $key => $customertype): ?>
                                                                <option <?=$lead['customertype']==$customertype['id']?'selected':''?> value="<?=$customertype['id'];?>"><?=$customertype['name'];?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Enquiry By</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <select name="enquiryby" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <option value="1">1.Product-OMM</option>
                                                            <option value="2">2.Product-OIS</option>
                                                            <option value="3">3.Product-Hardness</option>
                                                            <option value="4">4.Product-Metallurgical</option>
                                                            <option value="5">5.Product-Others</option>
                                                            <option value="6">Calibration</option>
                                                            <option value="7">Repairs</option>
                                                            <option value="8">Training/Measurement Services</option>
                                                            <option value="9">Desmond</option>
                                                            <option value="10">Frederick</option>
                                                            <option value="11">Jessica</option>
                                                            <option value="12">Jim</option>
                                                            <option value="13">Joel</option>
                                                            <option value="14">Kenny</option>
                                                            <option value="15">Lenny</option>
                                                            <option value="16">Nicole</option>
                                                            <option value="17">Shira</option>
                                                            <option value="18">Wish</option>
                                                            <option value="19">Zarith</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Action Required</label>
                                                    <div class="input-group">
                                                        <select name="actionrequired" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <?php foreach ($actionrequireds as $key => $actionrequired): ?>
                                                                <option <?=$lead['actionrequired']==$actionrequired['id']?'selected':''?> value="<?=$actionrequired['id'];?>"><?=$actionrequired['name'];?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Current PIC Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <select name="currentpic" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <option value="1">Lenny</option>
                                                            <option value="2">Desmond</option>
                                                            <option value="3">Nicole</option>
                                                            <option value="4">Jessica</option>
                                                            <option value="5">Soo</option>
                                                            <option value="6">Dayana</option>
                                                            <option value="7">Fareez</option>
                                                            <option value="8">Zarith</option>
                                                            <option value="9">Mira</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Categorized Product</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <select name="categorizedproduct" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <option value="1">Dimensional</option>
                                                            <option value="2">Hardness</option>
                                                            <option value="3">Hardness/Optical</option>
                                                            <option value="4">Master Calibration</option>
                                                            <option value="5">Measurement/Testing Services</option>
                                                            <option value="6">Metallographic</option>
                                                            <option value="7">NDT</option>
                                                            <option value="8">Optical</option>
                                                            <option value="9">Others</option>
                                                            <option value="10">Repair Services</option>
                                                            <option value="11">Systems</option>
                                                            <option value="12">Temperature</option>
                                                            <option value="13">Thread</option>
                                                            <option value="14">Torque/Weight/Force</option>
                                                            <option value="15">Training</option>
                                                            <option value="16">Upgrade/Refurbished Services</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6"></div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Brands</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <select name="brands" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <?php foreach ($brands as $key => $brand): ?>
                                                                <option <?=$lead['brands']==$brand['id']?'selected':''?> value="<?=$brand['id'];?>"><?=$brand['name'];?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6"></div>
                                            </div>        
                                        
                                            <div class="row mb-5">
                                                <h6 class="mb-3">Address Information</h6>
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Country</label>
                                                    <div class="input-group">
                                                        <input name="country" type="text" class="form-control" value="<?= $lead['country']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Street</label>
                                                    <div class="input-group">
                                                        <input name="street" type="text" class="form-control" value="<?= $lead['street']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">State</label>
                                                    <div class="input-group">
                                                        <input name="state" type="text" class="form-control" value="<?= $lead['state']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6"></div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">City</label>
                                                    <div class="input-group">
                                                        <input name="city" type="text" class="form-control" value="<?= $lead['city']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6"></div>
                                                
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Zip Code</label>
                                                    <div class="input-group">
                                                        <input name="code" type="text" class="form-control" value="<?= $lead['code']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6"></div>

                                            </div>
                                            
                                            <div class="row mb-5">
                                                <h6 class="mb-3">Description Information</h6>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Description</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                        <textarea name="descinformation" class="form-control"><?= $lead['descinformation']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-5">
                                                <h6 class="mb-3">System Information</h6>
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Bee Owner</label>
                                                    <div class="input-group">
                                                        <select name="systeminfo" class="form-select">
                                                            <option value="0">-None-</option>
                                                            <option value="1">Lenny</option>
                                                            <option value="2">Nicole</option>
                                                            <option value="3">Frederick</option>
                                                            <option value="4">Kenny</option>
                                                            <option value="5">Lenny Heng</option>
                                                            <option value="6">Nicole Chai</option>
                                                            <option value="7">Shira</option>
                                                            <option value="8">Zarith</option>
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