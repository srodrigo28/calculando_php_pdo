<?php 
    // Link calculando * https://www.youtube.com/watch?v=Yw2mG4m91xA&t=602s
    require_once "conexao.php";
    require_once "header.php";
?>

    <?php
        
        $query_valor_venda = "SELECT SUM(quantidade * preco_venda) AS valor_venda FROM produtos";
        $result_valor_venda = $conn-> prepare($query_valor_venda);
        $result_valor_venda->execute();

        $query_valor_compra = "SELECT SUM(quantidade * preco_compra) AS valor_compra FROM produtos";
        $result_valor_compra = $conn-> prepare($query_valor_compra);
        $result_valor_compra->execute();

        $row_valor_compra = $result_valor_compra->fetch(PDO::FETCH_ASSOC);
        echo "Valor do estoque (compra): R$ " . number_format($row_valor_compra['valor_compra'], 2, "," , ".") . "<br><br><hr>";

        $row_valor_venda = $result_valor_venda->fetch(PDO::FETCH_ASSOC);
        echo "Valor do estoque (venda): R$ " . number_format($row_valor_venda['valor_venda'], 2, "," , ".") . "<br><br><hr>";

        $lucro = $row_valor_venda['valor_venda'] - $row_valor_compra['valor_compra'];
        echo "Valor do estoque (venda): R$ " . number_format($lucro, 2, "," , ".") . "<br><br><hr>";
    
        require_once "inserir.php";
    ?>

</body>
</html>