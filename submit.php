<?php
    function testarInput($dados){
        $dados=trim($dados);
        $dados=stripslashes($dados);
        $dados=htmlspecialchars($dados);
        return $dados;
    }

    //mail('heldermartinscarvalho@gmail.com', 'Assunto', 'Menssagem', 'From: heldercarvalho.esaf@gmail.com');

    if($_POST){
        if(empty($_POST['inputPrimeiroNome'])){
            $primeiroNomeErro='É obrigatório introduzir um Primeiro Nome!';
        }else{
            $primeiroNome=testarInput($_POST['inputPrimeiroNome']);
        }

        if(empty($_POST['inputUltimoNome'])){
            $ultimoNomeErro='É obrigatório introduzir um Último Nome!';
        }else{
            $ultimoNome=testarInput($_POST['inputUltimoNome']);
        }

        if(empty($_POST['inputLocalidade'])){
            $localidadeErro='É obrigatório introduzir uma Localidade!';
        }else{
            $localidade=testarInput($_POST['inputLocalidade']);
        }

        if(empty($_POST['inputEmail1'])){
            $emailErro='É obrigatório introduzir um Email!';
        }else{
            $email=testarInput($_POST['inputEmail1']);
        }

        if(!empty($_FILES['inputFicheiro'])){
            $caminho='uploads/';
            $caminho=$caminho.basename($_FILES['inputFicheiro']['name']);
            if(move_uploaded_file($_FILES['inputFicheiro']['tmp_name'], $caminho)){
                $ficheiro=basename($_FILES['inputFicheiro']['name']);
            }else{
                $ficheirolErro='É obrigatório introduzir um Ficheiro!';
            }
        }
    }

    if (!empty($primeiroNomeErro) || !empty($ultimoNomeErro) || !empty($localidadeErro) || !empty($emailErro) || !empty($ficheirolErro)){
?>
    <h2>Erros:</h2>
    <ul>
        <li><?=$primeiroNomeErro;?></li>
        <li><?=$ultimoNomeErro;?></li>
        <li><?=$localidadeErro;?></li>
        <li><?=$emailErro;?></li>
        <li><?=$ficheirolErro;?></li>
    </ul>
<?php
    }
    if (!empty($primeiroNome) || !empty($ultimoNome) || !empty($localidade) || !empty($email) || !empty($ficheiro)){
?>
    <h2>Resultado do Formulário:</h2>
    <ul>
        <li>Primeiro Nome: <?=$primeiroNome;?></li>
        <li>Último Nome: <?=$ultimoNome;?></li>
        <li>Localidade: <?=$localidade;?></li>
        <li>Email: <?=$email;?></li>
        <li>Ficheiro: <?=$ficheiro;?></li>
    </ul>
<?php
    }
?>