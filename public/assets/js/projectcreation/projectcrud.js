var data = {_token: '{{csrf_token()}}'};
var currentBegeleider = -1;

$(document).ready(function () {
    currentBegeleider = $('#begeleider').val();
    getEmployees();
});

$('#bedrijf').change(function (e) {
    getEmployees();
});

function getEmployees() {
    $('#begeleider').empty().append('<option></option>');
    var company = $("#bedrijf").val();
    if (company) {
        //fetch employees from server
        $.ajax({
            type: "GET",
            url: '/employees/' + company,
            data: data,
            success: function (data) {
                $.each(data.msg, function (index, value) {
                    if(currentBegeleider != null && parseInt(value.id) === parseInt(currentBegeleider)){
                        $('#begeleider').append('<option value="' + value.id + '" selected >' + value.achternaam + ", " + value.voornaam + " " + value.tussenvoegsel + '</option>');
                    }
                    else{
                        $('#begeleider').append('<option value="' + value.id + '">' + value.achternaam + ", " + value.voornaam + " " + value.tussenvoegsel + '</option>');
                    }
                });
            },
            error: function (xhr, status, error) {
                alert('error: '+ xhr.responseText);
            }
        });
    }
}