<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="<?= site_url(); ?>">Infomed FOKRI Games VI</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>public/assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>public/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>public/assets/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url(); ?>public/assets/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>public/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url(); ?>public/assets/adminlte/dist/js/adminlte.min.js"></script>
<script>
    $(document).ready(function() {
        var t = $('.datatables').DataTable({
            "scrollX": true,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

    <?php if (!empty($this->session->flashdata('alert'))) : ?>
        alert('<?= $this->session->flashdata('alert'); ?>');
    <?php endif; ?>
</script>
</body>

</html>