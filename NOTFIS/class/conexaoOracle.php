<?php

//Nome de usuário do banco de dados, nesse exemplo usei um usuário padrão do oracle, 
//caso não dê certo é por que ele deve ter sido deletado ou a senha alterada após 
//a instalação do oracle.
$ora_user = "entregou";
//Senha do usuário no banco de dados.
$ora_senha = "entregou";
//Nesse bloco do código, especificamos as definições do banco de dados, como o protocolo 
//de comunicação o protocolo utilizado  foi o TCP, o ip do servidor onde se encontra o banco de dados 
//e a porta de conexão , geralmente por padrão a porta utilizada pelo Oracle  é a porta 1521, 
//caso não dê certo com a porta 1521, alguém pode ter alterado-a no durante a instalação,
//e por último a instância do banco que aqui utilizamos a instância ORCL. 
//Caso não dê certo nessa instância é por que no momento da instalação ela foi criada com um nome diferente.
$ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP) 
              (HOST=10.222.31.80)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=esales))
     )";
//Nesta linha fazemos a conexão com o banco usando os variáveis preenchidas 
//anterior mente, logo em seguida fazemos uma verificação, se a conexão ocorreu 
//com sucesso, será impresso na tela uma mensagem avisando nos de tal,
//caso não, ele imprimirá na tela uma mensagem avisando que houve um erro
if ($ora_conexao = OCILogon($ora_user, $ora_senha, $ora_bd)) {
    echo "Conexão bem sucedida. Usuário conectado: ora_user";
} else {
    echo "Erro na conexão com o Oracle.";
}