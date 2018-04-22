<!DOCTYPE HTML>
<html>
  <head>
    <title>FitFemme</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/responsive.css">
    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>js/custom.js"></script>
    <!-- Emoticons -->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .btn {
        width: 100%;
      }
      
      .btn-default {
        border-width: 2px 0px 2px 2px;
      }
      
      #main-menu, .group {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      
      form.search-form {
        margin-top: 10px;
      }
      
      form.search-form input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid white;
        float: left;
        width: 80%;
        background: transparent;
        color: white !important;
      }
      
      form.search-form input[type=text] {
        color: white !important;
      }

      form.search-form button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #EA2A9C;
        color: white;
        font-size: 17px;
        border: 1px solid #EA2A9C;
        border-left: none;
        cursor: pointer;
      }
      
      form.search-form button:hover {
        background: #bb217c;
        border: 1px solid #bb217c;
      }
      
      form.search-form::after {
        content: "";
        clear: both;
        display: table;
      }
    </style>
    <script>
      window.addEventListener("load", function() {
        document.getElementById("instaFollow").addEventListener("click", function() {
          window.open("https://www.instagram.com/fitfemme_19/", "_blank");
        })
      })
      
      // When the user mouseover on div, open the popup
      function popup(self) {
         self.classList.add("show");
         setTimeout(function() {
           self.classList.remove("show"); 
         }, 3000);
      }
      
      /*$("#seach-form").submit(function(e) {
        var url = "http://fitfemme.pl/blog/search";
        $.ajax({
          type: "POST",
          url: url,
          data: $("#search-form").serialize(), // serializes the form's elements.
          success: function(data) {
             alert(data);
          }
        });
        e.preventDefault();
      });*/
    </script>
  </head>
  <body>
    <div class="modal"></div>
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
            <li class="active"><a href="<?php echo base_url(); ?>blog">Strona główna</a></li>
            <li><a href="<?php echo base_url(); ?>blog/metamorphoses" class="navbar-link">Metamorfozy</a></li>
            <li><a href="<?php echo base_url(); ?>blog/about" class="navbar-link">O mnie</a></li>
            <li><a href="<?php echo base_url(); ?>blog/cooperation" class="navbar-link">Współpraca</a></li>
            <li><a href="<?php echo base_url(); ?>blog/contact" class="navbar-link">Kontakt</a></li>
        </div>
      </div>
    </nav>
    <div id="section-banner"></div>
    <div class="btn-group btn-group-justified container" id="main-menu" aria-label="...">
      <div class="col-md-2 col-xs-6 group">
        <button type="button" class="btn btn-group btn-default">DIETA</button>
      </div>
      <div class="col-md-2 col-xs-6 group">
        <button type="button" class="btn btn-group btn-default">TRENING</button>
      </div>
      <div class="col-md-4 col-xs-12 group" >
        <button type="button" class="btn btn-group btn-default">CIEKAWOSTKI</button>
      </div>
      <div class="col-md-2 col-xs-6 group">
        <button type="button" class="btn btn-group btn-default">MOTYWACJA</button>
      </div>
      <div class="col-md-2 col-xs-6 group">
        <button type="button" class="btn btn-group btn-default">ORGANIZACJA</button>
      </div>
    </div>
    <div id="arrow">
      <img src="http://fitfemme.pl/uploads/arrow.png" alt="Arrow" >
    </div>
    <div class="container">
      <form id="search-form" class="search-form" method="post" action="<?php echo site_url('blog/searcher');?>">
        <input type="text" placeholder="Search..." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="container">
      <div class="col-md-3" id="subcategories"></div>
      <div id="posts" class="col-md-12 col-xs-12">
        <?php
          $controller->create_sections($list, $view);
        ?>
      </div>
    </div>
    <section id="section-instagram">
      <div class="container">
        <div class="row object">
          <div class='col-md-4'>
            <hr />
          </div>
          <div class='col-md-4 col-xs-12 text-center'>
            <hr /><p class='h2' style='color: white; font-style: italic; font-weight: bold;'>INSTAGRAM</p><hr />
          </div>
          <div class='col-md-4'>
            <hr />
          </div>
        </div>
        <div id="instagram"></div>
        <script type="text/javascript">
        	var token = '3438580790.1677ed0.b7fb95dc503e481a86d190fc22ea3878',
    			num_photos = 6;
    			 
    			$.ajax({
    			  url: 'https://api.instagram.com/v1/users/self/media/recent',
    			  dataType: 'jsonp',
    			  type: 'GET',
    			  data: { access_token: token, count: num_photos },
    			  success: function(data){
    			    for (x in data.data) {
                var post = $("<div>");
                $(post).html('<div class="col-md-4 instafeed"><img style="cursor: pointer;" src="' + data.data[x].images.low_resolution.url + '" /></div>');
                $(post).attr("data-link", data.data[x].link);
                $(post).mousedown(function() {
                  window.open($(this).attr("data-link"), "_blank");
                });
                $("#instagram").append(post);
    			    }
    			  },
    			  error: function(data){
    			    console.log(data);
    			  }
    			});
    	  </script> 
        <div class="row text-center">
          <button id="instaFollow">Obserwuj mnie!</button>
        </div>
      </div>
    </section>
    <section id="section-footer">
      <div class="container">
        <div class="row">
          <p class="h3 text-center" style="font-style: italic; font-weight: bold;">Bądź na bieżąco!</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-xs-4 text-center popup" onmouseover="popup(this.children[0].children[1])">
            <a href="https://www.instagram.com/fitfemme_19/"><img src="<?php echo base_url(); ?>uploads/instagram.png" class="icon" alt="Instagram" /><span class="popuptext popuptext-top">Instagram</span></a>
          </div>
          <div class="col-md-4 col-xs-4 text-center popup" onmouseover="popup(this.children[0].children[1])">
            <a href="http://snapy.pl/post/156487267534/nazwa-snapchata-aniesss19"><img src="<?php echo base_url(); ?>uploads/snapchat.png" class="icon" alt="Snapchat" /><span class="popuptext popuptext-top">Snapchat</span></a>
          </div>
          <div class="col-md-4 col-xs-4 text-center popup" onmouseover="popup(this.children[0].children[1])">
            <a href="https://www.facebook.com/FitFemme-589463464774513/"><img src="<?php echo base_url(); ?>uploads/facebook.png" class="icon" alt="Facebook" /><span class="popuptext popuptext-top">Facebook</span></a>
          </div>
          <div class="col-md-4 col-md-offset-2 col-xs-4 col-xs-offset-2 text-center popup" onmouseover="popup(this.children[0].children[1])">
            <a href="https://ask.fm/FitFemme"><img src="<?php echo base_url(); ?>uploads/ask.png" class="icon" alt="Ask" /><span class="popuptext popuptext-bottom">Ask</span></a>
          </div>
          <div class="col-md-4 col-xs-4 text-center popup" onmouseover="popup(this.children[0].children[1])">
            <a href="https://www.youtube.com/channel/UCWuEp6zk6eoZcmH02TOaHWw"><img src="<?php echo base_url(); ?>uploads/youtube.png" class="icon" alt="YouTube" /><span class="popuptext popuptext-bottom">YouTube</span></a>
          </div>
        </div>
      </div>
    </section>
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
