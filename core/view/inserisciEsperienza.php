<?php
/**
 * 
 * @author Fabiano Pecorelli
 * @version 1.0
 * @since 30/05/16
 */
include_once VIEW_DIR . 'header.php';
include_once CONTROL_DIR . "ProfiloController.php";

$profiloController = new ProfiloController();
function parseInt($Str) {
    return (int)$Str;
}
if(isset($_URL[1])){
    //PROFILO UTENTE CON ID
    $utente=$profiloController->getUtenteById(parseInt($_URL[1]));
    $utenteloggato=0;
    
}else{
    //PROFILO UTENTE LOGGATO
    $utente=unserialize($_SESSION['user']);
    $utenteloggato=1;
    
}
?>

<!-- Content Header (Page header) -->


<div class="big-title">
    <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2 align="CENTER">
                Inserisci esperienza
            </h2>
        </div>
    </div>

    <ol class="breadcrumb" style="background: #e6eddc; font-size: 14px">
        <li><a href="<?php echo DOMINIO_SITO; ?>/"> Home</a></li>
        <li class="active">Inserisci esperienza</li>
    </ol>
</div>

<form method="POST" action="#" id="modulo" name="modulo" onsubmit="return Modulo()" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <span class="simple-text">Titolo esperienza:</span>
        </div>
        <div class="col-md-3">
            <input type="text" name="titolo" class="form-control" placeholder="Inserisci...">
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
                <textarea style="resize: none" name="descrizione" class="form-control" rows="3" placeholder="Inserisci..."></textarea>
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

<!-- /.form-box -->

<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>


<script>
    var canExit = true;
    var rating = 0;
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
    function resetRating() {
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

    function Modulo() {
        // Variabili associate ai campi del modulo
        var titolo = document.modulo.titolo.value;
        var descrizione = document.modulo.descrizione.value;
        //Effettua il controllo sul campo NOME
        if ((titolo == "") || (titolo == "undefined")) {
            toastr["error"]("Il campo Titolo è obbligatorio.")
            document.modulo.titolo.focus();
            return false;
            //Effettua il controllo sul campo COGNOME
        } else if (rating <= 0){
            toastr["error"]("Inserire valutazione.")
            document.modulo.descrizione.focus();
            return false;
        } else if ((descrizione == "") || (descrizione == "undefined")) {
            toastr["error"]("Il campo Descrizione è obbligatorio.")
            document.modulo.descrizione.focus();
            return false;

        } else {
            var email = "<?= $utente->getEmail() ?>";
            document.modulo.action = "<?php echo DOMINIO_SITO; ?>/inserimentoEsperienza?voto="+rating+"&email_utente="+email;
            document.modulo.submit();
            return true;
        }
    }
</script>
<?php
if ($_SESSION['toast-type'] && $_SESSION['toast-message']) {
    ?>
    <script>
        toastr["<?php echo $_SESSION['toast-type'] ?>"]("<?php echo $_SESSION['toast-message'] ?>");
    </script>
    <?php
    unset($_SESSION['toast-type']);
    unset($_SESSION['toast-message']);
}
?>