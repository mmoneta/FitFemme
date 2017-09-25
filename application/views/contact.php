<!DOCTYPE HTML>
<html>
    <head>
        <title>Kontakt</title>
        <meta charset="utf-8">
        <meta name="author" content="Mateusz Moneta">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>uploads/women-fitness.png">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <!-- Animation -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animations.css">
        <!-- Link and activate WOW.js -->
        <script src="<?php echo base_url(); ?>js/wow.js"></script>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>    
            #section-contact {
                background: #252e30;
            }
            
            #section-contact .heading-title{
                color: #fff;
            }
            
            .contact-left {
            	padding-top: 30px;
                font-size: 16px;
                color: #fff;
                text-align: center;
            }
            
            .contact-left > ul {
                list-style-type: none;
            }
            
            .contact-left > ul > li {
                text-align: center !important;
            }
            
            .contact-text {
                text-align: center;
                font-size: 18px;
                color: #EA2A9C !important;
                overflow: hidden;
                line-height: 30px;
            }
            
            .form-control {
            	background: transparent;
            	border: 2px solid white;
            	color: white !important;
            	padding: 16px;
            }
            
            .form-control::placeholder {
            	color: white !important;
            }
            
            ul {
                list-style-type: none !important;
            }
            
            label {
                color: white;
            }
            
            textarea {
                resize: vertical;
            }
        </style>
        <script>
            new WOW().init();
        </script>
    </head>
    <body></body>
        <nav id="top-menu" class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>blog" class="company">FitFemme</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url(); ?>blog" class="navbar-link">Strona główna</a></li>
                        <li><a href="<?php echo base_url(); ?>blog/metamorphoses" class="navbar-link">Metamorfozy</a></li>
                        <li><a href="<?php echo base_url(); ?>blog/about" class="navbar-link">O mnie</a></li>
                        <li><a href="<?php echo base_url(); ?>blog/cooperation" class="navbar-link">Współpraca</a></li>
                        <li class="active"><a href="<?php echo base_url(); ?>blog/contact">Kontakt</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container top-buffer">
            <div class="row">
                <p class="contact-text wow pulse infinite" style="text-indent: 0em !important;" data-wow-duration="3.2s" style="overflow: hidden;">Jeżeli masz jakieś pytania dotyczące bloga<br />lub planujesz współpracę ze mną jako trenerem:</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-left">
                        <ul>
                            <li><span style="font-weight: bold;">E-mail: </span><a>kontakt@fitfemme.pl</a></li>
                            <li class="top-buffer"><a href="https://www.facebook.com/Fit.Femme19/" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <form name="sentMessage" id="contactForm">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Imię</label>
                                <input type="text" class="form-control" placeholder="Imię" id="name" name="name" required data-validation-required-message="Proszę wpisać swoje imię!">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Twój e-mail</label>
                                <input type="email" class="form-control" placeholder="E-mail" id="email" name="email" required data-validation-required-message="Proszę wpisać swój adres e-mail!">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong>Nieprawidłowa domena!</strong>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Wiadomość</label>
                                <textarea rows="5" class="form-control" placeholder="Wiadomość" name="message" id="message" required data-validation-required-message="Proszę wpisać wiadomość!"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-4 col-sm-offset-4">
                                <button type="submit" class="btn btn-default btn-block">Wyślij</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            
            ga('create', 'UA-106391342-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>