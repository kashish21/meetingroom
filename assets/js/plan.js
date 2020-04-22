'use strict';
$(document).ready(function() {

    if($('#editor-demo1').length) {
        CKEDITOR.replace('editor-demo1');
    }

        $(document).on('change', '.discount_type', function () {

            var discount_type = $(this).val();
            var discount_value = $('#discount_value').val();
            var mrp = $('#mrp').val();
            var price = "";
            if(mrp == '')
            {
              $('#msg').html('<div class="alert alert-danger">Please Enter MRP.</div>');
              return false;
            }

            if(discount_value == '')
            {
              $('#msg').html('<div class="alert alert-danger">Please Enter Discount Value.</div>');
              return false;
            }
            if(discount_type == 'flat')
            {
              var price = mrp - discount_value;
            }

            if(discount_type == 'percentage')
            {
              var percent_value = (discount_value * mrp)/100;
              var price = mrp - percent_value;
            }

            $('#price').val(price);
            

        });

         $(document).on('click','.sub_price_edit_data',function(e){
            
                e.preventDefault();
                var id = $(this).attr('data-id');
                
                $.ajax({
                    url:_base_url + "admin/plan/get_plan_price/"+id,
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





    var table = $('#plans').DataTable({
        "processing": true,
        "serverSide": true,
       "ajax":{
              "url": _base_url + 'admin/plan/posts',
             "dataType": "json",
             "type": "POST",
             "data":{  },
             // "success":function(result)
             // {
             //    console.log(result);
             // }

        },

        "columns": [
                  { "data": "id" },
                  
                  { "data": "status" },
                  { "data": "name" },
                  
                  { "data": "image" },
                  { "data": "sort_order" },
                  { "data": "course_add" },
                  { "data": "price_add" },
                  { "data": "actions" },

               ],

               "columnDefs": [ {
                          "targets"  : '',
                          "orderable": false,
                          
                        }
                        ],
        rowReorder: {
            dataSrc: 'sort_order'
        }


    });

    $(document).on('change', '.status-change', function () {
         var id = $(this).data('id');
        var ckb = $(this).is(':checked');

        $.post(_base_url + "admin/Plan/change_status/" + id + '/' + ckb, function (data, status) {
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


      


      



} );