<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="<?= base_url('assets/images/layouts/layout-1.jpg') ?>" class="img-fluid img-thumbnail"
                    alt="layout-1">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="<?= base_url('assets/images/layouts/layout-2.jpg') ?>" class="img-fluid img-thumbnail"
                    alt="layout-2">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch"
                    data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="<?= base_url('assets/images/layouts/layout-3.jpg') ?>" class="img-fluid img-thumbnail"
                    alt="layout-3">
            </div>
            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch"
                    data-appStyle="assets/css/app-rtl.min.css">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>

<!-- Required datatable js -->
<script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Buttons examples -->
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/build/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') ?>"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

<!-- Datatable init js -->
<script src="<?= base_url('assets/js/pages/datatables.init.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>

<!-- apexcharts -->
<script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?>"></script>

<!-- Plugins js-->
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') ?>">
</script>

<script src="<?= base_url('assets/js/pages/dashboard.init.js') ?>"></script>

<script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
var Utility = function() {
    this.sweetAlert = function(icon, title) {
        Swal.fire({
            position: 'top-end',
            icon: icon,
            title: title,
            backdrop: false,
            showConfirmButton: false,
            timer: 1500
        });
    };
};

var util = new Utility();
</script>

<script type="text/javascript">
var date = new Date()
var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear()
var events = <?php echo json_encode(session('events')) ?>;

function showCalendar() {
    $('.bs-example-modal-xll').modal('show');
}
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
    },
    events: events
})

function showProducts() {
    $('.bs-example-modal-products').modal('show');
}

$('#invoice_table').find('.invoice-table-input').on("input", function() {
    $.fn.updateSummary();
});

$("#addProducts").click(function() {
    var index = 0;

    $table = $('#products_table');
    var message = "";
    var productNames = [];
    var productIds = [];
    $("#products_table input[type=checkbox]:checked").each(function() {
        var row = $(this).closest("tr")[0];
        productNames.push(row.cells[2].innerHTML);
        productIds.push(row.cells[4].innerHTML);
    });
    if (productNames.length == 0) {
        alert("Choose one product at least.");
        return;
    }
    $('#invoice_table tbody').html("");
    var i = 1;
    for (; index < productNames.length; index++) {
        // var i = $('#invoice_table tr:last').attr('id');
        // i = parseInt(i.replace('addr', ''));
        // var k = i + 1;
        // i = '' + i;

        $('#invoice_table').append('<tr id="addr' + i + '"></tr>');
        $('#addr' + i).html("<td>" + (i) +
            "</td><td><textarea cols='30' rows='1' class='form-control' name='productName" + i +
            "'  placeholder='description'>" + productNames[index] +
            "</textarea></td><td><input type='number' min='0' value='0' name='listPrice" +
            i +
            "' class='invoice-table-input form-control'/></td><td><input type='number' min='0' value='0'' name='quantity" +
            i +
            "' class='invoice-table-input form-control'/></td><td><input type='number' min='0' value='0' name='amount" +
            i +
            "' class='invoice-table-input form-control'/></td><td><input type='number' min='0' value='0' name='discount" +
            i +
            "' class='invoice-table-input form-control'/></td><td><input type='number' min='0' value='0' name='tax" +
            i +
            "' class='invoice-table-input form-control'/></td><td><input type='number' min='0' value='0' name='total" +
            i +
            "' class='invoice-table-input form-control'/></td><td> <a href = '" +
            "<?= base_url(session('role') . '/product/edit') ?>" + "/" + productIds[index] +
            "' class = 'btn btn-primary btn-sm form-control'title = 'Update quotes' ><i class = 'fas fa-edit'></i></a></td><td><input type='number' min='0' value='" +
            productIds[index] +
            "' name='productId" + i +
            "' class='invoice-table-input form-control' hidden/></td>"
        );
        i++;
    }

    $.fn.updateSummary();
});

