<?php
class UsuarioRepositorio
{
    function Cadastrar(Usuario $usuario)
    {
        $conexao = new PDO("sqlsrv:Database=dbphp7;server=mcastro\mcastro;ConnectionPooling=0","sa","mcastro");
            $query = $conexao->prepare("INSERT INTO Usuarios 
                (Login, Senha, Nome, Sobrenome, DataNascimento, Escolaridade, Profissao) 
                    VALUES ('$usuario->Login', '$usuario->Senha', '$usuario->Nome', '$usuario->Sobrenome',
                     '$usuario->DataNascimento', '$usuario->Escolaridade', '$usuario->Profissao');");
                

          
          if($query->execute()) 
          {
            return "Salvo com sucesso";
          }    
          else
            return "Não foi posível salvar os dados";         
    }

    function VerificarCredenciais($login, $senha)
    {
        $conexao = new PDO("sqlsrv:Database=dbphp7;server=mcastro\mcastro;ConnectionPooling=0","sa","mcastro");
            $result = $conexao->query("SELECT Login, Senha FROM Usuarios where Login = '$login';");
            $result->execute();
                $row = $result->fetch(PDO::FETCH_ASSOC);  

            if ($row != null) 
            {
                    
                        $loginEncontrado = $row['Login'];
                        $senhaEncontrada = $row['Senha'];
                            if ($loginEncontrado == $login) 
                            {
                                if ($senhaEncontrada == $senha)
                                {
                                   return "valido";
                                }
                                return "Usuário ou senha inválidos.";
                            }

                
            }
            else
                return "Usuário não existe, clique em 'Criar conta'";

    }

    function BuscaDadosDoUsuarioLogado($login, $senha)
    {
        $conexao = new PDO("sqlsrv:Database=dbphp7;server=mcastro\mcastro;ConnectionPooling=0","sa","mcastro");

            $result = $conexao->query("SELECT * FROM Usuarios where Login = '$login';");
                $row = $result->fetch(PDO::FETCH_ASSOC); 

                return $row;
    }


}
    



?>