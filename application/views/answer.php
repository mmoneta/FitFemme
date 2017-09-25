<!DOCTYPE HTML>
<html>
    <head>
        <title>Odpowiedz na komentarz</title>
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
        <!-- TinyMCE -->
        <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>portfolio/css/font-awesome.min.css">
        <!-- Emoticons -->
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <script>
            // TinyMCE
            function tiny() {
            	tinymce.init({
            		selector: 'textarea',
            		inline: false,
            		theme_advanced_resizing: true,
            		theme_advanced_resizing_use_cookie: false,
            		plugins: ['autoresize', 'fullscreen', 'link', 'help', 'wordcount', 'lists'],
            		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent' | "fullscreen" | "link" | "help" | "numlist bullist",
            		menubar: true,
            		autoresize_max_height: 250,
            		autosave_interval: "5s",
            		setup: function(ed) {
                        ed.on('paste undo redo change keypress keydown', function(e) {
                            if (ed.getContent().length > 10) {
                                $(':button[type="submit"]').removeClass("disabled").attr("rel", null);
                            }
                            else {
								$(':button[type="submit"]').addClass("disabled").attr("rel", "tooltip");
                            }
                        });
                    }
            	});
            }
            function clear() {
                localStorage.removeItem("ID");
                localStorage.removeItem("Type");
            }
			$(document).ready(function() {
			    var authorized = "NO";
				tiny();
				$('body').tooltip({
					selector: '[rel="tooltip"]'
				});
				$("#main").submit(function(e) {
				    var selected = $(this).find('option:selected').attr("value");
				    switch(selected) {
				        case 'anonim':
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>blog/responses',
                                data: { ID: localStorage.getItem("ID"), type: localStorage.getItem("Type"), option: selected, comment: tinymce.get('comment').getContent() },
                                success: function(data) {
                                    clear();
                                    window.close();
                                }, 
                                error: function (request, status, error) {
                                    alert(request.responseText);
                                }
                            });
                            break;
                        case 'google':
                            localStorage.setItem("Comment", tinymce.get('comment').getContent());
                            authorized = "YES";
                            window.location.href = "<?php echo base_url(); ?>blog/authorized";
                            break;
				    }
				    e.preventDefault();
                });
                
                $(window).bind("beforeunload", function() { 
                    if (authorized == "NO")
                        clear();
                })
			})
        </script>
    </head>
    <body>
        <div class="container">
            <form id="main">
                <div class="row">
                    <p class="h5" style="text-indent: 0;">Skomentuj jako: 
                        <select name="option" style="color: black;">
                            <option value="google" style="color: black;">Google+</option>
                            <option value="anonim" style="color: black;">Anonimowy</option>
                        </select>
                    </p>
                </div>
                <div class="row">
                    <div class="row control-group">
                        <div class="form-group col-md-12 col-xs-12 floating-label-form-group controls">
                            <textarea rows="10" style="resize: vertical;" class="form-control" placeholder="Komentarz" name="comment" id="comment"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-4 col-sm-offset-4">
                            <button type="submit" class="btn btn-default btn-block disabled" rel="tooltip" data-title="Komentarz musi si&#281; sk&#322;ada&#263; z conajmniej 10 znaków!">Opublikuj</button>
                        </div>
                    </div>
                </div>
            </form>
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