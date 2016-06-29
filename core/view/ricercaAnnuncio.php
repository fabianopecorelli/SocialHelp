<?php
/**
 * 
 * @author Fabiano Pecorelli
 * @version 1.0
 * @since 30/05/16
 */
include_once VIEW_DIR . 'header.php';
include_once CONTROL_DIR . "HomeController.php";

$homeController = new HomeController();
?>

<!-- Content Header (Page header) -->
<div class="big-title">
    <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2 align="CENTER">
                Ricerca Annuncio
            </h2>
        </div>
    </div>

    <ol class="breadcrumb" style="background: #e6eddc; font-size: 14px">
        <li><a href="<?php echo DOMINIO_SITO; ?>/"> Home</a></li>
        <li class="active">Ricerca Annuncio</li>
    </ol>
</div>


<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <span class="simple-text">Tipologia:</span>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="col-md-6">
                <label>
                    <input type="radio" name="tipologia" value="Richiesta" class="flat-red" checked> Cerco
                </label>
            </div>
            <div class="col-md-6">
                <label>
                    <input type="radio" name="tipologia" value="Offerta" class="flat-red"> Offro
                </label>
            </div>
        </div>
    </div><!-- Your Page Content Here -->
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <span class="simple-text">Periodo:</span>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                <span name='periodo' id='periodo'>Ultimi 30 giorni</span>
                <i class="fa fa-caret-down"></i>
            </button>
        </div>
    </div><!-- Your Page Content Here -->
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <span class="simple-text">Luogo:</span>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <select class="form-control select2" name="citta" id="listacitta" style="width: 130%;">

            </select>
        </div>
    </div><!-- Your Page Content Here -->
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <button type="submit" onclick="submitForm()" class="btn btn-block btn-primary btn-sm">Cerca</button>
        </div>
    </div>
</div>  
<div id="annunci">

</div>
<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>
<script src="<?php echo STYLE_DIR; ?>plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo STYLE_DIR; ?>plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo STYLE_DIR; ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo STYLE_DIR; ?>plugins/select2/select2.full.min.js"></script>



<script type="text/javascript" src="<?php echo STYLE_DIR; ?>/scripts/caricacitta.js"></script>
<script>
                $(function () {
                    //Date picker
                    $('#datepicker').datepicker({
                        autoclose: true
                    });
                    
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'iradio_square-blue',
                        increaseArea: '20%' // optional
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
                });

                    $(".select2").select2();
                    $('#daterange-btn span').html(moment().subtract(29, 'days').format('DD/MM/YYYY') + ' - ' + moment().format('DD/MM/YYYY'));
                    $('#daterange-btn').daterangepicker(
                            {
                                ranges: {
                                    'Oggi': [moment(), moment()],
                                    'Ieri': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                    'Ultima settimana': [moment().subtract(6, 'days'), moment()],
                                    'Ultimo mese': [moment().subtract(29, 'days'), moment()],
                                    'Questo mese': [moment().startOf('month'), moment().endOf('month')],
                                    'Mese scorso': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                },
                                startDate: moment().subtract(29, 'days'),
                                endDate: moment()
                            },
                            function (start, end) {
                                $('#daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
                            }
                    );

                function submitForm() {
                    var radioTipologia = document.getElementsByName('tipologia');
                    var tipologia;
                    for (var i = 0, l = radioTipologia.length; i < l; i++)
                    {
                        if (radioTipologia[i].checked)
                        {
                            tipologia = radioTipologia[i].value;
                        }
                    }
                    var periodo = document.getElementById('periodo').innerHTML;
                    var luogo = document.getElementById('listacitta').value;

                    if ((luogo == "Seleziona città...")) {
                        toastr["error"]("Selezionare la città.");
                        return;
                        //Effettua il controllo sul campo COGNOME
                    }
//                    window.open("<?php echo DOMINIO_SITO; ?>/cercaAnnunci?tipologia='" + tipologia + "'&periodo='" + periodo + "'&luogo='" + luogo + "'");
                    $.get("<?php echo DOMINIO_SITO; ?>/cercaAnnunci?tipologia='" + tipologia + "'&periodo='" + periodo + "'&luogo='" + luogo + "'", function (data) {
                        document.getElementById("annunci").innerHTML = data;
                    });
                }

</script>