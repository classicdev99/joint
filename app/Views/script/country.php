<script src=<?= base_url('assets/js/geodatasource-cr.min.js')?>></script>
<link rel="gettext" type="application/x-po" href=<?=base_url('languages/en/LC_MESSAGES/en.po')?> />
<script type="text/javascript" src=<?=base_url('assets/js/Gettext.js')?>></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#region").on("change", function() {
        $("#display").html("You have selected " + $("#country").children("option").filter(
            ":selected").text() + " > " + $(this).children("option").filter(":selected").text());
        jQuery("#country_h").val($("#country").children("option").filter(":selected").text());
        jQuery("#region_h").val($(this).children("option").filter(":selected").text());
    });
});
</script>