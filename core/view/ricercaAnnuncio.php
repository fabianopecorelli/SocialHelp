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
                    Ricerca Annuncio
                </h2>
            </div>
        </div>

        <ol class="breadcrumb">
            <li><a href="<?php echo DOMINIO_SITO; ?>"> Home</a></li>
            <li class="active">Ricerca Annuncio</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 10%">
        <form>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Parola chiave:</span>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Inserisci...">
                </div><!-- Your Page Content Here -->
            </div>

            <div class="row" style="margin-top: 2%">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Tipologia:</span>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
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
                            <span>Ultimi 30 giorni</span>
                            <i class="fa fa-caret-down"></i>
                        </button>
                    </div>
                </div><!-- Your Page Content Here -->
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>

<script>
    $(function () {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        $(".select2").select2();
        $('#daterange-btn span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
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
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );
    });
</script>