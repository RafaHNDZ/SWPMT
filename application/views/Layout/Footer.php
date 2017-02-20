<?php if(!$this->session->userdata('login_status') == false){?>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> Beta: 0.3.0. RT: <b>{elapsed_time}</b> S.
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Rafael Hernández</a>.</strong> All rights
    reserved.
  </footer>
<?php } ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-notify.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/app.js"></script>
<!-- Ajax Functions -->
<script src="<?php echo base_url();?>assets/js/ajaxFunctions.js"></script>
<!-- AdminLTE for demo purposes
<script src="<?php echo base_url();?>assets/js/demo.js"></script>
 -->
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
</body>
</html>
