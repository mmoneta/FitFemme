<!DOCTYPE HTML>
<html>
    <head>
        <title>Google+</title>
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
        <!-- Google+ -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="751837397621-pike00r9hpe05mo7popnsh1b4mncchsq.apps.googleusercontent.com">
        <script type="text/javascript">
            var profile;
            
            function onSignIn(googleUser) {
    		    profile = googleUser.getBasicProfile();
                $("#main").empty();
                $("#sign-in").css("visibility", "hidden");
                $("#sign-out").css("visibility", "visible");
                $("#add-comment").css("visibility", "visible");
                $("#main").append("<img src='" + profile.getImageUrl() + "' class='top-buffer' alt='Photo of profile' />");
                $("#main").append("<p class='top-buffer' style='font-weight: bold; text-indent: 0em !important;'>" + profile.getName() + "</p>");
    		}
    		
    		function clear() {
    		    localStorage.removeItem("ID");
                localStorage.removeItem("Type");
                localStorage.removeItem("Comment");
    		}
    		
			$(document).ready(function() {
			    $("#add-comment").click(function () {
    			    $.ajax({
                        type: "POST",
                        url: 'http://fitfemme.pl/blog/responses',
                        data: { ID: localStorage.getItem("ID"), type: localStorage.getItem("Type"), option: 'google', name: profile.getGivenName(), surname: profile.getFamilyName(), image: profile.getImageUrl(), email: profile.getEmail(), comment: localStorage.getItem("Comment") },
                        success: function(data) {
                            clear();
                            window.close();
                        }, 
                        error: function (request, status, error) {
                            alert(request.responseText);
                        }
                    })
			    })
                
                $(window).bind("beforeunload", function() {
                    clear();
                })
			})
        </script>
        <style>
            body {
                width: 100vw;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            img {
                border-radius: 50% !important;
            }
        </style>
    </head>
    <body>
        <div>
            <div id="main" class="text-center"></div>
            <div id="sign-in" class="g-signin2 top-buffer" data-onsuccess="onSignIn"></div>
            <a class="text-center center-block top-buffer" style="visibility: hidden;" id="sign-out" onclick="signOut();">Sign out</a>
            <script>
                function signOut() {
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function() {
                        $("#main").empty();
                        $("#sign-in").css("visibility", "visible");
                        $("#sign-out").css("visibility", "hidden");
                        $("#add-comment").css("visibility", "hidden");
                    });
                }
            </script>
            <a class="text-center center-block top-buffer" style="visibility: hidden;" id="add-comment">Add comment!</a>
        </div>
    </body>
</html>