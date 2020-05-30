$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    $("#filtros").click(function () {
        if($(this).next().css('display') == 'none'){
            $(this).children('span').empty();
            $(this).children('span').text('+');
        } else {
            $(this).children('span').empty();
            $(this).children('span').text('-');
        }

        $(this).next().toggle();
    });

    $('#btFiltrar').click(function () {
        var html= '';

        let nome= $('#fname').val();
        let dataNascimento= $('#fdate').val();
        let sexo= $('#fsexo option:selected').val();
        let cpf= $('#fcpf').val();
        let telefone= $('#ftelefone').val();
        let email= $('#femail').val();

        alert(cpf);

        const formData = new FormData();
        formData.append("name", nome);
        formData.append("birth_date", dataNascimento);
        formData.append("gender", sexo);
        formData.append("cpf", cpf);
        formData.append("phone", telefone);
        formData.append("email", email);

        axios.post(urlBase+'/api/filtrar', formData, {
            headers: {
                'Authorization': 'Bearer '+token
            }
        })
            .then(function (response) {
                console.log(response);
                $.map(response.data, function(item, key){
                    html += "<tr><td>"+item.name+"</td><td>"+item.birth_date+"</td><td>"+item.gender+"</td><td>"+item.cpf+"</td><td>"+item.phone+"</td><td>"+item.email+"</td><td>&nbsp;</td></tr>";
                });
                console.log(html);
                $("#tableVisuzalizar").html(html);
            })
            .catch(function (error) {
                console.log(error);
            });

        $('#modal-visualizar').show('slow');
    });

    $('#btVisualizar').click(function () {
        var html= '';

        axios.get(urlBase+'/api/visualizar', {
            headers: {
                'Authorization': 'Bearer '+token
            }
        })
            .then(function (response) {
                console.log(response);
                $.map(response.data, function(item, key){
                    html += "<tr><td>"+item.name+"</td><td>"+item.birth_date+"</td><td>"+item.gender+"</td><td>"+item.cpf+"</td><td>"+item.phone+"</td><td>"+item.email+"</td><td>&nbsp;</td></tr>";
                });
                console.log(html);
                $("#tableVisuzalizar").html(html);
            })
            .catch(function (error) {
                console.log(error);
            });

        $('#modal-visualizar').show('slow');
    });
});
