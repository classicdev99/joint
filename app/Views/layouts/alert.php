<?php
    if(!empty(session()->getFlashdata('registered'))) {
        echo "<div class='alert alert-success'>".session()->getFlashdata('registered')."</div>";
        session()->destroy();
    }
    if(!empty(session()->getFlashdata('log out'))) {
        echo "<div class='alert alert-primary'>".session()->getFlashdata('log out')."</div>";
        session()->destroy();
    }

    if(!empty(session()->getFlashdata('status'))) {
        echo "<div class='alert alert-primary'>".session()->getFlashdata('status')."</div>";
    }
    
    if(!empty(session()->getFlashdata('warning'))) {
        echo "<div class='alert alert-warning'>".session()->getFlashdata('warning')."</div>";
    }
    
    if(!empty(session()->getFlashdata('error'))) {
        echo "<div class='alert alert-danger'>".session()->getFlashdata('error')."</div>";
    }

    if(!empty(session()->getFlashdata('login_error'))) {
        echo "<div class='alert alert-danger'>".session()->getFlashdata('login_error')."</div>";
    }
    
    if(!empty(session()->getFlashdata('not_admin'))) {
        echo "<div class='alert alert-danger'>".session()->getFlashdata('not_admin')."</div>";
    }
?>