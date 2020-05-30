<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Person Register</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="css/system.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="overlay"></div>
<div class="bg">
    <div class="container">
        <div class="box-logo">
            <h4 class="txt-logo">Person Register</h4>
        </div>

        <div class="row">
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="btAbreCadastro"><i class="material-icons left">people</i>Cadastro de Pessoa</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="btVisualizar"><i class="material-icons left">attach_money</i>Visualizar Pessoas</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="sair"><i class="material-icons left">close</i>Sair</a>
            </div>
        </div>
    </div>
</div>

<div class="box-modal" id="modal-cadastro">
    <div class="box-back">
        <a href="javascript:void();" class="voltar"><i class="material-icons left">keyboard_arrow_left</i> VOLTAR</a>
    </div>
    <div class="box-topo">
        <div class="box-functions">
            <div class="row">
                <div class="col s12"><i class="material-icons left">people</i><h4>Cadastro de Pessoa</h4></div>
            </div>
        </div>
    </div>
    <div class="box-miolo">
        <form action="#" method="post" id="formCadastro">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" class="validate" required>
                    <label for="name">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input id="date" type="date" class="validate">
                    <label for="date">Data de Nascimento</label>
                </div>
                <div class="input-field col s12">
                    <select name="sexo" id="sexo">
                        <option value="" disabled selected>Escolha uma opção</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    <label>Sexo</label>
                </div>
                <div class="input-field col s12">
                    <input id="cpf" type="text" class="validate cpfMask">
                    <label for="cpf">CPF</label>
                </div>
                <div class="input-field col s12">
                    <input id="telefone" type="text" class="validate telefoneMask">
                    <label for="telefone">Telefone</label>
                </div>
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" required>
                    <label for="email">E-mail</label>
                </div>
                <div class="col s6">
                    <button id="btCadastro" class="waves-effect waves-light btn-large">Cadastrar</button>
                </div>
                <div class="col s6">
                    <button type="reset" class="waves-effect waves-light btn-large">Limpar Formulário</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box-modal" id="modal-visualizar">
    <div class="box-back">
        <a href="javascript:void();" class="voltar"><i class="material-icons left">keyboard_arrow_left</i> VOLTAR</a>
    </div>
    <div class="box-topo">
        <div class="box-functions">
            <div class="row">
                <div class="col s12"><i class="material-icons left">attach_money</i><h4>Visualizar Pessoa</h4></div>
            </div>
        </div>
    </div>
    <div class="box-miolo">
        <h4 style="cursor: pointer;" id="filtros"><span>-</span>Filtros</h4>
        <div class="filtros" style="display: none;">
            <div class="input-field col s12">
                <input id="fname" type="text" class="validate" required>
                <label for="fname">Nome</label>
            </div>
            <div class="input-field col s12">
                <input id="fdate" type="date" class="validate">
                <label for="fdate">Data de Nascimento</label>
            </div>
            <div class="input-field col s12">
                <select name="fsexo" id="fsexo">
                    <option value="" disabled selected>Escolha uma opção</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
                <label>Sexo</label>
            </div>
            <div class="input-field col s12">
                <input id="fcpf" type="text" class="validate cpfMask">
                <label for="fcpf">CPF</label>
            </div>
            <div class="input-field col s12">
                <input id="ftelefone" type="text" class="validate telefoneMask">
                <label for="ftelefone">Telefone</label>
            </div>
            <div class="input-field col s12">
                <input id="femail" type="email" class="validate" required>
                <label for="femail">E-mail</label>
            </div>
            <div class="col s6">
                <button id="btFiltrar" class="waves-effect waves-light btn-large">Filtrar</button>
            </div>
        </div>

        <h4>Visualização</h4>
        <table>
            <thead>
            <tr>
                <th>NOME</th>
                <th>Data DE NASCIMENTO</th>
                <th>SEXO</th>
                <th>CPF</th>
                <th>TELEFONE</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
            </tr>
            </thead>
            <tbody id="tableVisuzalizar"></tbody>
        </table>
    </div>
</div>

<div class="box-modal" id="modal-Editar">
    <div class="box-back">
        <a href="javascript:void();" class="voltarEditar"><i class="material-icons left">keyboard_arrow_left</i> VOLTAR</a>
    </div>
    <div class="box-topo">
        <div class="box-functions">
            <div class="row">
                <div class="col s12"><i class="material-icons left">people</i><h4>Editar de Pessoa</h4></div>
            </div>
        </div>
    </div>
    <div class="box-miolo">
        <form action="#" method="post" id="formCadastro">
            <div class="row">
                <input name="idperson" type="hidden" id="eidperson" />
                <div class="input-field col s12">
                    <input id="ename" type="text" class="validate" required>
                    <label for="ename">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input id="edate" type="date" class="validate">
                    <label for="edate">Data de Nascimento</label>
                </div>
                <div class="input-field col s12">
                    <select name="sexo" id="esexo">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    <label>Sexo</label>
                </div>
                <div class="input-field col s12">
                    <input id="ecpf" type="text" class="validate cpfMask">
                    <label for="ecpf">CPF</label>
                </div>
                <div class="input-field col s12">
                    <input id="etelefone" type="text" class="validate telefoneMask">
                    <label for="etelefone">Telefone</label>
                </div>
                <div class="input-field col s12">
                    <input id="eemail" type="email" class="validate" required>
                    <label for="eemail">E-mail</label>
                </div>
                <div class="col s12">
                    <button id="btEditar" class="waves-effect waves-light btn-large">Editar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<input id="urlBase" type="hidden" value="{{url('')}}" />

<!-- Scripts Javascript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="{{url('js/materialize-bootbox-master/dist/mzbox.js')}}" type="text/javascript"></script>
<script src="{{url('js/functios.js')}}" type="text/javascript"></script>
<script src="{{url('js/visualizacao.js')}}" type="text/javascript"></script>
<script src="{{url('js/cadastro.js')}}" type="text/javascript"></script>
</body>
</html>
