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
        <title>SocialHelp | Log In</title>
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body background="<?php echo STYLE_DIR; ?>img/bg3.jpg">

        <div class="login-logo" style="margin-top: 2%">
            <a href="index2.html" class="logo">
                <img src="<?php echo STYLE_DIR; ?>img/logo-traccia.png"/>
            </a>
        </div>
        <div class="login-box">

            <div class="login-box-body" style="background: #e6eddc;border: solid 2px;border-radius: 45px;">
                <p class="login-box-msg title">Log In</p>
                <form action="<?php echo DOMINIO_SITO; ?>/effettuaLogin" method="post" onsubmit="return Modulo()" id="modulo" name="modulo">

                    <div class="form-group has-feedback">
                        <div class="input-group date">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group date">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember" class="flat-red" style="position: absolute; opacity: 0;"> Ricordami
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--                    <a href="#">Password dimenticata?</a>
                                        <br/>-->
                    <br/>
                    <a href="<?php echo DOMINIO_SITO; ?>/register">Registrati</a>



                </form>

                <!-- /.form-box -->
            </div>
            <!-- /.login-box -->
        </div>
        <!-- jQuery 2.2.0 -->
        <script src="<?php echo STYLE_DIR; ?>plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo STYLE_DIR; ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo STYLE_DIR; ?>plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo STYLE_DIR; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo STYLE_DIR; ?>plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo STYLE_DIR; ?>plugins/toastr/toastr.js"></script>
        <script src="<?php echo STYLE_DIR; ?>dist/js/app.min.js"></script>

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
        <script>

            function Modulo() {
                // Variabili associate ai campi del modulo
                var email = document.modulo.email.value;
                var password = document.modulo.password.value;
                var email_reg_exp = /^[_a-zA-Z0-9+-]+(\.[_a-zA-Z0-9+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/;


                if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")) {
                    toastr["error"]("Inserire un indirizzo email corretto.");
                    document.modulo.email.select();
                    return false;
                } else if ((password == "") || (password == "undefined") || ((password.length) < 8)) {
                    toastr["error"]("Inserire una password valida.");
                    document.modulo.password.focus();
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
        }
        ?>
    </body>
</html>