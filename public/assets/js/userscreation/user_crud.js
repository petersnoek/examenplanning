var data = {_token: '{{csrf_token()}}'};

$( document ).ready(function() {
    emptyAdditionalcontent();
        if($('#example-inline-radio3').is(':checked')) {
            showKwalificatiedossier();
            // showBedrijven();
            showProjects();
        }
        if($('#example-inline-radio4').is(':checked')) {
            showBedrijven();
            showBedrijfsrol();
        }
});

$("#example-inline-radio4").change(function () {
    emptyAdditionalcontent();
    showBedrijven();
    showBedrijfsrol();
});

$("#example-inline-radio3").change(function () {
    emptyAdditionalcontent();
    showKwalificatiedossier();
    // showBedrijven();
    showProjects();
});

function showKwalificatiedossier(){
    $.ajax({
        type: "GET",
        url: '/kwalificatiedossier/all',
        data: data,
        success: function (data) {
            appendKwalificatiedossier();
            App.initHelpers(['select2']);
            $.each(data.msg, function (index, value) {
                $('#kwalificatiedossier').append('<option value="' + value.id + '">' + value.crebo + '</option>');
            });
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function showBedrijven(){
    $.ajax({
        type: "GET",
        url: '/companies/all',
        data: data,
        success: function (data) {
            appendCompanies();
            App.initHelpers(['select2']);
            $.each(data.msg, function (index, value) {
                $('#companies').append('<option value="' + value.id + '">' + value.naam + '</option>');
            });
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function showProjects(){
    $.ajax({
        type: "GET",
        url: '/projects/all',
        data: data,
        success: function (data) {
            appendProjects();
            App.initHelpers(['select2']);
            $.each(data.msg, function (index, value) {
                $('#projects').append('<option value="' + value.id + '">' + value.company.naam + ' | ' + value.naam + '</option>');
            });
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function showBedrijfsrol(){
    $.ajax({
        type: "GET",
        url: '/companies/all',
        data: data,
        success: function (data) {
            appendBedrijfsrol();
            App.initHelpers(['select2']);
            $.each(data.msg, function (index, value) {
                $('#companies').append('<option value="' + value.id + '">' + value.naam + '</option>');
            });
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}


function appendCompanies(){
    $('.additional_content').append('<div class="form-material">\n' +
        '                                        <select class="js-select2 form-control select2-hidden-accessible"\n' +
        '                                                id="companies" name="bedrijf" style="width: 100%;"\n' +
        '                                                data-placeholder="Kies een bedrijf..." tabindex="-1"\n' +
        '                                                aria-hidden="true" required>\n' +
        '                                            <option></option>\n' +
        '                                        </select>\n' +
        '                                        <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus"\n' +
        '                                              dir="ltr" style="width: 100%;">\n' +
        '                                                <span class="selection">\n' +
        '\n' +
        '                                                </span>\n' +
        '                                            <span class="dropdown-wrapper" aria-hidden="true"></span>\n' +
        '                                        </span>\n' +
        '                                        <label for="example2-select2">Kies een bedrijf</label>\n' +
        '                                    </div>');
}

function appendBedrijfsrol(){
    $('.additional_content_2').append('<div class="col-lg-12 col-xs-12">\n' +
        '                                    <div class="form-material input-group">\n' +
        '                                        <input class="form-control"\n' +
        '                                               type="text" id="rol" name="rol"\n' +
        '                                               placeholder="Vul je rol in..."\n' +
        '                                               autofocus required>\n' +
        '                                        <label for="rol">Rol binnen bedrijf</label>\n' +
        '                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>\n' +
        '                                    </div>\n' +
        '                                </div>');
}

function appendKwalificatiedossier(){
    $('.additional_content').append('<div class="form-material">\n' +
        '                                        <select class="js-select2 form-control select2-hidden-accessible"\n' +
        '                                                id="kwalificatiedossier" name="kwalificatiedossier" style="width: 100%;"\n' +
        '                                                data-placeholder="Kies een kwalificatiedossier..." tabindex="-1"\n' +
        '                                                aria-hidden="true" required>\n' +
        '                                            <option></option>\n' +
        '                                        </select>\n' +
        '                                        <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus"\n' +
        '                                              dir="ltr" style="width: 100%;">\n' +
        '                                                <span class="selection">\n' +
        '\n' +
        '                                                </span>\n' +
        '                                            <span class="dropdown-wrapper" aria-hidden="true"></span>\n' +
        '                                        </span>\n' +
        '                                        <label for="example2-select2">Kies een kwalificatiedossier</label>\n' +
        '                                    </div>');
}

function appendProjects(){
    $('.additional_content').append('<div class="form-material">\n' +
        '                                        <select class="js-select2 form-control select2-hidden-accessible"\n' +
        '                                                id="projects" name="project" style="width: 100%;"\n' +
        '                                                data-placeholder="Kies een project..." tabindex="-1"\n' +
        '                                                aria-hidden="true" required>\n' +
        '                                            <option></option>\n' +
        '                                        </select>\n' +
        '                                        <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus"\n' +
        '                                              dir="ltr" style="width: 100%;">\n' +
        '                                                <span class="selection">\n' +
        '\n' +
        '                                                </span>\n' +
        '                                            <span class="dropdown-wrapper" aria-hidden="true"></span>\n' +
        '                                        </span>\n' +
        '                                        <label for="example2-select2">Kies een project</label>\n' +
        '                                    </div>');
}

$('.other_radio').click(function () {
    emptyAdditionalcontent();
});
function emptyAdditionalcontent(){
    $('.additional_content').empty();
    $('.additional_content_2').empty();
}