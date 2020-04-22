'use strict';
$(document).ready(function() {

    var table = $('#chapters').DataTable({
        "processing": true,
        "serverSide": true,
       "ajax":{
              "url": _base_url + 'admin/Chapter/posts',
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
                  { "data": "chapter" },
                  { "data": "sort_order" },
                  { "data": "content_add" },
                  { "data": "assignment_add" },
                  { "data": "topics_add" },
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

        $.post(_base_url + "admin/Chapter/change_status/" + id + '/' + ckb, function (data, status) {
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

       $(document).on('click','.chapter_edit_data',function(e){
            
                e.preventDefault();
                var id = $(this).attr('data-id');
                
                $.ajax({
                    url:_base_url + "admin/chapter/get_chapter/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        
                        var obj1 = JSON.parse(data);  
                        $('#edit_chapter').val(obj1[0].chapter);                        
                        $('#edit_description').val(obj1[0].description);
                        $('#chapter_id').val(obj1[0].id);
                        $('#edit_sort_order').val(obj1[0].sort_order);
                        
                       $('#chapter_image_preview').attr("src", obj1[0].thumb_url);
                        $('#chapter_edit_Modal').modal('show');
                    }
                });
            });


       $(document).on('click','.chapter_assignment_edit_data',function(e){
            
                e.preventDefault();
                var id = $(this).attr('data-id');
                
                $.ajax({
                    url:_base_url + "admin/chapter/get_assignment/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        
                        var obj1 = JSON.parse(data);  
                        $('#edit_title').val(obj1[0].title);                        
                        
                        $('#assignment_id').val(obj1[0].id);
                         $('#assign_image').attr("href", obj1[0].upload_url);
                         $('#assign_image').html(obj1[0].upload);
                       
                        $('#chapter_assignment_edit_Modal').modal('show');
                    }
                });
            });



} );