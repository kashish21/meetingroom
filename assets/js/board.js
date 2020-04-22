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

    $(document).on('click', '.board_edit_data', function () {
        
        var id = $(this).attr('data-id');
        $.ajax({
            url:_base_url + "admin/board/get_board/"+id,
            method:"post",
            data:{},
                    // dataType:"json",
            success:function(data)
            {
                console.log(data);
                var obj1 = JSON.parse(data);  
                $('#board_id').val(obj1[0].id);
                $('#_board').val(obj1[0].board);                       
                $('#_sort_order').val(obj1[0].sort_order);                       
                $('#board_edit_Modal').modal('show');
            }
        });
    });




    // Status Change
    $('.status-change').change(function () {
        var id = $(this).data('id');
        var ckb = $(this).is(':checked');
        
        $.post(_base_url + "admin/board/change_status/" + id + '/' + ckb, function (data, status) {
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