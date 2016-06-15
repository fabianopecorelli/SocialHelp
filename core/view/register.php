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
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="plugins/iCheck/all.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body background="img/bg3.jpg">
        <div class="register-logo" style="margin-top: 2%">
            <a href="index2.html" class="logo">
                <img src="img/logo-traccia.png"/>
            </a>
        </div>
        <div class="register-box">

            <div class="register-box-body" style="background: #e6eddc;border: solid 2px;border-radius: 45px;">
                <p class="login-box-msg title">Registrazione</p>

                <form action="<?php echo DOMINIO_SITO; ?>/effettuaRegistrazione" method="post">
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
                                        <input type="radio" name="tipologia" value="Disabile" class="flat-red" checked> Cerco servizi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="tipologia" value="Offerente" class="flat-red"> Offro servizi
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="email" name="e-mail" class="form-control" placeholder="Email">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" name="data-nascita" id="datepicker" placeholder="Data di nascita">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <input type="text"  name="citta" class="form-control" placeholder="Città">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="simple-text">Descrizione:</label>
                                <textarea style="resize: none" class="form-control" name="descrizione" rows="3" placeholder="Inserisci descrizione..."></textarea>
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
                                    <input type="password" class="form-control" name="password-retyped" placeholder="Conferma password">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="user-panel">
                                <div class="pull-left image" style="margin-bottom: 2%; margin-right: 5%">
                                    <img src="img/user-standard.png" id="immagine" name="immagine" class="img-circle" alt="User Image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Immagine personale</label>
                                    <input type="file" onchange="cambiaImmagine(this)" id="exampleInputFile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" class="flat-red" style="position: absolute; opacity: 0;"> Accetto <a href="#">termini e condizioni</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Registrati</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.form-box -->
            </div>
            <!-- /.register-box -->
        </div>
        <!-- jQuery 2.2.0 -->
        <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="plugins/iCheck/icheck.min.js"></script>

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
    </body>
</html>