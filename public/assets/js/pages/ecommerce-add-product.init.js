/*
Template Name: Nazox -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: ecommerce add product Js File
*/

// wizard
$(document).ready(function() {
    $('#addproduct-nav-pills-wizard').bootstrapWizard({
        'tabClass': 'nav nav-pills nav-justified'
    });
});

// Select2
$(".select2").select2();

// Active tab pane on nav link

var triggerTabList = [].slice.call(document.querySelectorAll('.twitter-bs-wizard-nav .nav-link'))
triggerTabList.forEach(function (triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function (event) {
        event.preventDefault()
        tabTrigger.show()
    })
})
