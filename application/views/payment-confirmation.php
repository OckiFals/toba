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
                                            <button class="btn btn-primary pull-right" style="margin-right: 25px;">
                                                Konfirmasi Pembayaran
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
            }
        });
    });
</script>
<?php $this->load->view('customer-footer'); ?>