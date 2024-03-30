</section>
<!-- Jquery Core Js --> 
<script src="<?php echo base_url('theme/'); ?>assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="<?php echo base_url('theme/'); ?>assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="<?php echo base_url('theme/'); ?>assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="<?php echo base_url('theme/'); ?>assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="<?php echo base_url('theme/'); ?>assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->
<script src="<?php echo base_url('theme/'); ?>assets/bundles/countTo.bundle.js"></script> <!-- Jquery CountTo Plugin Js -->
<script src="<?php echo base_url('theme/'); ?>assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->

<script src="<?php echo base_url('theme/'); ?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url('theme/'); ?>assets/js/pages/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4"></script>
<script>
    <?php 
        if($msg = $this->session->flashdata('success_msg')){
            echo "toastr.success('Success!', '$msg');";
        }
        if($msg = $this->session->flashdata('error_msg')){
            echo "toastr.error('Success!', '$msg');";
        }
        if($msg = $this->session->flashdata('warning_msg')){
            echo "toastr.warning('Success!', '$msg');";
        }
    ?>
    toastr.success('Success!', 'hi');
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').selectpicker('destroy');
        $('.select2').select2();
    });
</script>
<script>
    function getAvailableRooms(propid) {
        $.ajax({
            url: "<?php echo base_url('ajax'); ?>",
            type: "POST",
            dataType: "json",
            data: { action: "get-available-rooms", propid: propid },
            success: function(res) {
                $('#rooms').html(res.html);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }

</script>
</body>

</html>