var hasOptions = false;
$("#herhaal").on('change', function(){
    if(!hasOptions){
        $( "#moreOptions" ).append("<div class=\"form-group\">\n" +
            "                                    <div class=\"col-lg-12\">\n" +
            "                                        <div class=\"form-material\">\n" +
            "                                            <div class=\"input-daterange input-group input-group-sm\"\n" +
            "                                                 data-date-format=\"yyyy-mm-dd\">\n" +
            "                                                <input autocomplete=\"false\" class=\"form-control\" type=\"text\"\n" +
            "                                                       id=\"example-daterange1\"\n" +
            "                                                       name=\"startdatum\"\n" +
            "                                                       placeholder=\"Startdatum\" required>\n" +
            "                                                <span class=\"input-group-addon\"><i\n" +
            "                                                            class=\"fa fa-chevron-right\"></i></span>\n" +
            "                                                <input autocomplete=\"false\" class=\"form-control\" type=\"text\"\n" +
            "                                                       id=\"example-daterange2\" name=\"einddatum\"\n" +
            "                                                       placeholder=\"Einddatum\" required>\n" +
            "                                            </div>\n" +
            "                                            <label for=\"example-daterange1\">Geef een tijdspanne aan voor herhalende\n" +
            "                                                slots</label>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                </div>");
        App.initHelpers(['datepicker']);

        hasOptions = true;
    }
    else{
        $("#moreOptions").empty();
        hasOptions = false;
    }
});


