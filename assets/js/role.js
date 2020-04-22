'use strict';
$(document).ready(function(){

    $(document).on('change', '#group_name', function () {
        var group_name = $(this).val();
        
        $.ajax({
            type:"post",
            url:_base_url + "admin/role/get_module",
            data:{"group_name":group_name},
            beforeSend: function(){
                $('#module_name').empty('');
            },
            success:function(result)
            {
                var obj = JSON.parse(result);
                if($.isEmptyObject(obj)) {
                       $('#module_name').append('<option value="">No Group Available</option>');
                  }else 
                  {
                      $.each( obj, function( key, value ) 
                      {
                        $('#module_name').append('<option value="'+value.id+'">'+value.name+'</option>');                    
                      });   
                  }
            }
        });
    });


});