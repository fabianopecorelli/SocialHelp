<?php
/**
 * 
 * @author Fabiano Pecorelli
 * @version 1.0
 * @since 30/05/16
 */
include_once MODEL_DIR . 'Utente.php';

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Social Help</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>dist/css/AdminLTE.min.css">

        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/iCheck/all.css">
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/iCheck/square/blue.css">
        
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/daterangepicker/daterangepicker-bs3.css">

        <link rel="shortcut icon" href="<?php echo STYLE_DIR; ?>img/favicon.png" type="image/x-icon" />

        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/select2/select2.min.css">
        <link href="<?php echo STYLE_DIR; ?>plugins/toastr/toastr.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo STYLE_DIR; ?>plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <script src="<?php echo STYLE_DIR; ?>plugins/search/typeahead.min.js"></script>

        <script>
            function showResult(str) {
                if (str.length == 0) {
                    document.getElementById("livesearch").innerHTML = "";
                    document.getElementById("livesearch").style.border = "0px";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                        document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                    }
                }
                xmlhttp.open("GET", "<?php echo DOMINIO_SITO; ?>/livesearch?q=" + str, true);
                xmlhttp.send();
            }
            $(document).ready(function () {
                $('input.typeahead').typeahead({
                    name: 'typeahead',
                    remote: '<?php echo DOMINIO_SITO; ?>/livesearch?key=%QUERY',
                    limit: 10
                });
            });
            function rimuoviTag() {
                var el = document.getElementById("testo");
                el.value = el.value.replace(/(<([^>]+)>)/ig, "");
            }
            function inviaDati(val) {
                    window.open('<?php echo DOMINIO_SITO; ?>/profilo/' + val, '_blank');
            }

            function prova(value) {
                var str = value.split("[");
                var id = str[1].split("]")[0];
                val = id;
//    window.open('<?php echo DOMINIO_SITO; ?>/profile/' + id, '_blank');
            }
            function Modulo() {
                // Variabili associate ai campi del modulo
                var nomeUtente = document.modulo.typeahead.value.split(" ");
                var nome = nomeUtente[0];
                var cognome = nomeUtente[1];
                if (cognome == undefined) {
                    toastr["warning"]("Utente non trovato.");
                    document.modulo.typeahead.focus();
                    return false;
                }
                //Effettua il controllo sul campo NOME

//                xmlhttp = new XMLHttpRequest();
//                xmlhttp.onreadystatechange = function () {
//                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                        var id = xmlhttp.responseText;
//                        if ((id == "") || (id == undefined) || (id == "non trovato")) {
//                            toastr["warning"]("Utente non trovato.");
//                            document.modulo.typeahead.focus();
//                            return false;
//                        }
//                        if ((id == "piu utenti")) {
//                            toastr["warning"]("Esistono più utenti con questo nome. Per favore fare click sull'utente desiderato.");
//                            document.modulo.typeahead.focus();
//                            return false;
//                        }
//                    }
//                }
//                xmlhttp.open("GET", "<?php echo DOMINIO_SITO; ?>/cercaUtente?nome=" + nome + "&cognome=" + cognome, true);
//                xmlhttp.send();
                check = false;

                return false;
            }
        </script>
        <style type="text/css">
            .bs-example{
                font-family: sans-serif;
                position: relative;
                margin: 50px;
            }
            .typeahead, .tt-query, .tt-hint {
                border: 2px solid #CCCCCC;
                border-radius: 8px;
                font-size: 16px;
                height: 30px;
                line-height: 30px;
                outline: medium none;
                padding: 8px 12px;
                width: 100%;
            }
            .typeahead {
                background-color: #FFFFFF;
            }
            .typeahead:focus {
                border: 2px solid #0097CF;
            }
            .tt-query {
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            }
            .tt-hint {
                color: #999999;
            }
            .tt-dropdown-menu {
                background-color: #FFFFFF;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                margin-top: 12px;
                padding: 8px 0;
                width: 100%;
            }
            .tt-suggestion {
                font-size: 12px;
                line-height: 24px;
                padding: 3px 20px;
            }
            .tt-suggestion.tt-is-under-cursor {
                background-color: #0097CF;
                color: #FFFFFF;
            }
            .tt-suggestion p {
                margin: 0;
            }
            .twitter-typeahead{
                margin: 15px;
            }
        </style>
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="<?php echo DOMINIO_SITO; ?>/" class="logo" style="background: #222d32">
                    <img src="<?php echo STYLE_DIR; ?>img/logoHomePiccolo.png"/>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- User Account Menu -->
                            <?php if (isset($user) && !empty($user)) { ?>
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <img src="<?php echo $user->getImmagine(); ?>" class="user-image" alt="User Image">
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs"><?php echo $user->getNome(); ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <img src="<?php echo $user->getImmagine(); ?>" class="img-circle" alt="User Image">

                                            <p>
                                                <?php echo $user->getNome() . " " . $user->getCognome();?> 
                                                <small><?php echo $user->getEmail(); ?></small>
                                            </p>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo DOMINIO_SITO; ?>/profilo" class="btn btn-default btn-flat">Profilo</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="<?php echo DOMINIO_SITO; ?>/logout" class="btn btn-default btn-flat">Log out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            <?php } else {
                                ?>
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="<?php echo DOMINIO_SITO; ?>/auth">
                                        <!-- The user image in the navbar-->
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->

                                        <span class="hidden-xs">Login</span>
                                        <i class="fa fa-sign-in"></i>
                                    </a>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <?php if (isset($user) && !empty($user)) { ?>
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="<?php echo $user->getImmagine(); ?>" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p><?php echo $user->getNome(); ?></p>
                            </div>
                        </div>
                    <?php } ?>
<!--                            <input type="text" onkeyup="showResult(this.value)" class="form-control" placeholder="Ricerca Utente...">-->

                    <input type="text" style="width: 100%" id="testo" onkeyup="rimuoviTag();" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Cerca Utente">

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="active"><a href="<?php echo DOMINIO_SITO; ?>/"><i class="fa fa-home"></i> <span>Home</span></a></li>
                        <?php if (isset($user) && !empty($user)) { ?>
                            <li><a href="<?php echo DOMINIO_SITO; ?>/profilo"><i class="fa fa-user"></i> <span>Profilo</span></a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-pencil"></i> <span>Gestione Annunci</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo DOMINIO_SITO; ?>/inserisciAnnuncio">Nuovo Annuncio</a></li>
                                    <li><a href="<?php echo DOMINIO_SITO; ?>/ricercaAnnuncio">Cerca Annuncio</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background: url('<?php echo DOMINIO_SITO; ?>/style/img/bg3.jpg')">

                <!-- Main content -->
                <section class="content" style="margin-top: 0%">
                    <div class="generic-box">

                        <div class="generic-box-body" style="background: #e6eddc;border: solid 2px;border-radius: 45px;">
                            <!-- BREADCRUMBS -->