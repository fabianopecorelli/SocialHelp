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
                Profilo
            </h2>
        </div>
    </div>

    <ol class="breadcrumb" style="background: #e6eddc; font-size: 14px">
        <li><a href="<?php echo DOMINIO_SITO; ?>/"> Home</a></li>
        <li class="active">Profilo</li>
    </ol>
</div>

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="img-circle img-bordered-sm" style="max-width: 136px" src="<?php printf("%s",$utente->getImmagine()); ?>" alt="user image">

                <h3 class="profile-username text-center"><?php printf("%s %s",$utente->getNome(),$utente->getCognome());    ?></h3>

                <p class="text-muted text-center"><?php  if(($utente->getTipologia())=="Offerente") {printf("%s",$utente->getProfessione());}   ?></p>
                <p class="text-center"><?php  printf("%s",$utente->getDescrizione());      ?></p>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informazioni</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-calendar margin-r-5"></i> Data di nascita</strong>

                <p class="text-muted">
                    <?php  printf("%s",$utente->getData());  ?>
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Città</strong>

                <p class="text-muted"><?php  printf("%s",$utente->getCitta());  ?></p>

                <hr>

                <strong><i class="fa fa-phone margin-r-5"></i> Telefono</strong>

                <p class="text-muted"><?php  printf("%s",$utente->getTelefono());  ?></p>

                <hr>

                <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                <p class="text-muted"><?php  printf("%s",$utente->getEmail());  ?></p>

                <hr>

                <strong><i class="fa fa-files-o margin-r-5"></i> <a style="cursor: pointer">Esperienze</a></strong>

                <p class="text-muted">Voto medio: <?php  printf("%s",$profiloController->getVotoMedioEsperienze($utente->getEmail())); ?> <i class="fa fa-star-o"></i>. <br/>  Basato su <?php  printf("%s",$profiloController->getNumeroEsperienze($utente->getEmail())); ?> esperienze.</p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php
                if($utente->getTipologia()=="Offerente"){
                printf("<li class=\"active\"><a href=\"#statistiche\" onclick=\"initializeChart()\" data-toggle=\"tab\">Statistiche</a></li>");
                }
                      ?>
                <li<?php if($utente->getTipologia()=="Cliente"){printf(" class=\"active\"");}   ?>><a href="#annunci" data-toggle="tab">Annunci</a></li>
                <?php
                if($utente->getTipologia()=="Offerente"){
                printf("<li><a href=\"#esperienze\" data-toggle=\"tab\">Esperienze</a></li>");
                }
                        ?>
            </ul>
            <div class="tab-content">
                <div <?php if($utente->getTipologia()=="Cliente"){printf("class=\"active tab-pane\"");}else{printf("class=\"tab-pane\"");}?>id="annunci">
                
                    <!-- Post -->
                    <?php
                      
                        $allAnnunci=$profiloController->getAnnunciByEmail($utente->getEmail());
                                foreach($allAnnunci as $annuncio){
                        
                        printf("<div class=\"post\"><div class=\"user-block\">");
                        printf("<img class=\"img-circle img-bordered-sm\" src=\"%s\" alt=\"user image\">",$utente->getImmagine());
                        printf("<span class=\"username\">");
                        printf("<a href=\"#\">%s %s</a><a href=\"#\" class=\"pull-right btn-box-tool\"><i class=\"fa fa-times\"></i></a></span>",$utente->getNome(),$utente->getCognome());
                        printf("<span class=\"description\">Data pubblicazione - %s &nbsp&nbsp Data servizio - %s &nbsp&nbsp Luogo servizio - %s</span></div>",$annuncio->getDataPubblicazione(),$annuncio->getData(),$annuncio->getLuogo());
                        printf("<p>%s</p>",$annuncio->getDescrizione());
                        printf("<span class=\"pull-left text-muted\">Annuncio %s</span><br></div>", $annuncio->getTipologia());
                        
                        
                                }
                    ?>
