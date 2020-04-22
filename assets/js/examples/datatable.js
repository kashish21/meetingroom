'use strict';
$(document).ready(function() {

    var table = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
       "ajax":{
              "url": _base_url + 'admin/Users/posts',
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
                  { "data": "username" },
                  { "data": "email_mobile" },
                  // { "data": "gender" },
                  { "data": "created_on" },                 
                  
                  { "data": "actions" },

               ],

               "columnDefs": [ {
                          "targets"  : '',
                          "orderable": false,
                          
                        }
                        ],
        rowReorder: {
            dataSrc: 'id'
        }


    });

    $(document).on('change', '.status-change', function () {
         var id = $(this).data('id');
        var ckb = $(this).is(':checked');

        $.post(_base_url + "user-change-status/" + id + '/' + ckb, function (data, status) {
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