 $(document).ready(function(){

   $('#syncvideo').click(function () {

            $.ajax({
                type: "POST",
                url: _base_url+"serveruploads/get_all_album_videos/",
                data: {},
                beforeSend: function () {
                    $('#syncvideo').empty();
                    $('#syncvideo').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> Please Wait..');
                },
                complete: function (data) {
                    $('#syncvideo').empty();
                    $('#syncvideo').html('<i class="fa fa-refresh"></i>SYNC VIDEO');
                    if(data)
                    {
                      // console.log(data);
                      // return false;
                         location.reload();
                    }
                }
            });
        }); 
 });
   

        //$('#syncvideo').click();   

