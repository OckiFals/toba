<?php 

if (empty($this->input->get('dest')) ||
    empty($this->input->get('bus')) ||
    empty($this->input->get('tanggal'))
    ){
    redirect(base_url()); 
}

?>

<?php $this->load->view('customer-header', ['title' => 'Pesan Tiket']); ?>
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
                    <li><a href="index.html"><i class="fa fa-search"></i> Home</a></li>
                    <li class="active">
                        <i class="fa fa-credit-card"></i> Reservasi
                    </li>
                </ol>
            </section>

            <section class="content">

                <div class="row">
                    <div class="col-sm-12 center-block" style="float: none">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h2 class="box-title">Isi form pemesanan</h2>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <form role="form" action="" method="POST">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <p class="lead">Informasi Tiket</p>
                                            <table class="table">
                                                <tbody>
                                                  <tr>
                                                    <th style="width: 50%">Tujuan</th>
                                                    <td><?php echo $this->input->get('dest') ?></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Bus</th>
                                                    <td><?php echo $this->input->get('bus') ?></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Waktu Keberangkatan</th>
                                                    <td><?php echo $this->input->get('tanggal') ?></td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group">
                                            <label for="ticket_count">Jumlah tiket</label>
                                            <select class="form-control" id="ticket_count" name="ticket_count">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_name">Nama Pemesan</label>
                                            <input class="form-control" id="customer_name"
                                                   placeholder="Masukkan nama pemesan" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_phone">Nomor Telepon</label>
                                            <input class="form-control" id="customer_phone"
                                                   placeholder="Masukkan nomor telepon" type="text">
                                        </div>

                                        <!-- Form Data Diri Penumpang -->
                                        <div class="col-sm-12" id="passanger_data_1">
                                            <div class="box box-info box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Data Penumpang 1</h3>

                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                                                class="fa fa-minus"></i></button>
                                                    </div>
                                                    <!-- /.box-tools -->
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="passenger_name_1">Nama Penumpang 1</label>
                                                        <input class="form-control" id="passenger_name_1"
                                                               placeholder="Masukkan nama pemesan 1" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passenger_id_1">Nomor identitas penumpang 1</label>
                                                        <input class="form-control" id="passenger_id_1"
                                                               placeholder="Masukkan nomor identitas pemesan 1"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passanger_birth_1">Tanggal Lahir penumpang 1</label>

                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input class="form-control"
                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                   data-mask="" id="passanger_birth_1" type="text">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <div class="col-sm-4" id="passanger_data_2" style="display: none">
                                            <div class="box box-success box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Data Penumpang 2</h3>

                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                                                class="fa fa-minus"></i></button>
                                                    </div>
                                                    <!-- /.box-tools -->
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="passenger_name_2">Nama Penumpang 2</label>
                                                        <input class="form-control" id="passenger_name_2"
                                                               placeholder="Masukkan nama pemesan 2" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passenger_id_2">Nomor identitas penumpang 2</label>
                                                        <input class="form-control" id="passenger_id_2"
                                                               placeholder="Masukkan nomor identitas pemesan 2"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passanger_birth_2">Tanggal Lahir penumpang 2</label>

                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input class="form-control"
                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                   data-mask="" id="passanger_birth_2" type="text">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <div class="col-sm-4" id="passanger_data_3" style="display: none">
                                            <div class="box box-warning box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Data Penumpang 3</h3>

                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                                                class="fa fa-minus"></i></button>
                                                    </div>
                                                    <!-- /.box-tools -->
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="passenger_name_3">Nama Penumpang 3</label>
                                                        <input class="form-control" id="passenger_name_3"
                                                               placeholder="Masukkan nama pemesan 3" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passenger_id_1">Nomor identitas penumpang 1</label>
                                                        <input class="form-control" id="passenger_id_1"
                                                               placeholder="Masukkan nomor identitas pemesan 1"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passanger_birth_3">Tanggal Lahir penumpang 3</label>

                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input class="form-control"
                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                   data-mask="" id="passanger_birth_3" type="text">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- /Form Data Diri Penumpang -->

                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">

                                        <div class="row">
                                            <div class="col-md-11 col-xs-8">

                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-1 col-xs-4">
                                                <button type="submit" class="btn btn-primary btn-block">Submit
                                                </button>
                                            </div>
                                            <!-- /.col -->
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
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/app.min.js') ?>" type="text/javascript"></script>
<!-- jquery.inputmask -->
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var ticket_count = $('#ticket_count');

        ticket_count.change(function (e) {
            var val = $(this).val();
            var data1 = $('#passanger_data_1');
            var data2 = $('#passanger_data_2');
            var data3 = $('#passanger_data_3');

            // cari cara yang lebih efisien
            if ('1' === val) {
                data1.removeAttr('class').attr('class', 'col-sm-12').show();
                data2.hide();
                data3.hide();
            } else if ('2' === val) {
                data1.removeAttr('class').attr('class', 'col-sm-6').show();
                data2.removeAttr('class').attr('class', 'col-sm-6').show();
                data3.hide();
            } else {
                data1.removeAttr('class').attr('class', 'col-sm-4').show();
                data2.removeAttr('class').attr('class', 'col-sm-4').show();
                data3.removeAttr('class').attr('class', 'col-sm-4').show();
            }
        });

        //Datemask dd/mm/yyyy
        $("#passanger_birth_1").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("#passanger_birth_2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("#passanger_birth_3").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    });
</script>
<?php $this->load->view('customer-footer'); ?>