<?php $this->load->view('customer-header'); ?>
<!-- wrapper -->
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Software Engineering
                <small>Group 2</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                   <a href="#"><i class="fa fa-search"></i> Home</a>
               </li>
           </ol>
       </section>

       <section class="content">

        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 center-block" style="float:none">
                <div class="search-ticket">
                    <div class="box-header">
                        <h3 class="box-title">Cari Tiket Disini</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form role="form" action=""> 
                            <div class="input-group margin">
                                <input type="text" class="form-control input-lg" placeholder="Ketikkan Tujuan ..."
                                id="input-search" name="dest" value="">
                                <span class="input-group-btn">
                                    <input class="btn btn-lg btn-info btn-flat" id="btn-search" type="submit" value="Cari">
                                </span>
                            </div>
                            <div class="form-inline margin">
                                <div class="input-group has">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input class="form-control input-sm" id="date_of_departure" name="date_of_departure" 
                                    placeholder="Tanggal Keberangkatan" type="text">
                                </div>
                                
                                <label class="radio-inline">
                                    <input type="radio" name="type" value="eksekutif" checked>Semua Kelas
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" value="eksekutif">Eksekutif
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" value="bisnis">Bisnis
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" value="ekonomi">Ekonomi
                                </label> 
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-12" id="load-animate" style="display: none">
                    <div class="box box-solid" style="background: none; border-top: none; box-shadow: none">
                        <div class="box-body">

                        </div>
                        <!-- /.box-body -->
                        <!-- Loading (remove the following to stop the loading)-->
                        <div class="overlay" style="background: none">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                        <!-- end loading -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- bus-load -->
                <div id="bus-load" style="display: none">
                    <!-- AJAX call soon  -->
                </div>
                <!-- /bus-load -->
            </div>
        </div>

        <!-- /.col -->

    </section>
</div>
<!-- /.container -->
</div>

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/app.min.js') ?>" type="text/javascript"></script>
<!-- autocomplete plugins JS -->
<script src="<?php echo base_url('assets/plugins/autocomplete/jquery.autocomplete.js') ?>" type="text/javascript"></script>
<!-- autocomplete plugins JS -->
<link href="<?php echo base_url('assets/plugins/autocomplete/jquery.autocomplete.css') ?>" rel="stylesheet" type="text/css"/>
<!-- autocomplete plugins JS -->
<script src="<?php echo base_url('assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js') ?>" type="text/javascript"></script>
<!-- autocomplete plugins JS -->
<link href="<?php echo base_url('assets/plugins/datetimepicker/jquery.datetimepicker.css') ?>" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
    $(document).ready(function () {
        var input_search = $('#input-search');
        var search_ticket = $('.search-ticket');
        var date = $('#date_of_departure'); 
        var bus_box = $('#bus-load');
        var load_indicator = $('#load-animate');

        search_ticket.animate({
            marginTop: "+60px"
        }, 800);

        date.datetimepicker({
            timepicker: false,
            minDate:'-1970/01/01',
            format:'d/m/Y'
        });

        $('#btn-search').click(function (e) {
            e.preventDefault();
            
            if ('' === input_search.val())
                return;
            if ('' === date.val()) {
                date.focus();
                return;
            }
            if (0 !== bus_box.children().length) 
                bus_box.empty();
            
            load_indicator.show();

            search_ticket.animate({
                marginTop: "-4"
            }, 1000);

            showBusContent();

        });

        var states = [
            'Bali', 'Jogjakarta', 'Madura', 'Semarang', 'Solo',
                'Bekasi', 'Jakarta', 'Bandung', 'Pekalongan'
        ];

        input_search.autocomplete({
            source: [states]
        });

        input_search.focus();

        function showBusContent() {
            $.ajax({
                url: 'search',
                beforeSend: function( xhr ) {
                    xhr.overrideMimeType( "application/json; charset=x-user-defined" );
                }
            }).done(function (data) {
                var content = '';
                $.each(data, function(index, bus) {
                    content += '' + 
                        '<div class="col-md-4 col-sm-6 col-xs-12 center-block">' + 
                            '<div class="info-box">' +
                                '<span class="info-box-icon bg-'+ bus.color +'"><i class="ion ion-ios-gear-outline"></i></span>' +
                                '<div class="info-box-content">' +
                                    '<span class="info-box-text">'+ bus.bus_name +'</span>' +
                                    '<span class="info-box-number">'+ bus.class +'</span>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
                });

                load_indicator.hide();
                bus_box.append(content);
                bus_box.fadeIn();
            }).fail(function(thrownError) {
                load_indicator.hide();
            });
        }
    });
</script>
<?php $this->load->view('customer-footer'); ?>