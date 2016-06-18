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
                        <li class="active"><a href="#tutti" onclick="initializeChart()" data-toggle="tab" aria-expanded="true">Tutti</a></li>
                        <li class=""><a href="#richieste" data-toggle="tab" aria-expanded="false">Richieste</a></li>
                        <li class=""><a href="#offerte" data-toggle="tab" aria-expanded="false">Offerte</a></li>
                    </ul>
                    <!-- /.tab-pane -->
                    <div class="tab-content">
                        <div class="tab-pane" id="offerte">
                            <div class="box-body">
                                <!-- IL CARICAMENTO DAL DATABASE INIZIA QUI -->
                                
                                <?php
                                    
                                $allAnnunciOfferte=$homeController->getAllAnnunciOfferta();
                                foreach($allAnnunciOfferte as $annuncio){
                                    $utenteAnnuncio=$homeController->getUtenteByEmail($annuncio->getEmail());
                                    printf("<div class=\"box box-widget\" style=\"border: 1px solid; border-radius: 10px; border-color: #1e9bd7;\"><div class=\"box-header with-border\"><div class=\"user-block\">");
                                    printf("<img class=\"img-circle\" src=\"%s\" alt=\"User Image\">",$utenteAnnuncio->getImmagine());
                                    printf("<span class=\"username\"><a href=\"#\">%s %s</a></span>",$utenteAnnuncio->getNome(), $utenteAnnuncio->getCognome());
                                    printf("<span class=\"description\">Data pubblicazione - %s &nbsp&nbsp Data servizio - %s &nbsp&nbsp Luogo servizio - %s</span></div></div>",$annuncio->getDataPubblicazione(),$annuncio->getData(),$annuncio->getLuogo());
                                    printf("<div class=\"box-body\"><p>%s</p><div class=\"col-md-8\"></div><div class=\"col-md-4\">",$annuncio->getDescrizione());
                                    printf("<button type=\"button\" class=\"btn btn-block btn-primary btn-sm\" href=\"#\">Sono interessato</button></div>");
                                    printf("<span class=\"pull-left text-muted\">Annuncio Offerta</span></div></div>");
                                    
                                }
                                
                                
                                    ?>
                                
                                
                                <!-- IL CARICAMENTO DAL DATABASE FINISCE QUI -->
<!--                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user2-160x160.jpg" alt="User Image">
                                            <span class="username"><a href="#">Angioletto Caduto</a></span>
                                            <span class="description">Data pubblicazione - 7:27 Oggi</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Sono Angioletto Caduto e offro ripetizioni di ETC.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio offerta</span>
                                    </div>
                                     /.box-body 
                                </div>
                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user3-128x128.jpg" alt="User Image">
                                            <span class="username"><a href="#">Michele Arcangelo</a></span>
                                            <span class="description">Data pubblicazione - 0:56 23/03/2016</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Offro lezioni di scherma per chi non ha la possibilità di pagarle.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio offerta</span>
                                    </div>
                                     /.box-body 
                                </div>
                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user5-128x128.jpg" alt="User Image">
                                            <span class="username"><a href="#">Vanni Buglione</a></span>
                                            <span class="description">Data pubblicazione - 4:56 11/03/2016</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Offro passaggio in auto nella zona di Bergamo.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio offerta</span>
                                    </div>
                                     /.box-body 
                                </div>
                            </div>
                        </div>-->
                        <div class="tab-pane" id="richieste">
                            <div class="box-body">
                                <?php
                                    
                                $allAnnunciRichiesta=$homeController->getAllAnnunciRichiesta();
                                foreach($allAnnunciRichiesta as $annuncio){
                                    $utenteAnnuncio=$homeController->getUtenteByEmail($annuncio->getEmail());
                                    printf("<div class=\"box box-widget\" style=\"border: 1px solid; border-radius: 10px; border-color: #1e9bd7;\"><div class=\"box-header with-border\"><div class=\"user-block\">");
                                    printf("<img class=\"img-circle\" src=\"%s\" alt=\"User Image\">",$utenteAnnuncio->getImmagine());
                                    printf("<span class=\"username\"><a href=\"#\">%s %s</a></span>",$utenteAnnuncio->getNome(), $utenteAnnuncio->getCognome());
                                    printf("<span class=\"description\">Data pubblicazione - %s &nbsp&nbsp Data servizio - %s &nbsp&nbsp Luogo servizio - %s</span></div></div>",$annuncio->getDataPubblicazione(),$annuncio->getData(),$annuncio->getLuogo());
                                    printf("<div class=\"box-body\"><p>%s</p><div class=\"col-md-8\"></div><div class=\"col-md-4\">",$annuncio->getDescrizione());
                                    printf("<button type=\"button\" class=\"btn btn-block btn-primary btn-sm\" href=\"#\">Sono interessato</button></div>");
                                    printf("<span class=\"pull-left text-muted\">Annuncio Richiesta</span></div></div>");
                                    
                                }
                                
                                
                                    ?>
