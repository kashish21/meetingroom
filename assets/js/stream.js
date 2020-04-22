'use strict';

(function ($) {

    toastr.options = {
        timeOut: 2000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };



    // Status Change
    $('.status-change').change(function () {
        var id = $(this).data('id');
        var ckb = $(this).is(':checked');
        
        $.post(_base_url + "admin/Stream/change_status/" + id + '/' + ckb, function (data, status) {
            if (ckb && data) {
                toastr.success('Successfully Activated!');
            }
            else if (ckb == false && data) {
                toastr.warning('Successfully Deactivated!');
            }
            else {
                toastr.warning('Please Try Again!');
            }

        });
    });


/*subject status*/
    // Status Change
    $('.status-change').change(function () {
        var id = $(this).data('id');
        var ckb = $(this).is(':checked');
        
        $.post(_base_url + "admin/Subject/change_status/" + id + '/' + ckb, function (data, status) {
            if (ckb && data) {
                toastr.success('Successfully Activated!');
            }
            else if (ckb == false && data) {
                toastr.warning('Successfully Deactivated!');
            }
            else {
                toastr.warning('Please Try Again!');
            }

        });
    });





  
   

    

})(jQuery);