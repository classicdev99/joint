<!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
         <div class="row align-items-center">
             <div class="col-sm-6">
                 <div class="page-title">
                     <ol class="breadcrumb m-0">
                        <?php if(isset($li_1)):  ?>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $li_1 ?></a></li>
                        <?php endif ?>
                        <?php if(isset($li_2)):  ?>
                            <li class="breadcrumb-item <?php isset($li_3) ? '' : 'active' ?>"><a href="javascript: void(0);"><?= $li_2 ?></a></li>
                        <?php endif ?>
                        <?php if(isset($li_3)):  ?>
                            <li class="breadcrumb-item active"><a href="javascript: void(0);"><?= $li_3 ?></a></li>
                        <?php endif ?>
                     </ol>
                 </div>
             </div>
            
         </div>
        </div>
     </div>
<!-- end page title -->  