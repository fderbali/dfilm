; (function ($) {
    $.dfilm = {
        settings: {
            min_annee: 1900,
            max_annee: 2100,
            prix_max: 1000,
            score_min: 0,
            duree_max: 9 * 60,
            checked_categories: []
        },
        init: function (settings) {
            // Année de sortie
            $('#refine_year').slider({}).on('slideStop', function () {
                let limits = this.value.split(",");
                $.dfilm.settings.min_annee = limits[0];
                $.dfilm.settings.max_annee = limits[1];
                $.dfilm.refine();
            });
            // Prix
            $('#refine_prix').slider({
                formatter: function (num) {
                    return num + ' $';
                }
            }).on('slideStop', function () {
                $.dfilm.settings.prix_max = this.value;
                $.dfilm.refine();
            });
            // Score
            $('#refine_score').slider({
            }).on('slideStop', function () {
                $.dfilm.settings.score_min = this.value;
                $.dfilm.refine();
            });
            // Durée
            $('#refine_duree').slider({
                formatter: function (num) {
                    let hours = Math.floor(num / 60);
                    let minutes = num % 60 + "";
                    minutes = minutes.padStart(2, "0");
                    let valueToReturn = hours + "h:" + minutes + "m";
                    $("#labelDureeFilm").html(valueToReturn)
                    return valueToReturn;
                },
                tooltip_position: 'bottom'
            }).on('slideStop', function () {
                $.dfilm.settings.duree_max = parseInt(this.value);
                $.dfilm.refine();
            });
            // Catégories
            $('.refine_categories').change(function () {
                $.dfilm.settings.checked_categories = [];
                $('.refine_categories:checked').each(function (i, element) {
                    $.dfilm.settings.checked_categories.push(element.value);
                });
                $.dfilm.refine();
            });
            //Check all / uncheck all
            $("#checkAll").change(function () {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
                $('.refine_categories').trigger("change");
            });
            $('.refine_categories').trigger("change");
        },
        refine: function () {
            $.dfilm.hideError();
            let $boxes = $('.film');
            if ($boxes.length == 0) {
                return;
            }
            $boxes.removeClass('discard');
            $.dfilm.refine_annee_sortie();
            $.dfilm.refine_prix();
            $.dfilm.refine_score();
            $.dfilm.refine_duree();
            $.dfilm.refine_categ();
            $.dfilm.AnimateRefine();
            let $visible_boxes = $('.film:visible');
            if ($visible_boxes.length == 0) {
                $.dfilm.showError();
            }
        },
        hideError: function () {
            $("#error_no_avail").hide();
        },
        showError: function () {
            $("#error_no_avail").show();
        },
        AnimateRefine: function () {
            $('.listecatalogue').addClass('overlay').delay(200).queue(function (next) {
                this.classList.remove('overlay');
                next();
            });
        },
        refine_annee_sortie: function () {
            let $boxes = $('.film');
            $boxes.each(function (i, box) {
                // on vérifie si on a pas déjà skippé la box.
                if (box.classList.contains('discard')) {
                    return;
                }
                let year = box.dataset.annee;
                if (year >= $.dfilm.settings.min_annee && year <= $.dfilm.settings.max_annee) {
                    box.classList.remove('discard');
                } else {
                    box.classList.add('discard');
                }
            });
        },
        refine_prix: function () {
            let $boxes = $('.film');
            $boxes.each(function (i, box) {
                // on vérifie si on a pas déjà skippé la box.
                if (box.classList.contains('discard')) {
                    return;
                }
                let prix_film = box.dataset.prix;
                if (prix_film <= $.dfilm.settings.prix_max) {
                    box.classList.remove('discard');
                } else {
                    box.classList.add('discard');
                }
            });
        },
        refine_duree: function () {
            let $boxes = $('.film');
            $boxes.each(function (i, box) {
                // on vérifie si on a pas déjà skippé la box.
                if (box.classList.contains('discard')) {
                    return;
                }
                let duree_film = parseInt(box.dataset.duree);
                if (duree_film <= $.dfilm.settings.duree_max) {
                    box.classList.remove('discard');
                } else {
                    box.classList.add('discard');
                }
            });
        },
        refine_score: function () {
            let $boxes = $('.film');
            $boxes.each(function (i, box) {
                // on vérifie si on a pas déjà skippé la box.
                if (box.classList.contains('discard')) {
                    return;
                }
                let score_film = box.dataset.score;
                if (score_film >= $.dfilm.settings.score_min) {
                    box.classList.remove('discard');
                } else {
                    box.classList.add('discard');
                }
            });
        },
        refine_categ: function () {
            let $boxes = $('.film');
            $boxes.each(function (i, box) {
                // on vérifie si on a pas déjà skippé la box.
                if (box.classList.contains('discard')) {
                    return;
                }
                let current_categs = box.dataset.categories.split(",");
                let filteredArray = $.dfilm.settings.checked_categories.filter(value => current_categs.includes(value));
                if (filteredArray.length > 0) {
                    box.classList.remove('discard');
                } else {
                    box.classList.add('discard');
                }
            });
        }
    }
})(jQuery);
