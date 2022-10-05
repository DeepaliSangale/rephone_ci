$(function () {
    "use strict";

    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: true
    }),
            $('.timepicker').pickatime()



    $('#date-time').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm'
    });
    $('.material-date').bootstrapMaterialDatePicker({
        time: false,
        format: 'DD-MM-YYYY'
    });
    $('#time').bootstrapMaterialDatePicker({
        date: false,
        format: 'HH:mm'
    });



});