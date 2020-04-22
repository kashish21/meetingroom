'use strict';
$(document).ready(function() {

    if($('#editor-demo1').length) {
        CKEDITOR.replace('editor-demo1');
    }

   
    $(document).on('change', '#tag_id', function () {
        var tag_name = $(this).val();
        $.ajax({
          type:"post",
          data:{"tag_name":tag_name},
          url:_base_url + "admin/course/getChapterBytagid",
         beforeSend: function(){
            $('#chapter_id1234').empty();
         },
          success:function(result){

            var obj = JSON.parse(result);

                if($.isEmptyObject(obj)) {
                       $('#chapter_id1234').append('<option value="">No subject Available</option>');
                  }else 
                  {
                      $.each( obj, function( key, value ) 
                      {
                        $('#chapter_id1234').append('<option value="'+value.id+'">'+value.chapter+'</option>');                    
                      });   
                  }

          }

        });
        
         
    });



    var table = $('#courses').DataTable({
        "processing": true,
        "serverSide": true,
       "ajax":{
              "url": _base_url + 'admin/Course/posts',
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
                  { "data": "chapter_add" },
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

        $.post(_base_url + "admin/Course/change_status/" + id + '/' + ckb, function (data, status) {
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