<!--                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo STYLE_DIR; ?>dist/img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                           </span>
                                  <a href="#">Jonathan Burke Jr.</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                           <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                         /.user-block 
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>
                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                     /.post 

                     Post 
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo STYLE_DIR; ?>dist/img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <a href="#">Sarah Ross</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                            <span class="description">Sent you a message - 3 days ago</span>
                        </div>
                         /.user-block 
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>

                        <form class="form-horizontal">
                            <div class="form-group margin-bottom-none">
                                <div class="col-sm-9">
                                    <input class="form-control input-sm" placeholder="Response">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                     /.post 

                     Post 
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo STYLE_DIR; ?>dist/img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                         /.user-block 
                        <div class="row margin-bottom">
                            <div class="col-sm-6">
                                <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo1.png" alt="Photo">
                            </div>
                             /.col 
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo2.png" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo3.jpg" alt="Photo">
                                    </div>
                                     /.col 
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo4.jpg" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo1.png" alt="Photo">
                                    </div>
                                     /.col 
                                </div>
                                 /.row 
                            </div>
                             /.col 
                        </div>
                         /.row 

                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>-->
                    <!-- /.post -->
                </div>
                <!--QUESTO E' DA TOGLIERE ALLA FINE-->
                <div class="tab-pane" id="esperienze">
                    <!-- Post -->
                    
                    <?php
                    if($utente->getTipologia()=="Offerente"){
                        /**
                         * TOGLIERE IL COMMENTO ALLA FINE
                         * printf("<div class=\"tab-pane\" id=\"esperienze\">");
                         */
                    $allEsperienze=$profiloController->getEsperienzeByEmail($utente->getEmail());
                                foreach($allEsperienze as $esperienza){
                                $recensore= $profiloController->getUtenteByEmail($esperienza->getRecensore());   
                        
                        printf("<div class=\"post\"><div class=\"user-block\">");
                        printf("<img class=\"img-circle img-bordered-sm\" src=\"%s\" alt=\"user image\">",$recensore->getImmagine());
                        printf("<span class=\"username\">");
                        printf("<a href=\"#\">%s %s</a><a href=\"#\" class=\"pull-right btn-box-tool\"><i class=\"fa fa-times\"></i></a></span>",$recensore->getNome(),$recensore->getCognome());
                        printf("<span class=\"description\">Data pubblicazione - %s  &nbsp&nbsp Voto - %d  <i class=\"fa fa-star-o\"></i></span></div>",$esperienza->getData(),$esperienza->getVoto());
                        printf("<p>%s</p><br></div>",$esperienza->getDescrizione());
                        
                        
                        
                                }
                        
                        /**
                         * TOGLIERE IL COMMENTO ALLA FINE
                         * printf("</div>");
                         */
                    
                    }
                    ?>
                    
                    <div class="post">
                        <div class="user-block">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo STYLE_DIR; ?>dist/img/user4-128x128.jpg" alt="User profile picture">
                            <span class="username">
                                <a href="#">Nina Mcintire</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>
                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo STYLE_DIR; ?>dist/img/user7-128x128.jpg" alt="User Image">
                            <span class="username">
                                <a href="#">Sarah Ross</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                            <span class="description">Sent you a message - 3 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>

                        <form class="form-horizontal">
                            <div class="form-group margin-bottom-none">
                                <div class="col-sm-9">
                                    <input class="form-control input-sm" placeholder="Response">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo STYLE_DIR; ?>dist/img/user6-128x128.jpg" alt="User Image">
                            <span class="username">
                                <a href="#">Adam Jones</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="row margin-bottom">
                            <div class="col-sm-6">
                                <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo2.png" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo3.jpg" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo4.jpg" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="<?php echo STYLE_DIR; ?>dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                
                            <?php
                            if($utente->getTipologia()=="Offerente"){
                            
                                printf("<div class=\"active tab-pane\" id=\"statistiche\"><div class=\"box-body\"><canvas id=\"pieChart\" style=\"height: 264px; width: 528px;\" width=\"528\" height=\"264\"></canvas></div>");
                                printf("<div class=\"row\"><div class=\"col-md-1\"></div><div class=\"col-md-3\">");
                            
                            if(($utenteloggato==0)AND($utente->getTipologia()=="Cliente")){
                                printf("<a href=\"DOMINIO_SITO/inserisciEsperienza\" style=\"cursor: pointer\"><i class=\"fa fa-plus\"></i>Aggiungi una nuova esperienza</a>");
                                }
                                printf("</div><div class=\"col-md-4\"></div><div class=\"col-md-3\">");
                                printf("Recensioni positive: %d <BR>",$profiloController->getVotiPositiviEsperienze($utente->getEmail()));
                                printf("Recensioni negative: %d",$profiloController->getVotiNegativiEsperienze($utente->getEmail()));
                                printf("</div></div></div>");
                            }
                            ?>
                        
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!-- /.content-wrapper -->
<!-- ./wrapper -->

<?php include_once VIEW_DIR . 'footer.php'; ?>

<!-- FastClick -->
<script src="<?php echo STYLE_DIR; ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo STYLE_DIR; ?>dist/js/demo.js"></script>

<script src="<?php echo STYLE_DIR; ?>plugins/chartjs/Chart.min.js"></script>

<script>
                            $(function () {
                                /* ChartJS
                                 * -------
                                 * Here we will create a few charts using ChartJS
                                 */


                                //-------------
                                //- PIE CHART -
                                //-------------
                                // Get context with jQuery - using jQuery's .get() method.
                                var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                                var pieChart = new Chart(pieChartCanvas);
                                var positive = <?php printf("%d",$profiloController->getVotiPositiviEsperienze($utente->getEmail()));  ?>;
                                var negative = <?php printf("%d",$profiloController->getVotiNegativiEsperienze($utente->getEmail()));  ?>;
                                
                                var PieData = [
                                    {
                                        value: [[positive]],
                                        color: "#00a65a",
                                        highlight: "#00a65a",
                                        label: "Voti positivi"
                                    },
                                    {
                                        value: [[negative]],
                                        color: "#f56954",
                                        highlight: "#f56954",
                                        label: "Voti negativi"
                                    }
                                ];
                                var pieOptions = {
                                    //Boolean - Whether we should show a stroke on each segment
                                    segmentShowStroke: true,
                                    //String - The colour of each segment stroke
                                    segmentStrokeColor: "#fff",
                                    //Number - The width of each segment stroke
                                    segmentStrokeWidth: 2,
                                    //Number - The percentage of the chart that we cut out of the middle
                                    percentageInnerCutout: 50, // This is 0 for Pie charts
                                    //Number - Amount of animation steps
                                    animationSteps: 100,
                                    //String - Animation easing effect
                                    animationEasing: "easeOutBounce",
                                    //Boolean - Whether we animate the rotation of the Doughnut
                                    animateRotate: true,
                                    //Boolean - Whether we animate scaling the Doughnut from the centre
                                    animateScale: false,
                                    //Boolean - whether to make the chart responsive to window resizing
                                    responsive: true,
                                    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                                    maintainAspectRatio: true,
                                    //String - A legend template
                                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                                };
                                //Create pie or douhnut chart
                                // You can switch between pie and douhnut using the method below.
                                pieChart.Doughnut(PieData, pieOptions);

                            });
</script>