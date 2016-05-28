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
                    Inserisci esperienza
                </h2>
            </div>
        </div>

        <ol class="breadcrumb">
            <li><a href="<?php echo DOMINIO_SITO; ?>"> Home</a></li>
            <li class="active">Inserisci esperienza</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 10%">
        <form method="post">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Titolo esperienza:</span>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Inserisci...">
                </div>
            </div>

            <div class="row" style="margin-top: 2%">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <span class="simple-text">Valutazione:</span>
                </div>
                <div class="col-md-3">
                    <span onclick="hold(1)" onmouseover="over(1)" onmouseout="out(1); resetRating();" id="star1" class="glyphicon glyphicon-star" style="font-size:30px; color:none;"></span>
                    <span onclick="hold(2)" onmouseover="over(2)" onmouseout="out(2); resetRating();" id="star2" class="glyphicon glyphicon-star" style="font-size:30px;"></span>
                    <span onclick="hold(3)" onmouseover="over(3)" onmouseout="out(3); resetRating();" id="star3" class="glyphicon glyphicon-star" style="font-size:30px;"></span>
                    <span onclick="hold(4)" onmouseover="over(4)" onmouseout="out(4); resetRating();" id="star4" class="glyphicon glyphicon-star" style="font-size:30px;"></span>
                    <span onclick="hold(5)" onmouseover="over(5)" onmouseout="out(5); resetRating();" id="star5" class="glyphicon glyphicon-star" style="font-size:30px;"></span>
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

    </section>
    <!-- /.content -->
</div>
<script>
    var canExit = true;
    var rating;
    function over(v) {
        canExit = true;
        out(5);
        var x;
        for (i = 1; i <= v; i++) {
            var str = "star" + i;
            x = document.getElementById(str);
            x.style.color = "yellow";
        }
    }
    function out(v) {
        if (canExit) {
            var x;
            for (i = v; i >= 1; i--) {
                var str = "star" + i;
                x = document.getElementById(str);
                x.style.color = null;
            }
        }
    }
    function resetRating(){
        for (i = 1; i <= rating; i++) {
            var str = "star" + i;
            x = document.getElementById(str);
            x.style.color = "yellow";
        }
    }
    function hold(n) {
        canExit = false;
        rating = n;
    }
</script>
<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>
