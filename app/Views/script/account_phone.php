<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script type="text/javascript">
const phoneInputField = document.querySelector("#phonenumber");
const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry: "us",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

const secondInputField = document.querySelector("#secondaryphone");
const secondInput = window.intlTelInput(secondInputField, {
    initialCountry: "us",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

const faxInputField = document.querySelector("#fax");
const faxInput = window.intlTelInput(faxInputField, {
    initialCountry: "us",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

$("#secondary").hide();
$("#hassecondaryphone").click(function() {
    if ($(this).is(":checked")) {
        $("#secondary").show();
    } else {
        $("#secondary").hide();
    }
});
</script>