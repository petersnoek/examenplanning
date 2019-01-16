var data = {_token: '{{csrf_token()}}'};

$(document).ready(function () {
    getEmployees();
});

$('#bedrijf').change(function (e) {
    $('#begeleider').empty().append('<option></option>');
    getEmployees();
});

function getEmployees() {
    var company = $("#bedrijf").val();
    if (company) {
        //fetch employees from server
        $.ajax({
            type: "GET",
            url: '/employees/' + company,
            data: data,
            success: function (data) {
                $.each(data.msg, function (index, value) {
                    if(currentBegeleider > -1 && parseInt(value.id) === currentBegeleider){
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