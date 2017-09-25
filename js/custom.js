$(document).ready(function () {
    // Variables
    $body = $("body");
    var delay, category, loaded, subcategory;
    
    // Download posts based on category
    function download(title) {
        $.ajax({
            type: "POST",
            url: "http://fitfemme.pl/blog/category",
            data: {
    			category : title
    		},
    		success: function(json) {
                $.get("/mockjax");
    			var posts = JSON.parse(json);
                if (posts.length > 0) {
    			    $("#posts").empty();
    			    for(var i = 0; i < posts.length; i++) {
                        var dateParts = posts[i].Date.split("-");
                        var date = dateParts[2] + "." + dateParts[1] + "." + dateParts[0];
                        var post = $("<div>");
                        $(post).html("<figure><div class='thumbnail'><img class='img' src='" + posts[i].Cover + "' /></div><figcaption class='figcaption'><h4 class='text-center names'>" + posts[i].Title + "</h4><h6 class='text-center'>Data dodania: " +  date + "</h6></figcaption></figure>");
                        $(post).addClass("col-md-6 col-xs-12 range center-block")
                        $(post).attr("data-link", "http://fitfemme.pl/blog/posts/" + date)
                        $(post).mousedown(function(e) {
                            switch(e.which) {
                                case 1:
                                    // Left
                                    window.open($(this).attr("data-link"), "_self");
                                    break;
                                case 2:
                                    // Middle
                                    window.open($(this).attr("data-link"), "_blank");
                                    break;
                                case 3:
                                    // Right
                                    break;
                            }
                            return true;    // to allow the browser to know that we handled it.
                        });
                        $("#posts").append(post);
    			    }
                    $("#posts").css("visibility", "visible");
                }
    		},
    		error: function(jqXHR, errorText, errorThrown) {
    			console.log(errorText);
    		}
    	});
    	loaded = title;
    }
    
    function change() {
        $("#subcategories").css("display", "none");
        $("#posts").removeAttr("class");
        $("#posts").attr("class", "col-md-12");
    }
    
    function init(category) {
        if (category != "MOTYWACJA") {
            $("#subcategories").css("display", "block");
            $("#posts").removeAttr("class");
            $("#posts").attr("class", "col-md-9");
        }
        else {
            change();
        }
        switch(category) {
            case "DIETA":
                $("#subcategories").html("<ul class='list-group'><li class='list-group-item'>Śniadania / kolacje</li><li class='list-group-item'>Obiady</li><li class='list-group-item'>Desery</li><li class='list-group-item'>Wszystkie</li></ul>");
                break;
            case "TRENING":
                $("#subcategories").html("<ul class='list-group'><li class='list-group-item'>Jak ćwiczyć?</li><li class='list-group-item'>Rozgrzewka</li><li class='list-group-item'>Całe ciało</li><li class='list-group-item'>Ramiona</li><li class='list-group-item'>Plecy</li><li class='list-group-item'>Brzuch</li><li class='list-group-item'>Pośladki</li><li class='list-group-item'>Interwały</li><li class='list-group-item'>Rozciąganie</li><li class='list-group-item'>Wyzwania</li><li class='list-group-item'>Wszystkie</li></ul>");
                break;
            case "CIEKAWOSTKI":
                $("#subcategories").html("<ul class='list-group'><li class='list-group-item'>Żywieniowe</li><li class='list-group-item'>Treningowe</li><li class='list-group-item'>O mnie</li><li class='list-group-item'>Ogólne</li><li class='list-group-item'>Wszystkie</li></ul>");
                break;
            case "MOTYWACJA":
                download("MOTYWACJA");
                break;
        }
    }
    
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    }
    
    var getScroll = function() {
        if (window.pageYOffset!= undefined) {
          return pageYOffset;
        }
        else {
            var sx, sy, d = document, r = d.documentElement, b = d.body;
            sx = r.scrollLeft || b.scrollLeft || 0;
            sy = r.scrollTop || b.scrollTop || 0;
            return sy;
        }
    }
    
    // Events
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
    
    $("button").hover(function() {
        var that = this;
        delay = setTimeout(function() {
            if (loaded != $(that).text()) {
                category = $(that).text();
                $("button").removeClass("checked");
                $(that).addClass("checked");
                init(category);
            }
            $("#subcategories li").click(function() {
                if (subcategory != $(this).text()) {
                    subcategory = $(this).text();
                    if (subcategory == "Wszystkie") {
                        window.location.reload(); 
                    }
                    else {
                        download(subcategory);
                        change();
                    }
                }
            });
        }, 500);
        }, function() {
            clearTimeout(delay);
    });
    $("#subcategories").mouseleave(function() {
        $("button").removeClass("checked");
        change();
    });
    $(".range").mousedown(function(e) {
        switch(e.which) {
            case 1:
                // Left
                window.open($(this).attr("data-link"), "_self");
                break;
            case 2:
                // Middle
                window.open($(this).attr("data-link"), "_blank");
                break;
            case 3:
                // Right
                break;
        }
        return true;    // to allow the browser to know that we handled it.
    });
                
    if (isMobile.any()) {
        
    }
    else {
        // Go to up
        if (getScroll() < document.getElementById("section-banner").clientHeight) {
            document.getElementById("arrow").style.display = "none" 
        }
        window.addEventListener("scroll", function() {
            if (getScroll() < document.getElementById("section-banner").clientHeight) {
                document.getElementById("arrow").style.display = "none"
            }
            else {
                document.getElementById("arrow").style.display = "block"
            }
        })
    }

    window.addEventListener("scroll", function() {
        var position = $('#subcategories').position();
        if (getScroll() > parseInt(position.top) + parseInt($('#subcategories').height())) {
            change();
            $("button").removeClass("checked");
            $("button").each(function() {
                if ($(this).text() == loaded)
                    $(this).addClass("checked");
            });
        }
    })
    $("#arrow").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    })
    
    $("#contactForm").submit(function(e) {
        $.ajax({
            type: "POST",
            url: 'http://fitfemme.pl/kontakt.php',
            data: { name: $("#name").val(), email: $("#email").val(), message: $("#message").val() },
            success: function(data) {
               switch(data) {
                    case "Wiadomość wysłana!":
                       $("input, textarea").val("");
                       $(".alert-danger").css("display", "none");
                        alert(data);
                       break;
                    case "Nieprawidłowa domena!":
                        $(".alert-danger").css("display", "block");
                        break;
               }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
        e.preventDefault();
    });
})