$('#currency_name').on('focusin', function() {
    $(this).data('old', $(this).val());
});
$("#currency_name").on('change', function() {
    var currency_url = "<?= base_url(session('role') . '/quotes/change_currency') ?>";
    var i = $('#invoice_table tr:last').attr('id');
    i = parseInt(i.replace('addr', ''));
    $.ajax({
        url: currency_url,
        data: {
            old: $(this).data('old'),
            new: $(this).val()
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $('#currency_value').val(result[0]);
            var j = i;
            for (; j >= 1; j--) {
                $val = $('#addr' + j).find("[name='listPrice" + j + "']").val();
                $('#addr' + j).find("[name='listPrice" + j + "']").val($val * result[1]);
                $val = $('#addr' + j).find("[name='amount" + j + "']").val();
                $('#addr' + j).find("[name='amount" + j + "']").val($val * result[1]);
                $val = $('#addr' + j).find("[name='discount" + j + "']").val();
                $('#addr' + j).find("[name='discount" + j + "']").val($val * result[1]);
                $val = $('#addr' + j).find("[name='tax" + j + "']").val();
                $('#addr' + j).find("[name='tax" + j + "']").val($val * result[1]);
                $val = $('#addr' + j).find("[name='total" + j + "']").val();
                $('#addr' + j).find("[name='total" + j + "']").val($val * result[1]);
            }
            $.fn.updateSummary();
        }
    });

    $(this).data('old', $(this).val());
});

$.fn.updateSummary = function() {
    var i = $('#invoice_table tr:last').attr('id');
    i = parseInt(i.replace('addr', ''));
    var subTotal = 0;
    var discount = 0;
    var tax = 0;
    var adjustment = 0;
    var grandTotal = 0;
    var j = i;
    var val = 0;

    for (; j >= 0; j--) {
        val = $('#addr' + j).find("[name='total" + j + "']").val();
        val = parseInt(val);
        if (val > 0)
            subTotal += parseInt(val);
        val = $('#addr' + j).find("[name='discount" + j + "']").val();
        val = parseInt(val);
        if (val > 0)
            discount += parseInt(val);
        val = $('#addr' + j).find("[name='tax" + j + "']").val();
        val = parseInt(val);
        if (val > 0)
            tax += parseInt(val);
    }
    adjustment = subTotal - tax;
    grandTotal = subTotal - discount;

    $('#sum_sub_total').val(subTotal);
    $('#sum_discount').val(discount);
    $('#sum_tax').val(tax);
    $('#sum_adjustment').val(adjustment);
    $('#sum_grand_total').val(grandTotal);
}

function quotationStateChange() {
    $('.bs-quotation-state-waiting-quote').modal('show');
}
var quoteId = -1;
$(".quotation_clickable").click(function() {
    quoteId = $(this).closest("tr")[0].cells[0].innerHTML;
    var url = "<?= base_url(session('role') . '/quotes/get_state') ?>" + "/" + quoteId;
    $.ajax({
        url: url,
        dataType: 'json',
        method: 'GET',
        success: function(result) {
            //$('#currency_value').val(result[0]);
            $.fn.proceedQuote(result);
        }
    });
});

$.fn.proceedQuote = function(state) {
    if (!state) {
        $('.bs-quotation-state-waiting-quote').modal('show');
    }
    if (state == "advice") {
        $('.bs-quotation-state-advice').modal('show');
    }
    if (state == "lost") {
        $('.bs-quotation-state-lost').modal('show');
    }

    if (state == "proposal") {
        $('.bs-quotation-state-proposal').modal('show');
    }
    if (state == "follow") {
        $('.bs-quotation-state-follow').modal('show');
    }
    if (state == "ordering") {
        $('.bs-quotation-state-ordering').modal('show');
    }
    if (state == "pending") {
        $('.bs-quotation-state-pending').modal('show');
    }
    if (state == "spare") {
        $('.bs-quotation-state-spare').modal('show');
    }

    if (state == "loading") {
        $('.bs-quotation-state-loading').modal('show');
    }

    if (state == "closed") {
        $('.bs-quotation-state-closed').modal('show');
    }
}

function toAdvice() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "advice",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toLost() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "lost",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toManual() {
    if (quoteId == -1) return;
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "manual",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toProposal() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "proposal",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toFollow() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "follow",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toOrdering() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "ordering",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toPending() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "pending",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toSpare() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "spare",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toLoading() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "loading",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}

function toClosed() {
    if (quoteId == -1) return;
    var url = "<?= base_url(session('role') . '/quotes/change_state') ?>";
    $.ajax({
        url: url,
        data: {
            id: quoteId,
            state: "closed",
        },
        dataType: 'json',
        method: 'POST',
        success: function(result) {
            $.fn.proceedQuote(result);
        }
    });
}
</script>