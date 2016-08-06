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
        </script>

</body>

</html>
