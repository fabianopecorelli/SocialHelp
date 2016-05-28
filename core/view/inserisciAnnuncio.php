<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once VIEW_DIR . 'header.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- BREADCRUMBS -->
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 align="CENTER">
                    Inserisci Annuncio
                </h2>
            </div>
        </div>

        <ol class="breadcrumb">
            <li><a href="/SocialHelp"> Home</a></li>
            <li class="active">Inserisci Annuncio</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 10%">
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
                <input type="text" class="form-control" placeholder="Inserisci...">
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

                    <button type="button" class="btn btn-block btn-danger btn-sm">Annulla</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-block btn-primary btn-sm">Conferma</button>
                </div>
            </div>
        </div>        
        <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
</div>







<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>



<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
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

    });
</script>