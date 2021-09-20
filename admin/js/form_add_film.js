(function($) {
    $("document").ready(function(){
        $('#duree').slider({
            formatter: function(num) {
                let hours = Math.floor(num / 60);
                let minutes = num % 60 + "";
                minutes = minutes.padStart(2, "0");
                let valueToReturn = hours + "h:" + minutes+"m";
                $("#labelDureeFilm").html(valueToReturn)
                return valueToReturn;
            }
        });

        $('#date').datepicker({
            weekStart: 0,
            clearBtn: true,
            language: "fr",
            orientation: "bottom auto",
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    });
})(jQuery);