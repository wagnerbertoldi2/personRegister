$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    $("#btAbreCadastro").click(function(){
        $('#modal-cadastro').show('slow');
    });

    $('#btCadastro').click(function () {
        let nome= $('#name').val();
        let dataNascimento= $('#date').val();
        let sexo= $('#sexo option:selected').val();
        let cpf= $('#cpf').val();
        let telefone= $('#telefone').val();
        let email= $('#email').val();

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

            axios.post(urlBase+'/api/cadastro', formData, {
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
