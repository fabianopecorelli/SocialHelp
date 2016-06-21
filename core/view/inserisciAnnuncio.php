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
<form action="<?php echo DOMINIO_SITO; ?>/inserimentoAnnuncio" method="post" id="modulo" name="modulo" onsubmit="return Modulo()" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <span class="simple-text">Titolo annuncio:</span>
        </div>
        <div class="col-md-3">
            <input type="text" name="titolo" class="form-control" placeholder="Inserisci...">
        </div>
    </div>

    <div class="row" style="margin-top: 2%">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <span class="simple-text">Tipologia:</span>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            <input type="radio" name="tipologia" value="Richiesta" class="flat-red">
                            Richiesta
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>
                            <input type="radio" name="tipologia" value="Offerta" class="flat-red">
                            Offerta
                        </label>
                    </div>                    
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
                <input type="text" class="form-control pull-right" name="data" id="datepicker">
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 2%">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <span class="simple-text">Citt&agrave:</span>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control select2" name="citta" id="listacitta" style="width: 100%;">

                </select>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 2%">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <span class="simple-text">Descrizione:</span>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <textarea style="resize: none" class="form-control" id="descrizione" nome="descrizione" rows="3" placeholder="Inserisci..."></textarea>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 2%">
        <div class="col-md-6"></div>
        <div class="col-md-3">
            <div class="col-md-6">

                <button type="reset" name="reset" class="btn btn-block btn-danger btn-sm">Annulla</button>
            </div>
            <div class="col-md-6">
                <button type="submit" name="submit" class="btn btn-block btn-primary btn-sm">Conferma</button>
            </div>
        </div>
    </div>  
</form>
<!-- Your Page Content Here -->





<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>



<script src="<?php echo STYLE_DIR; ?>plugins/select2/select2.full.min.js"></script>
<script src="<?php echo STYLE_DIR; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo STYLE_DIR; ?>plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo STYLE_DIR; ?>/scripts/caricacitta.js"></script>
<script>
    $(function () {



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
        //Initialize Select2 Elements
        $(".select2").select2();

    });

</script>
<script>
            
            function Modulo() {
                // Variabili associate ai campi del modulo
                var titolo = document.modulo.titolo.value;
                var tipologia = document.modulo.tipologia.value;
                var data = document.modulo.data.value;
                var citta = document.modulo.citta.value;
                var descrizione = document.modulo.descrizione.value;
                
                
                //Effettua il controllo sul campo NOME
                if ((titolo == "") || (titolo == "undefined")) {
                    alert("Il campo Titolo è obbligatorio.");
                    document.modulo.titolo.focus();
                    return false;
                //Effettua il controllo sul campo COGNOME
                }else if ((tipologia == "") || (tipologia == "undefined")) {
                    alert("Il campo Tipologia è obbligatorio.");
                    return false;
                //Effettua il controllo sul campo TELEFONO    
                }else if ((data == "") || (data == "undefined")) {
                    alert("Il campo Data è obbligatorio.");
                    document.modulo.data.focus();
                    return false;
                //Effettua il controllo sul campo TELEFONO    
                }else if ((citta == "") || (citta == "undefined") || (citta == "Seleziona città...")) {
                    alert("Il campo Città è obbligatorio.");
                    document.modulo.citta.focus();
                    return false;
                
                }else if((descrizione == "") || (descrizione == "undefined")) {
                    alert("Il campo Descrizione è obbligatorio.");
                    document.modulo.descrizione.focus();
                    return false;
                    
                }else {
                    
                    document.modulo.submit();
                    
                    return true;
                }
                }
                </script>