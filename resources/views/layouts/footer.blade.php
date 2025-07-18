
 

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="{{asset('template')}}/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('template')}}/dist/js/demo.js"></script> -->
 <script>
  $(function () {
     //Initialize Select2 Elements
    $('.select2').select2()
     //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  // document.addEventListener('DOMContentLoaded', function () {
  //   window.addEventListener('init-bootstrap-table', function () {
  //     // Inisialisasi ulang bootstrap table
  //     // $('#example1').DataTable('destroy'); // jika sudah ada
  //     // $('#example2').DataTable('destroy'); // jika sudah ada
  //     // $("#example1").DataTable({
  //       // "responsive": true, "lengthChange": false, "autoWidth": false,
  //       // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //     // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //     // $('#example2').DataTable({
  //     //   "paging": true,
  //     //   "lengthChange": false,
  //     //   "searching": false,
  //     //   "ordering": true,
  //     //   "info": true,
  //     //   "autoWidth": false,
  //     //   "responsive": true,
  //     // });
  //   });
  // });
</script>
</body>
</html>