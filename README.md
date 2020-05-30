<h2>Person Register</h2>

<p>Este projeto foi desenvolvido para teste de vaga de emprego, foram utilizados o laravel 5.8, html5, jquery, javascript, jwt, materialize css e axios.</p>
<hr /><br />
<b>Etapas para Instalação do Projeto:</b>
<ol>
    <li>Executar no local desejado o comando git: <br /> <u>git clone https://github.com/wagnerbertoldi2/personRegister.git</u></li>
    <li>Executar a copia do arquivo .env.example para .env</li>
    <li>Executar o comando: <br /> <u>php artisan key:generate</u></li>
    <li>Executar o comando: <br /> <u>php artisan jwt:secret</u></li>
    <li>Alterar no no arquivo .env as seguintes configurações: <br />
        <ul>
            <li>APP_URL => colocar a url conforme o dominio ou ip do servidor</li>
            <li>DB_HOST => host do banco de dados</li>
            <li>DB_PORT => porta do banco de dados</li>
            <li>DB_DATABASE => nome do banco de dados</li>
            <li>DB_USERNAME => usuário do banco de dados</li>
            <li>DB_PASSWORD => senha do banco de dados</li>
            <li>APP_DEBUG => se for colocar em produção, troque para false</li>
        </ul>
    </li>
    <li>Crie as tabelas do banco de dados, conforme estão no er => <u>database/er/er_person.mwb</u></li>    
    <li>Execute o comando: <u>php artisan config:cache</u></li>
    <li>Se não estiver utilizando um servidor apache, pode executar o comando <u>php artisan serve</u>, que o mesmo executa um servidor para rodar o projeto, mas é necessario ter o composer, php e mysql instalados na máquina.</li>
</ol>
<hr />
Desenvolvido por Wagner Bertoldi<br />
Maio/2020
