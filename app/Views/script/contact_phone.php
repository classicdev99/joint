<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
const officeInputField = document.querySelector("#officephone");
const officeInput = window.intlTelInput(officeInputField, {
    initialCountry: "us",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
const mobileInputField = document.querySelector("#mobile");
const mobileInput = window.intlTelInput(mobileInputField, {
    initialCountry: "us",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
const secondInputField = document.querySelector("#secondaryphone");
const secondInput = window.intlTelInput(secondInputField, {
    initialCountry: "us",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry: "us",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

function getInfo(e) {
    // var a = $('#AccountId option:selected').text();
    // $('#AccountName').val(a);
}

$("#secondary").hide();
$("#hassecondaryphone").click(function() {
    if ($(this).is(":checked")) {
        $("#secondary").show();
    } else {
        $("#secondary").hide();
    }
});
$("#secondary_email").hide();
$("#hassecondaryemail").click(function() {
    if ($(this).is(":checked")) {
        $("#secondary_email").show();
    } else {
        $("#secondary_email").hide();
    }
});
</script>