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

    $(".voltarEditar").click(function(){
        $(this).parent().parent().hide('slow');
        var html= '';

        axios.get(urlBase+'/api/visualizar', {
            headers: {
                'Authorization': 'Bearer '+token
            }
        })
        .then(function (response) {
            console.log(response);
            $.map(response.data, function(item, key){
                let exclui= 'exclui-'+key;

                html += "<tr><td>"+item.name+"</td><td>"+item.birth_date+"</td><td>"+item.gender+"</td><td>"+item.cpf+"</td><td>"+item.phone+"</td><td>"+item.email+"</td>" +
                    "<td>" +
                    "<button onclick='abreJanelaAlterar("+item.idperson+");'>Alterar</button>&nbsp;&nbsp;" +
                    "<button onclick='excluiPessoa("+item.idperson+", "+key+");' class='"+exclui+"'>Exluir</button>" +
                    "</td></tr>";
            });
            $("#tableVisuzalizar").empty();
            $("#tableVisuzalizar").html(html);
        })
        .catch(function (error) {
            console.log(error);
        });
    });

    $('#btFiltrar').click(function () {
        var html= '';

        let nome= $('#fname').val();
        let dataNascimento= $('#fdate').val();
        let sexo= $('#fsexo option:selected').val();
        let cpf= $('#fcpf').val();
        let telefone= $('#ftelefone').val();
        let email= $('#femail').val();

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
                    let exclui= 'exclui-'+key;

                    html += "<tr><td>"+item.name+"</td><td>"+item.birth_date+"</td><td>"+item.gender+"</td><td>"+item.cpf+"</td><td>"+item.phone+"</td><td>"+item.email+"</td>" +
                        "<td>" +
                        "<button onclick='abreJanelaAlterar("+item.idperson+");'>Alterar</button>&nbsp;&nbsp;" +
                        "<button onclick='excluiPessoa("+item.idperson+", "+key+");' class='"+exclui+"'>Exluir</button>" +
                        "</td></tr>";
                });
                console.log(html);
                $("#tableVisuzalizar").html(html);
            })
            .catch(function (error) {
                console.log(error);
            });

        $('#modal-visualizar').show('slow');
    });

    $('#btEditar').click(function () {
        let nome= $('#ename').val();
        let dataNascimento= $('#edate').val();
        let sexo= $('#esexo option:selected').val();
        let cpf= $('#ecpf').val();
        let telefone= $('#etelefone').val();
        let email= $('#eemail').val();
        let idperson= $('#eidperson').val();

        if(nome == ''){
            M.toast({html: 'Favor, preencha o campo nome.'});
        } else if(cpf == ''){
            M.toast({html: 'Favor, preencha o campo CPF.'});
        } else {
            const formData = new FormData();
            formData.append("name", nome);
            formData.append("birth_date", dataNascimento);
            formData.append("gender", sexo);
            formData.append("cpf", cpf);
            formData.append("phone", telefone);
            formData.append("email", email);
            formData.append("idperson", idperson);

            axios.post(urlBase+'/api/editar', formData, {
                headers: {
                    'Authorization': 'Bearer '+token
                }
            })
                .then(function (response) {
                    if(response.status == 201) {
                        M.toast({html: response.data.msg});
                    } else if(response.status == 200){
                        M.toast({html: response.data.msg});
                        $('#formCadastro').each(function(){
                            this.reset();
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        return false;
    });
});

function abreJanelaAlterar(id){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    const formData= new FormData();
    formData.append("idperson",id);

    axios.get(urlBase+'/api/visualizar', {
        headers: {
            'Authorization': 'Bearer '+token
        }
    })
        .then(function (response) {
            $("#ename").val(response.data[0].name);
            $("#edate").val(response.data[0].birth_date);
            $("#esexo").val(response.data[0].gender);
            $("#ecpf").val(response.data[0].cpf);
            $("#etelefone").val(response.data[0].phone);
            $("#eemail").val(response.data[0].email);
            $("#eidperson").val(response.data[0].idperson);
            console.log(response.data[0]);
        })
        .catch(function (error) {
            console.log(error);
        });

    $("#modal-Editar").fadeIn();
}

function excluiPessoa(id, exclui){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    if(confirm("você tem certeza que deseja excluir esta pessoa?")) {
        let classe= 'exclui-'+exclui;
        $('.'+classe).parent().parent().hide('slow');

        const formData= new FormData();
        formData.append("idperson",id);

        axios.post(urlBase + '/api/excluir', formData, {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
            .then(function (response) {
                M.toast({html: response.data.msg});
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}
