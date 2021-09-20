/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
        "use strict";

        // Add active state to sidbar nav links
        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
            $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
                if (this.href === path) {
                    $(this).addClass("active");
                }
            });

        // Toggle the side navigation
        $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("body").toggleClass("sb-sidenav-toggled");
        });

        $("#BtndeleteFilm").on("click", function(e) {
            $(this).html("<i class='fas fa-spinner fa-spin'></i>");
            $("#formDeleteFilm").submit();
        });

        $(".deleteFilm").on("click", function(e) {
            $("#id_film_to_delete").val($(this).data("id_film"));
        });

        $(".deleteCategorie").on("click", function(e) {
            $("#id_categorie_to_delete").val($(this).data("id_categorie"));
        });

        $(".deleteMembre").on("click", function(e) {
            $("#id_membre_to_delete").val($(this).data("id_membre"));
        });

        $(".deleteNewsletter").on("click", function(e) {
            $("#id_newsletter_to_delete").val($(this).data("id_newsletter"));
        });

        
    })(jQuery);
