<?php
/**
 * 
 * @author Vincenzo Russo
 * @version 1.0
 * @since 30/05/16
 */
include_once VIEW_DIR . 'header.php';
?>


<div class="big-title">
    <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2 align="CENTER">
                Inserisci Annuncio
            </h2>
        </div>
    </div>

    <ol class="breadcrumb" style="background: #e6eddc; font-size: 14px">
        <li><a href="<?php echo DOMINIO_SITO; ?>/"> Home</a></li>
        <li class="active">Inserisci Annuncio</li>
    </ol>
</div>
        <form method="post">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Titolo annuncio:</span>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Inserisci...">
                </div>
            </div>

            <div class="row" style="margin-top: 2%">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Tipologia:</span>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>
                                <input type="radio" name="r3" class="flat-red" checked>
                                Richiesta
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <input type="radio" name="r3" class="flat-red">
                                Offerta
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 2%">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Data:</span>
                </div>
                <div class="col-md-3">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 2%">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Citt&agrave:</span>
                </div>
                <div class="col-md-3">
                    <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 795px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
            </div>

            <div class="row" style="margin-top: 2%">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Descrizione:</span>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <textarea style="resize: none" class="form-control" rows="3" placeholder="Inserisci..."></textarea>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 2%">
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div class="col-md-6">

                        <button type="reset" class="btn btn-block btn-danger btn-sm">Annulla</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Conferma</button>
                    </div>
                </div>
            </div>  
        </form>
        <!-- Your Page Content Here -->





<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>



<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {


        //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
    
</script>