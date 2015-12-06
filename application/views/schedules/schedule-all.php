<?php
/**
 * @var stdClass $schedules
 */
?>
<?php $this->load->view('header', ['title' => 'Kelola Jadwal Bus']); ?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Version 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active"><i class="fa fa-book"></i> Semua Jadwal Bus</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Content -->
            <div id="content" class="colM">
                <!--                <h1>Dashboard</h1>-->

                <br class="clear"/>
            </div>
            <!-- END Content -->

            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-8">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Semua Jadwal Bus</h3>

                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url('schedule/add') ?>" class="btn btn-info btn-sm btn-flat">
                                    <i class="fa fa-plus"></i> Tambah Jadwal Bus
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive" style="min-height: 320px">
                                <table class="table table-striped no-margin" id="schedule-list">
                                    <thead>
                                    <tr>
                                        <th width="28px">ID</th>
                                        <th width="220px">Bus</th>
                                        <th>Waktu Berangkat</th>
                                        <th width="150px">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- AJAX call soon -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- Loading Indicator -->
                        <div class="overlay" id="load-animate">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                        <!-- / Loading Indicator -->
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">

                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- Calendar -->
                    <div class="box box-solid bg-light-blue-gradient">
                        <div class="box-header">
                            <i class="fa fa-calendar"></i>

                            <h3 class="box-title">Calendar</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-default btn-sm" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- / Calendar .box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin untuk menghapus <span id="type-modal"> </span>
                    <strong id="order-name"> </strong> dengan #id=<span id="order-id"> </span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger btn-flat btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->

    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js') ?>" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
    <!-- Data Tables -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>

    <script type="application/javascript">
        $(document).ready(function () {
            var schedule_table = $('#schedule-list').DataTable();
            var load_animate = $('#load-animate');

            // example data
            var data = [
                <?php foreach ($schedules as $index => $schedule): ?>
                {
                    id: '<?php echo $schedule->id ?>',
                    name: '<?php echo $schedule->bus_name ?>',
                    time: '<?php echo $schedule->time ?>'
                },
                <?php endforeach; ?>
            ];

            window.setTimeout(function () {
                render_data(data);
                load_animate.remove();
            }, 500);

            function render_data(data) {
                $.each(data, function (index, obj) {
                    schedule_table.row.add([
                        // col 1
                        obj.id,
                        // col 2
                        obj.name,
                        // col 3
                        ' <span class="badge bg-primary"><i class="fa  fa-clock-o"></i> ' +
                        obj.time +
                        '</span>',
                        // col 5
                        ' <a href="#" class="btn btn-xs btn-flat btn-primary"> ' +
                        ' <i class="fa fa-edit "></i> Ubah ' +
                        ' </a> ' + "\n" +
                        ' <a href="#" class="btn btn-xs btn-flat btn-danger" data-account-id="' + obj.id + '" ' +
                        ' data-type-modal="Jadwal Bus" data-account-name=" ' + obj.name + ' " ' +
                        ' data-toggle="modal" data-href="#"' +
                        ' data-target="#confirm-delete"><i class="fa fa-trash-o"></i> Hapus</a> '
                    ]).draw();
                });
            }

            //The Calender
            $("#calendar").datepicker('setDate', 'today');

            $('#confirm-delete').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget); // Button that triggered the modal
                var type = button.data('type-modal'); // Extract post id from data-name attribute
                var id = button.data('account-id'); // Extract post id from data-name attribute
                var title = button.data('account-name'); // Extract post id from data-name attribute

                var modal = $(this);
                modal.find('#order-id').text(id);
                modal.find('#type-modal').text(type);
                modal.find('#order-name').text(title);

                //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
<?php $this->load->view('footer'); ?>