'use strict';
$(document).ready(function() {

 if($('#question').length) {
        CKEDITOR.replace('question');
    }

    if($('#Option_1').length) {
        CKEDITOR.replace('Option_1');
    }

if($('#Option_2').length) {
        CKEDITOR.replace('Option_2');
    }

if($('#Option_3').length) {
        CKEDITOR.replace('Option_3');
    }

    if($('#Option_4').length) {
        CKEDITOR.replace('Option_4');
    }

      if($('#solution').length) {
        CKEDITOR.replace('solution');
    }



    var table = $('#subjective').DataTable({
        "processing": true,
        "serverSide": true,
       "ajax":{
              "url": _base_url + 'admin/subjective/posts',
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
                  { "data": "total_question" },
                  // { "data": "correct_mark" },
                  { "data": "duration" },
                  // { "data": "sort_order" },
                  { "data": "questions_add" },
                                  
                  
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

        $.post(_base_url + "admin/subjective/change_status/" + id + '/' + ckb, function (data, status) {
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

       $(document).on('click','.upload_quiz',function(e){
                e.preventDefault();
                var id = $(this).attr('data-id');

                 $('#quiz_id').val(id);
                  $('#uploadquizModal').modal('show');
            });


    


} );