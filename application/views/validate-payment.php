<?php $this->load->view('header', ['title' => 'Validasi Pembayaran']); ?>
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
                <li class="active"><i class="fa fa-check-square"></i> Validasi Pembayaran</li>
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
                            <h3 class="box-title">Validasi Pembayaran</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="register-box-body">
                                <form action="" method="POST" enctype="multipart/form-data" id="validate-form"
                                      novalidate="novalidate">
                                    <div class="form-group has-feedback">
                                        <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
                                        <input id="booking-code" name="booking_code" class="form-control"
                                               placeholder="Kode Booking" type="text">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-10">

                                        </div>
                                        <!-- /.col -->
                                        <div class="col-xs-2">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat" id="btn-submit">
                                                Submit
                                            </button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <div id="payment-info" style="display: none;">
                                    <p class="lead">Data Pembayaran</p>

                                    <div class="table-responsive">
                                        <table class="table" id="payment-table">
                                            <tbody>
                                            <tr>
                                                <th style="width:50%">Pemilik Rekening:</th>
                                                <td>
                                                    <span id="account-holder">
                                                        <!-- insert by AJAX call soon -->
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Waktu Transfer:</th>
                                                <td>
                                                    <span id="time">
                                                        <!-- insert by AJAX call soon -->
                                                    </span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row no-print">
                                        <div class="col-xs-12">
                                            <a href="#" class="btn btn-success pull-right" id="btn-confirm"
                                                    data-toggle="modal" data-target="#confirm-validate">
                                                <i class="fa fa-check"></i> Validasi
                                            </a>
                                            <button class="btn btn-default pull-right" style="margin-right: 5px;"
                                                    id="btn-cancel">
                                                <i class="fa fa-times"></i> Batal
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="overlay" id="load-animate" style="display: none">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
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
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

     <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js') ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('assets/plugins/validate/jquery.validate.min.js') ?>" type="text/javascript"></script>

    <div class="modal fade" id="confirm-validate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger btn-flat btn-ok">Ya</a>
                </div>
            </div>
        </div>
    </div>

    <script type="application/javascript">
        $('#confirm-validate').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget); // Button that triggered the modal
            var type = button.data('type-modal'); // Extract post id from data-name attribute
            var id = button.data('order-id'); // Extract post id from data-name attribute
            var title = button.data('order-name'); // Extract post id from data-name attribute

            var modal = $(this);
            modal.find('#order-id').text(id);
            modal.find('#type-modal').text(type);
            modal.find('#order-name').text(title);

            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
</div>
<!-- ./wrapper -->

<script type="text/javascript">
    $(function () {
        //The Calender
        $("#calendar").datepicker('setDate', 'today');

        $("#booking-code").focus();
        var btn_submit = $("#btn-submit");
        var payment_info = $("#payment-info");
        var load_animate = $("#load-animate");

        $("#validate-form").validate({

            // Specify the validation rules
            rules: {
                booking_code: "required"
            },

            // Specify the validation error messages
            messages: {
                booking_code: "Tolong ketikkan kode booking"
            },

            submitHandler: function () {
                btn_submit.hide();
                load_animate.show();

                window.setTimeout(function () {
                    payment_info.find("#account-holder").text("Ujang Pengkol");
                    payment_info.find("#time").text("Besok");
                    payment_info.show();
                    load_animate.hide();
                }, 3000);
            }
        });

        payment_info.find("#btn-cancel").click(function (e) {
            e.preventDefault();
            payment_info.hide();
            btn_submit.show();
        });
    });
</script>
<?php $this->load->view('footer'); ?>