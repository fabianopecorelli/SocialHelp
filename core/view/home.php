<?php
/**
 * 
 * @author Vincenzo Russo
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
                Bacheca
            </h2>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom" style="background: transparent; width: 100%">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tutti" onclick="" data-toggle="tab" aria-expanded="true">Tutti</a></li>
                <li class=""><a href="#richieste" data-toggle="tab" aria-expanded="false">Richieste</a></li>
                <li class=""><a href="#offerte" data-toggle="tab" aria-expanded="false">Offerte</a></li>
            </ul>
            <!-- /.tab-pane -->
            <div class="tab-content">
                <div class="tab-pane active" id="tutti">
                    <div class="box-body">
                        <?php
                        $allAnnunci = $homeController->getAllAnnunci();
                        foreach ($allAnnunci as $annuncio) {
                            $utenteAnnuncio = $homeController->getUtenteByEmail($annuncio->getEmail());
                            $id = $utenteAnnuncio->getId();
                            ?>
                            <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                <div class="box-header with-border">
                                    <div class="user-block">
                                        <img class="img-circle" src="<?php echo $utenteAnnuncio->getImmagine(); ?>" alt="User Image">
                                        <span class="username"><a href="<?php echo DOMINIO_SITO; ?>/profilo/<?php echo $id ?>"><?php echo $utenteAnnuncio->getNome(); ?> <?php echo $utenteAnnuncio->getCognome(); ?></a> <p><?php echo strtoupper($annuncio->getTitolo()); ?></p></span>
                                        <span class="description">Data pubblicazione: <?php echo date("d/m/Y", strtotime($annuncio->getDataPubblicazione())); ?> - Data servizio: <?php echo date("d/m/Y", strtotime($annuncio->getData())); ?> - Luogo servizio: <?php echo $annuncio->getLuogo(); ?></span>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <p><?php echo $annuncio->getDescrizione(); ?></p>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <a href="<?php echo DOMINIO_SITO; ?>/profilo/<?php echo $id; ?>"><button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button></a>
                                    </div>
                                    <span class="pull-left text-muted">Annuncio <?php echo $annuncio->getTipologia(); ?></span>
                                </div>
                            </div>
<?php } ?>
                    </div>
                </div>
                <div class="tab-pane" id="offerte">
                    <div class="box-body">
                        <?php
                        $allAnnunci = $homeController->getAllAnnunciOfferta();
                        foreach ($allAnnunci as $annuncio) {
                            $utenteAnnuncio = $homeController->getUtenteByEmail($annuncio->getEmail());
                            $id = $utenteAnnuncio->getId();
                            ?>
                            <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                <div class="box-header with-border">
                                    <div class="user-block">
                                        <img class="img-circle" src="<?php echo $utenteAnnuncio->getImmagine(); ?>" alt="User Image">
                                        <span class="username"><a href="<?php echo DOMINIO_SITO; ?>/profilo/<?php echo $id ?>"><?php echo $utenteAnnuncio->getNome(); ?> <?php echo $utenteAnnuncio->getCognome(); ?></a> <p><?php echo strtoupper($annuncio->getTitolo()); ?></p></span>
                                        <span class="description">Data pubblicazione: <?php echo date("d/m/Y", strtotime($annuncio->getDataPubblicazione())); ?> - Data servizio: <?php echo date("d/m/Y", strtotime($annuncio->getData())); ?> - Luogo servizio: <?php echo $annuncio->getLuogo(); ?></span>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <p><?php echo $annuncio->getDescrizione(); ?></p>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-block btn-primary btn-sm" href="#">Sono interessato</button>
                                    </div>
                                    <span class="pull-left text-muted">Annuncio <?php echo $annuncio->getTipologia(); ?></span>
                                </div>
                            </div>
<?php } ?>
                    </div>
                </div>

                <div class="tab-pane" id="richieste">
                    <div class="box-body">
                        <?php
                        $allAnnunci = $homeController->getAllAnnunciRichiesta();
                        foreach ($allAnnunci as $annuncio) {
                            $utenteAnnuncio = $homeController->getUtenteByEmail($annuncio->getEmail());
                            $id = $utenteAnnuncio->getId();
                            ?>
                            <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                <div class="box-header with-border">
                                    <div class="user-block">
                                        <img class="img-circle" src="<?php echo $utenteAnnuncio->getImmagine(); ?>" alt="User Image">
                                        <span class="username"><a href="<?php echo DOMINIO_SITO; ?>/profilo/<?php echo $id ?>"><?php echo $utenteAnnuncio->getNome(); ?> <?php echo $utenteAnnuncio->getCognome(); ?></a> <p><?php echo strtoupper($annuncio->getTitolo()); ?></p></span>
                                        <span class="description">Data pubblicazione: <?php echo date("d/m/Y", strtotime($annuncio->getDataPubblicazione())); ?> - Data servizio: <?php echo date("d/m/Y", strtotime($annuncio->getData())); ?> - Luogo servizio: <?php echo $annuncio->getLuogo(); ?></span>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <p><?php echo $annuncio->getDescrizione(); ?></p>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-block btn-primary btn-sm" href="#">Sono interessato</button>
                                    </div>
                                    <span class="pull-left text-muted">Annuncio <?php echo $annuncio->getTipologia(); ?></span>
                                </div>
                            </div>
<?php } ?>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
</div>
<!-- Your Page Content Here -->

<!-- /.content-wrapper -->
<?php include_once VIEW_DIR . 'footer.php'; ?>
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