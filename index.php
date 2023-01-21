<?php 
    require_once "conexao.php";
    require_once "header.php";
?>

    <?php
        $query_valor = "SELECT SUM(quantidade * preco_venda) AS valor_estoque FROM produtos";
        $result_valor = $conn-> prepare($query_valor);
        $result_valor->execute();

        $row_valor = $result_valor->fetch(PDO::FETCH_ASSOC);
        echo "Valor do estoque (venda): R$ " . number_format($row_valor['valor_estoque'], 2, "," , ".") . "<br><br>";
    
    ?>

</body>
</html>