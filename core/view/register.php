<?php
/**
 * 
 * @author Fabiano Pecorelli
 * @version 1.0
 * @since 30/05/16
 */
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SocialHelp | Registrazione</title>
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
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/iCheck/square/blue.css">
        <link href="<?php echo STYLE_DIR; ?>plugins/toastr/toastr.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo STYLE_DIR; ?>img/favicon.png" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/iCheck/all.css">

        <link rel="stylesheet" href="<?php echo STYLE_DIR; ?>plugins/select2/select2.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body background="<?php echo STYLE_DIR; ?>img/bg3.jpg">
        <div class="register-logo" style="margin-top: 2%">
            <a href="index2.html" class="logo">
                <img src="<?php echo STYLE_DIR; ?>img/logo-traccia.png"/>
            </a>
        </div>
        <div class="register-box">

            <div class="register-box-body" style="background: #e6eddc;border: solid 2px;border-radius: 45px;">
                <p class="login-box-msg title">Registrazione</p>

                <form action="<?php echo DOMINIO_SITO; ?>/effettuaRegistrazione" method="post" id="modulo" name="modulo" onsubmit="return Modulo()" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nome" placeholder="Nome">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cognome" placeholder="Cognome">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="simple-text">Cosa ci fai qui?</label>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="tipologia" value="Cliente" class="flat-red" checked> Cerco servizi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="tipologia" value="Offerente" class="flat-red"> Offro servizi
                                    </label>
                                </div>
                            </div>
                            <div class="input-group" style="visibility: hidden;">
                                <input type="text" class="form-control" name="professione" id="prof" placeholder="Professione">
                                <div class="input-group-addon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" name="datanascita" id="datepicker" placeholder="Data di nascita">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar" onclick="document.getElementById('datepicker').focus()"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <select class="form-control select2" name="citta" id="listacitta" style="width: 100%;">

                                    </select><div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="simple-text">Descrizione:</label>
                                <textarea style="resize: none" class="form-control" name="descrizione" rows="3" placeholder="Inserisci una tua descrizione..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                            </div><div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="passwordretyped" placeholder="Conferma password">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="user-panel">
                                <div class="pull-left image" style="margin-bottom: 2%; margin-right: 5%">
                                    <img src="<?php echo STYLE_DIR; ?>img/user-standard.png" id="immagine"  class="img-circle" alt="User Image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Immagine personale</label>
                                    <input type="file" name="immagine" onchange="cambiaImmagine(this)" id="exampleInputFile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" class="flat-red" name="accetto" id="accetto" style="position: absolute; opacity: 0;"> Autorizzo il trattamento dei dati personali
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit"  name="submit" class="btn btn-primary btn-block btn-flat">Registrati</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.form-box -->
            </div>
            <!-- /.register-box -->
        </div>

        <!-- jQuery 2.2.0 -->
        <script src="<?php echo STYLE_DIR; ?>plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo STYLE_DIR; ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo STYLE_DIR; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo STYLE_DIR; ?>plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo STYLE_DIR; ?>plugins/toastr/toastr.js"></script>

        <script src="<?php echo STYLE_DIR; ?>plugins/select2/select2.full.min.js"></script>
        <script type="text/javascript" src="<?php echo STYLE_DIR; ?>/scripts/caricacitta.js"></script>
        <script>
                                        function cambiaImmagine(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#immagine').attr('src', e.target.result);
                                                }

                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }

                                        $(function () {
                                            //Initialize Select2 Elements
                                            $(".select2").select2();
                                            $('input').iCheck({
                                                checkboxClass: 'icheckbox_square-blue',
                                                radioClass: 'iradio_square-blue',
                                                increaseArea: '20%' // optional
                                            });
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
        <script>

            function Modulo() {
                // Variabili associate ai campi del modulo
                var nome = document.modulo.nome.value;
                var cognome = document.modulo.cognome.value;
                var telefono = document.modulo.telefono.value;
                var email = document.modulo.email.value;
                var citta = document.modulo.citta.value;
                var password = document.modulo.password.value;
                var passwordretyped = document.modulo.passwordretyped.value;
                var nascita = document.modulo.datanascita.value;
                var accetto = document.modulo.accetto;
                var email_reg_exp = /^[_a-zA-Z0-9+-]+(\.[_a-zA-Z0-9+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/;
                var tel_reg_exp = /^[0-9]{5,10}$/;


                //Effettua il controllo sul campo NOME
                if ((nome == "") || (nome == "undefined")) {
                    toastr["error"]("Il campo Nome è obbligatorio.");
                    document.modulo.nome.focus();
                    return false;
                    //Effettua il controllo sul campo COGNOME
                } else if ((cognome == "") || (cognome == "undefined")) {
                    toastr["error"]("Il campo Cognome è obbligatorio.");
                    document.modulo.cognome.focus();
                    return false;
                    //Effettua il controllo sul campo TELEFONO    
                } else if ((isNaN(telefono)) || (telefono == "") || (telefono == "undefined") || !tel_reg_exp.test(telefono)) {
                    toastr["error"]("Il campo Telefono è obbligatorio, numerico di almeno 5 cifre e massimo 10.");
                    document.modulo.telefono.value = "";
                    document.modulo.telefono.focus();
                    return false;
                } else if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")) {
                    toastr["error"]("Inserire un indirizzo email corretto.");
                    document.modulo.email.select();
                    return false;
                } else if ((nascita == "") || (nascita == "undefined")) {
                    toastr["error"]("Il campo Data di nascita è obbligatorio.");
                    document.modulo.datanascita.focus();
                    return false;
                } else if ((citta == "") || (citta == "undefined") || (citta == "Seleziona città...")) {
                    toastr["error"]("Il campo Città è obbligatorio.");
                    document.modulo.citta.focus();
                    return false;

                } else if ((password == "") || (password == "undefined") || ((password.length)<8)) {
                    toastr["error"]("Il campo Password è obbligatorio e deve avere una lunghezza minima di 8 caratteri.");
                    document.modulo.password.focus();
                    return false;
                }
                //Effettua il controllo sul campo CONFERMA PASSWORD
                else if ((passwordretyped == "") || (passwordretyped == "undefined")) {
                    toastr["error"]("Il campo Conferma password è obbligatorio.");
                    document.modulo.passwordretyped.focus();
                    return false;
                }
                //Verifica l'uguaglianza tra i campi PASSWORD e CONFERMA PASSWORD
                else if (password != passwordretyped) {
                    toastr["error"]("La password confermata è diversa da quella scelta, controllare.");
                    document.modulo.passwordretyped.value = "";
                    document.modulo.passwordretyped.focus();
                    return false;
                }else if (!(accetto.checked)) {
                    toastr["error"]("E' necessario autorizzare il trattamento dei dati.");
                    return false;
                } else {

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
        } ?>
    </body>
</html>
