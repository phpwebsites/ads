    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo asset_url(); ?>admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo asset_url(); ?>admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo asset_url(); ?>admin/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo asset_url(); ?>admin/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo asset_url(); ?>admin/js/plugins/morris/morris-data.js"></script>
    <script type="text/javascript">
            $("#country_id").change(function(){

                       var country_id = $("#country_id").val();
                       //alert(country_id);
                       $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('country/getstate').'/'; ?>'+country_id,
                            //data: id='cat_id',
                            success: function(data){
                                //alert(data);
                                $('#state_id').html(data);
                        },
                       });


                    })

                    $("#city_id").change(function(){

                       var city_id = $("#country_id").val();
                       //alert(country_id);
                       $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('state/getcity').'/'; ?>'+state_id,
                            //data: id='cat_id',
                            success: function(data){
                                //alert(data);
                                $('#state_id').html(data);
                        },
                       });


                    })

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#image_upload_preview').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                  }
                    $("#blogimageupdate").change(function(){

                        readURL(this);
                    })

                // transaction Status active inactive
                // $("#status").click(function(){

                //    var s = $(this).attr('name');
                //    alert(s);
                //    // var res[] = s.split("-");
                //    //alert(res[0]);
                // })
  
    
                  
  
</script>


        </script>

</body>

</html>
