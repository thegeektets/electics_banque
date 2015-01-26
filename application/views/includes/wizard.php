    <script src="<?php echo base_url('/assets/js/jquery.js')?>"></script>
  <script src="<?php echo base_url('/assets/js/jquery.select2/select2.min.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('/assets/js/jquery.parsley/dist/parsley.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('/assets/js/bootstrap.slider.js')?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url('/assets/js/fuelux/loader.min.js')?>"></script>  
  <script src="<?php echo base_url('/assets/js/modernizr.js')?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.nanoscroller/jquery.nanoscroller.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.switch/bootstrap-switch.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.nestable/jquery.nestable.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.datetimepicker.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/assets/js/behaviour/general.js')?>"></script>
  <script src="<?php echo base_url('/assets/js/jquery.ui/jquery-ui.js')?>" type="text/javascript"></script>
  <script type="text/javascript">
    $("#credit_slider").slider().on("slide",function(e){
      $("#credits").html("$" + e.value);
    });
    $("#rate_slider").slider().on("slide",function(e){
      $("#rate").html(e.value + "%");
    });
  </script>
  
  <script type="text/javascript">
    $(document).ready(function(){
      //initialize the javascript
      App.init();
      App.wizard();
    });
  </script>
    <script src="<?php echo base_url('/assets/js//behaviour/voice-commands.js')?>"></script>