<!--                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user1-128x128.jpg" alt="User Image">
                                            <span class="username"><a href="#">Nanocon La Spada</a></span>
                                            <span class="description">Data pubblicazione - 17:43 26/07/2016</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Cerco volontario che mi aiuti con esercizi per la crescita.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio richiesta</span>
                                    </div>
                                     /.box-body 
                                </div>
                            </div>
                        </div>-->
                        <div class="tab-pane active" id="tutti">
                            <div class="box-body">
                                <?php
                                    
                                $allAnnunci=$homeController->getAllAnnunci();
                                foreach($allAnnunci as $annuncio){
                                    $utenteAnnuncio=$homeController->getUtenteByEmail($annuncio->getEmail());
                                    printf("<div class=\"box box-widget\" style=\"border: 1px solid; border-radius: 10px; border-color: #1e9bd7;\"><div class=\"box-header with-border\"><div class=\"user-block\">");
                                    printf("<img class=\"img-circle\" src=\"%s\" alt=\"User Image\">",$utenteAnnuncio->getImmagine());
                                    printf("<span class=\"username\"><a href=\"#\">%s %s</a></span>",$utenteAnnuncio->getNome(), $utenteAnnuncio->getCognome());
                                    printf("<span class=\"description\">Data pubblicazione - %s &nbsp&nbsp Data servizio - %s &nbsp&nbsp Luogo servizio - %s</span></div></div>",$annuncio->getDataPubblicazione(),$annuncio->getData(),$annuncio->getLuogo());
                                    printf("<div class=\"box-body\"><p>%s</p><div class=\"col-md-8\"></div><div class=\"col-md-4\">",$annuncio->getDescrizione());
                                    printf("<button type=\"button\" class=\"btn btn-block btn-primary btn-sm\" href=\"#\">Sono interessato</button></div>");
                                    printf("<span class=\"pull-left text-muted\">Annuncio %s</span></div></div>",$annuncio->getTipologia());
                                    
                                }
                                
                                
                                    ?>
<!--                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user2-160x160.jpg" alt="User Image">
                                            <span class="username"><a href="#">Angioletto Caduto</a></span>
                                            <span class="description">Data pubblicazione - 7:27 Oggi</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Sono Angioletto Caduto e offro ripetizioni di ETC.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio offerta</span>
                                    </div>
                                     /.box-body 
                                </div>-->
<!--                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user1-128x128.jpg" alt="User Image">
                                            <span class="username"><a href="#">Nanocon La Spada</a></span>
                                            <span class="description">Data pubblicazione - 17:43 26/07/2016</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Cerco volontario che mi aiuti con esercizi per la crescita.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio richiesta</span>
                                    </div>
                                     /.box-body 
                                </div>
                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user3-128x128.jpg" alt="User Image">
                                            <span class="username"><a href="#">Michele Arcangelo</a></span>
                                            <span class="description">Data pubblicazione - 0:56 23/03/2016</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Offro lezioni di scherma per chi non ha la possibilità di pagarle.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio offerta</span>
                                    </div>
                                     /.box-body 
                                </div>-->
<!--                                <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                                    <div class="box-header with-border">
                                        <div class="user-block">
                                            <img class="img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user5-128x128.jpg" alt="User Image">
                                            <span class="username"><a href="#">Vanni Buglione</a></span>
                                            <span class="description">Data pubblicazione - 4:56 11/03/2016</span>
                                        </div>
                                         /.user-block 
                                    </div>
                                     /.box-header 
                                    <div class="box-body">
                                        <p>Offro passaggio in auto nella zona di Bergamo.</p>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-block btn-primary btn-sm">Sono interessato</button>
                                        </div>
                                        <span class="pull-left text-muted">Annuncio offerta</span>
                                    </div>
                                     /.box-body 
                                </div>-->
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