<!DOCTYPE HTML>
<html>
    <head>
        <title>O mnie</title>
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>portfolio/css/animations.css">
        <!-- Link and activate WOW.js -->
        <script src="<?php echo base_url(); ?>portfolio/js/wow.js"></script>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>portfolio/css/font-awesome.min.css">
        <style>         
            p {
                text-indent: 0em !important;
            }
            
            .row ul {
                font-size: 16px;
            }
            
            .row li {
                padding: 10px;
            }
            
            .main {
                height: 300px;
            }
        </style>
    </head>
    <body>
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
                        <li class="active"><a href="<?php echo base_url(); ?>blog/about">O mnie</a></li>
                        <li><a href="<?php echo base_url(); ?>blog/cooperation" class="navbar-link">Współpraca</a></li>
                        <li><a href="<?php echo base_url(); ?>blog/contact" class="navbar-link">Kontakt</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container top-buffer">
            <div class="row top-buffer">
                <p class="text-center" style="font-weight: bold;">Cieszę się, że tu jesteś!</p>
                <img class="wait top-buffer center-block" src="<?php echo base_url(); ?>uploads/clear.gif" alt="Session" />
                <p class="text-justify top-buffer">Mam na imię Agnieszka, mam 19 lat i z zawodu jestem trenerem personalnym.<br />Na co dzień niesamowicie pozytywną oraz zakręconą dziewczyną walczącą o każdy szczegół, który przybliża ją do marzeń.<br />Sport i zdrowe odżywianie to mój styl życia.<br />Jestem zdeterminowana w dążeniu do perfekcji. Spełniam swoje marzenia popełniając błąd za błędem, porażkę za porażką, ale za każdym razem podnoszę się, stając się silniejsza.<br />W przyszłości (już niedługo) chciałabym startować w zawodach "Bikini Fitness" oraz pomagać innym, aby nie poddawali się za wcześnie, bo później już samo pójdzie.<br />Na blogu znajdziecie dużo przepisów, porad, wskazówek oraz treningów.</p>
            </div>
            <div class="row top-buffer">
                <p style="font-weight: bold;">Moje specjalizacje: </p>
                <ul>
                    <li>Instruktor siłowni</li>
                    <li>Trener personalny</li>
                    <li>Kulturystyka i żywienie</li>
                </ul>
            </div>
            <div class="row top-buffer">
                <p style="font-weight: bold;">Do tej pory udało mi się: </p>
                <ul>
                    <li>Zdobyć 4 lata doświadczenia oraz wiedzy</li>
                    <li>Pozdawać egzaminy zawodowe (trener)</li>
                    <li>Zaliczyć pozowanie z Mistrzynią Polski - Małgorzatą Flis</li>
                </ul>
            </div>
        </div>
        <script>
            var image = document.images[0];
            var downloadingImage = new Image();
            downloadingImage.onload = function() {
                image.classList.add( "img-responsive", "img-thumbnail", "main");
                image.classList.remove("wait");
                image.src = this.src;   
            };
            downloadingImage.src = "<?php echo base_url(); ?>uploads/session.jpg";
            // Google Analytics
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            
            ga('create', 'UA-106391342-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>	