<!-- footer content -->
<footer>
  <div class="pull-right">
    AUN-QA. Dev by <a href="https://www.facebook.com/anusit.aon/" target="_blank">Anusit</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../assets/vendors/Flot/jquery.flot.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../assets/vendors/moment/min/moment.min.js"></script>
<script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../assets/build/js/custom.min.js"></script>

<script src="../assets/vendors/datatable/jquery.dataTables.min.js"></script>
<script src="../assets/vendors/toastr/toastr.min.js"></script>
<script src="../assets/vendors/sweetalert/sweetalert.js"></script>
<script src="../assets/vendors/datepicker/bootstrap-datepicker.js"></script>
<script src="../assets/vendors/datepicker/bootstrap-datepicker-thai.js"></script>
<script src="../assets/vendors/datepicker/locales/bootstrap-datepicker.th.js"></script>
<script src="../assets/vendors/selectpicker/bootstrap-select.js"></script>

</body>

</html>
<script>
  function logoutConfirm() {
    Swal.fire({
      title: 'คุณต้องการออกจากระบบ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'ออกจากระบบ',
      cancelButtonText: 'ยกเลิก',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'services/logout.php',
          method: 'POST',
          dataType: 'json',
          success: function(response) {
            if (response.status === 1) {
              Swal.fire({
                icon: 'success',
                title: 'ออกจากระบบสำเร็จ',
                timer: 1200,
                showConfirmButton: true
              }).then(() => {
                window.location.href = '../';
              });
            } else {
              Swal.fire('ผิดพลาด', 'ไม่สามารถออกจากระบบได้', 'error');
            }
          },
          error: function() {
            Swal.fire('ผิดพลาด', 'การเชื่อมต่อผิดพลาด', 'error');
          }
        });
      }
    });
  }
</script>

<script type="text/javascript">
    $('.datepicker').datepicker({

        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true,
    });
</script>