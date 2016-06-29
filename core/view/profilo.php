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
    $utenteLoggato = unserialize($_SESSION['user']);
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
                    <?php  echo date("d/m/Y", strtotime($utente->getData()));  ?>
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
                <?php  if(($utente->getTipologia())=="Offerente"){   ?>
                <p class="text-muted">Voto medio: <?php  printf("%d",$profiloController->getVotoMedioEsperienze($utente->getEmail())); ?> <i class="fa fa-star-o"></i>. <br/>  Basato su <?php  printf("%s",$profiloController->getNumeroEsperienze($utente->getEmail())); ?> esperienze.</p>
                <?php  }  ?>
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
                printf("<li class=\"active\"><a href=\"#statistiche\" onclick=\"\" data-toggle=\"tab\">Statistiche</a></li>");
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
                                if($allAnnunci==NULL){
                                    printf("<H2>Non esiste alcun annuncio!</H2>");
                                }
                                foreach($allAnnunci as $annuncio){
                        ?>
                    
                         <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php printf("%s",$utente->getImmagine());  ?>" alt="user image">
                            <span class="username">
                           </span>
                            <a href="#"><?php printf("&nbsp %s %s",$utente->getNome(),$utente->getCognome());  ?></a> <p><?php echo strtoupper($annuncio->getTitolo()); ?></p>
                                <span class="description">Data pubblicazione: <?php echo date("d/m/Y", strtotime($annuncio->getDataPubblicazione())); ?> - Data servizio: <?php echo date("d/m/Y", strtotime($annuncio->getData())); ?> - Luogo servizio: <?php echo $annuncio->getLuogo(); ?></span>
                        </div> 
                        <div class="box-body">
                                    <p><?php echo $annuncio->getDescrizione(); ?></p>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                    </div>
                                    <span class="pull-left text-muted">Annuncio <?php echo $annuncio->getTipologia(); ?></span>
                                </div>
                            </div>
                    
                    
                        
                    <?php     }    ?>
                    
                </div>
                <!--QUESTO E' DA TOGLIERE ALLA FINE-->
                
                    <!-- Post -->
                    
                    <?php
                    if($utente->getTipologia()=="Offerente"){
                        
                          
                          printf("<div class=\"tab-pane\" id=\"esperienze\">");
                         
                    $allEsperienze=$profiloController->getEsperienzeByEmail($utente->getEmail());
                    if($allEsperienze==NULL){
                                    printf("<H2>Non esiste alcun esperienza!</H2>");
                                }
                                foreach($allEsperienze as $esperienza){
                                $recensore= $profiloController->getUtenteByEmail($esperienza->getRecensore()); 
                                $id = $recensore->getId();
                        ?>
                        
                    
                        <div class="box box-widget" style="border: 1px solid; border-radius: 10px; border-color: #1e9bd7;">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php printf("%s",$recensore->getImmagine());  ?>" alt="user image">
                            <span class="username">
                           </span>
                            <a href="<?php echo DOMINIO_SITO;?>/profilo/<?php echo $id; ?>"><?php printf("&nbsp %s %s",$recensore->getNome(),$recensore->getCognome());  ?></a>
                            <span class="description">Data pubblicazione: <?php echo date("d/m/Y", strtotime($esperienza->getData()));?>  - Voto:<?php printf("%d ",  $esperienza->getVoto());?><i class="fa fa-star-o"></i></span>
                        </div> 
                        <div class="box-body">
                            <p><?php printf("%s",$esperienza->getDescrizione()); ?></p>
                                    <div class="col-md-8"></div>
                    
                                </div>
                            </div>
                        
                        
                        
                         <?php       }
                        
                        
                          printf("</div>");
                         
                    
                    }
                    ?>
                    
                    
                <!-- /.tab-pane -->
                
                            <?php
                            if($utente->getTipologia()=="Offerente"){
                                
                                
                                printf("<div class=\"active tab-pane\" id=\"statistiche\"><div class=\"box-body\">");
                                if(($profiloController->getVotiPositiviEsperienze($utente->getEmail()))==0 && ($profiloController->getVotiNegativiEsperienze($utente->getEmail()))==0){
                                    printf("<H2>Utente non recensito!</H2>");
                                }
                                printf("<canvas id=\"pieChart\" style=\"height: 264px; width: 528px;\" width=\"528\" height=\"264\"></canvas></div>");
                                printf("<div class=\"row\"><div class=\"col-md-1\"></div><div class=\"col-md-3\">");
                                
                            if(($utenteloggato==0) && ($utenteLoggato->getTipologia()=="Cliente")){
                                printf("<a href=\"%s/inserisciEsperienza/%s\" style=\"cursor: pointer\"><i class=\"fa fa-plus\"></i>Aggiungi una nuova esperienza</a>",DOMINIO_SITO,$utente->getId());
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
                                var positive = <?php printf("%d",  $profiloController->getVotiPositiviEsperienze($utente->getEmail()));  ?>;
                                var negative = <?php printf("%d",  $profiloController->getVotiNegativiEsperienze($utente->getEmail()));  ?>;
                                
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