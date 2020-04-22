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


     $(document).on('click','.subs_edit_data',function(e){
            
                e.preventDefault();
                var id = $(this).attr('data-id');
                
                $.ajax({
                    url:_base_url + "admin/subscription/get_subscription/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        console.log(data);
                        var obj1 = JSON.parse(data);  
                        $('#_subname').val(obj1[0].name);                        
                        $('#days12').val(obj1[0].days);
                        $('#subs_id').val(obj1[0].id);
                        $('#_sort_order').val(obj1[0].sort_order);
                        
                       
                        $('#subs_edit_Modal').modal('show');
                    }
                });
            });


    // Status Change
    $('.status-change').change(function () {
        var id = $(this).data('id');
        var ckb = $(this).is(':checked');
        
        $.post(_base_url + "admin/Subscription/change_status/" + id + '/' + ckb, function (data, status) {
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