'use strict';
$(document).ready(function() {

    var chapter_id = $('#chapter_id').val();
    var table = $('#topics').DataTable({
        "processing": true,
        "serverSide": true,
       "ajax":{
              "url": _base_url + 'admin/Topic/posts',
             "dataType": "json",
             "type": "POST",
             "data":{ 'chapter_id':chapter_id },
             // "success":function(result)
             // {
             //    console.log(result);
             // }

        },

        "columns": [
                  { "data": "id" },
                  
                  { "data": "status" },
                  { "data": "topic" },
                  { "data": "sort_order" },
                  { "data": "content_add" },
                  // { "data": "assignment_add" },
                  // { "data": "created_on" },                 
                  
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

        $.post(_base_url + "admin/Topic/change_status/" + id + '/' + ckb, function (data, status) {
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

       $(document).on('click','.topic_edit_data',function(e){
            
                e.preventDefault();
                var id = $(this).attr('data-id');
                
                $.ajax({
                    url:_base_url + "admin/topic/get_topic/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        
                        var obj1 = JSON.parse(data);  
                        $('#edit_topic').val(obj1[0].topic);                        
                        $('#edit_description').val(obj1[0].description);
                        $('#t_chapter_id').val(obj1[0].chapter_id);
                        $('#topic_id').val(obj1[0].id);
                        // $('#topic_image').val(obj1[0].thumb_url);
                        $('#topic_image').attr("src", obj1[0].thumb_url);
                        $('#edit_sort_order').val(obj1[0].sort_order);
                       
                        $('#topic_edit_Modal').modal('show');
                    }
                });
            });



} );