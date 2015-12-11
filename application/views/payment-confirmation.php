<?php $this->load->view('customer-header', ['title' => 'Konfirmasi Pembayaran']); ?>
<!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Software Engineering
                    <small>Group 2</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-search"></i> Home</a></li>
                    <li class="active">
                        <i class="fa fa-shopping-cart"></i> Konfirmasi Pembayaran
                    </li>
                </ol>
            </section>

            <section class="content">

                <div class="row">
                    <div class="col-sm-12 center-block">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h2 class="box-title">Isi form konfirmasi pembayaran</h2>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <!-- flash message -->
                                <div class="alert alert-info alert-dismissable" id="flash-message" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check-square-o"></i> Info!</h4>
                                    <span id="flash-message-data"></span>
                                </div>
                                <!-- /flash message -->
                                <form role="form" action="" method="POST" id="confirmation-form" novalidate="novalidate">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="booking_code">Kode Booking</label>
                                            <input class="form-control" id="booking_code" name="booking_code" 
                                                   placeholder="Masukkan kode booking" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="account_holder">Pemilik Rekening</label>
                                            <input class="form-control" id="account_holder" name="account_holder" 
                                                   placeholder="Masukkan pemilik rekening" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="transfer_time">Waktu Transfer</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                                <input class="form-control" id="transfer_time" name="transfer_time" 
                                                    placeholder="____/__/__ __:__" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="row no-print">
                                        <button class="btn btn-primary pull-right" id="btn-confirm" 
                                            style="margin-right: 25px;">
                                            Konfirmasi Pembayaran
                                        </button>
                                        <a href="<?php echo base_url() ?>" class="btn btn-primary pull-right" id="btn-back" 
                                            style="margin-right: 25px; display: none">
                                            Kembali
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <!-- Loading Indicator -->
                            <div class="overlay" id="load-animate" style="display: none">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>
                            <!-- / Loading Indicator -->
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </section>


        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

    <!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/app.min.js') ?>" type="text/javascript"></script>
<!-- autocomplete plugins JS -->
<script src="<?php echo base_url('assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js') ?>" type="text/javascript"></script>
<!-- autocomplete plugins JS -->
<link href="<?php echo base_url('assets/plugins/datetimepicker/jquery.datetimepicker.css') ?>" rel="stylesheet" type="text/css"/>
<!-- JQuery Validate -->
<script src="<?php echo base_url('assets/plugins/validate/jquery.validate.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var loading_indicator = $("#load-animate");
        var flash_message = $("#flash-message");

        $('#transfer_time').datetimepicker({
            minDate:'-1970/01/02',
            maxDate: '0'
        });

        $("#confirmation-form").validate({
            rules: {
                booking_code: 'required',
                account_holder: 'required',
                transfer_time: 'required'
            }, 
            messages: {
                booking_code: "Tolong isi dengan kode booking",
                account_holder: "Tolong isi dengan nama pemilik rekening",
                transfer_time: "Tolong isi dengan waktu transfer"
            },
            submitHandler: function (form) {
                loading_indicator.show();

                $.post("konfirmasi-pembayaran",
                    $("#confirmation-form").serialize()
                ).done(function(msg) {
                    window.setTimeout(function () {
                        loading_indicator.hide();
                        flash_message.show().find("#flash-message-data").html(msg);
                    }, 500);
                    // sembunyikan button konfirmasi
                    $("#btn-confirm").hide();
                    $("#btn-back").show();
                    $("input").prop("disabled", true);
                });
            }
        });
    });
</script>
<?php $this->load->view('customer-footer'); ?>