/*
Template Name: Nazox -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: Table editable Init Js File
*/

$(function () {
    var pickers = {};
    $('.table-edits tr').editable({
        dropdowns: {
            gender: ['Male', 'Female']
          },
        edit: function (values) {
            $(".edit i", this)
                .removeClass('fa-pencil-alt')
                .addClass('fa-save')
                .attr('title', 'Save');
        },
        save: function (values) {
            $(".edit i", this)
                .removeClass('fa-save')
                .addClass('fa-pencil-alt')
                .attr('title', 'Edit');

            if (this in pickers) {
                pickers[this].destroy();
                delete pickers[this];
            }
        },
        cancel: function (values) {
            $(".edit i", this)
                .removeClass('fa-save')
                .addClass('fa-pencil-alt')
                .attr('title', 'Edit');

            if (this in pickers) {
                pickers[this].destroy();
                delete pickers[this];
            }
        }
    });
});