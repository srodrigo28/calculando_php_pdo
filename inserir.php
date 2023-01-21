<?php
    require_once "conexao.php";
    require_once "header.php";

    $dadosProdutos = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dadosProdutos['inserir_produto'])){
        // var_dump($dadosProdutos);

        $nome = $dadosProdutos['nome'];
        $quant = $dadosProdutos['quantidade'];
        $compra = $dadosProdutos['preco_compra'];
        $venda = $dadosProdutos['preco_venda'];

        $query_produto = "INSERT INTO produtos(nome, quantidade, preco_compra, preco_venda)
                          VALUES('".$nome."' , '".$quant."', '" .$compra."', '".$venda."')";
        $cad_produto = $conn->prepare($query_produto);
        $cad_produto->execute();
        if($cad_produto->rowCount()){

            echo "Produto cadastrado com sucesso! <br><br>";
        }else{
            echo "Erro não foi possivel!";
        }
    }
?>
<form name="cad_produtos" method="post" action="">
    <div class="row">
        <label>Nome</label>
        <input type="text" name="nome">
    </div>

   <div class="row">
        <label>Quantidade</label>
        <input type="text" name="quantidade">
   </div>

   <div class="row">
        <label>Valor Compra</label>
        <input type="text" name="preco_compra">
   </div>

   <div class="row">
        <label>Valor Venda</label>
        <input type="text" name="preco_venda">
   </div>

   <div class="row">
        <input class="btn btn-primary" type="submit" value="cadastrar" name="inserir_produto"/>
   </div>

</form>
    
</body>
</html>