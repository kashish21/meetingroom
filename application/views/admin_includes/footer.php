
<!-- Scripts -->
<?php
if (!empty($scripts)) {
    foreach ($scripts as $script) {
        echo $script;
    }
}
?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


     <script>


          $(document).on('click','.class_edit_data',function(e){
                e.preventDefault();

                var id = $(this).attr('data-id');
                $.ajax({
                    url:"<?php echo base_url();?>" + "admin/classes/get_class/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        var obj1 = JSON.parse(data);
                        $('#_class').val(obj1[0].class);
                        $('#class_id').val(obj1[0].id);
                        $('#_sort_order').val(obj1[0].sort_order);
                        // console.log(obj[0].name);
                        $('#class_edit_Modal').modal('show');
                    }
                });
            });

          $(document).on('click','.stream_edit_data',function(e){
                e.preventDefault();

                var id = $(this).attr('data-id');

                $.ajax({
                    url:"<?php echo base_url();?>" + "admin/stream/get_stream/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        var obj1 = JSON.parse(data);
                        $('#_stream').val(obj1[0].stream);
                        $('#stream_id').val(obj1[0].id);
                        $('#_sort_order').val(obj1[0].sort_order);
                        // console.log(obj[0].name);
                        $('#stream_edit_Modal').modal('show');
                    }
                });
            });

           $(document).on('click','.subject_edit_data',function(e){

                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url:"<?php echo base_url();?>" + "admin/subject/get_subject/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {

                        var obj1 = JSON.parse(data);
                        $('#edit_subject').val(obj1[0].subject);
                        $('#edit_description').val(obj1[0].description);
                        $('#subject_id').val(obj1[0].id);
                        $('#edit_sort_order').val(obj1[0].sort_order);
                        $('#imgsrc').attr("src",obj1[0].thumb_url);
                        $('#subject_edit_Modal').modal('show');
                    }
                });
            });



           $('.course_chapter_edit_data').click(function(e){

                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url:_base_url + "admin/course/get_course_chapter/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        console.log(data);
                        var obj1 = JSON.parse(data);
                        $('#course_chapter_id').val(obj1[0].id);
                        $('#edit_sort_order').val(obj1[0].sort_order);

                        $('#course_chapter_edit_Modal').modal('show');
                    }
                });
       });

            $('.plan_course_edit_data').click(function(e){

                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url:_base_url + "admin/plan/get_plan_course/"+id,
                    method:"post",
                    data:{},
                    // dataType:"json",
                    success:function(data)
                    {
                        console.log(data);
                        var obj1 = JSON.parse(data);
                        $('#course_plan_id').val(obj1[0].id);
                        $('#edit_sort_order').val(obj1[0].sort_order);

                        $('#course_plan_edit_Modal').modal('show');
                    }
                });
       });





 </script>



</body>

</html>
