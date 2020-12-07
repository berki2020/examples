<?
    if (CModule::IncludeModule("catalog") && isset($_GET["action"])) {
        $product_id = $_GET["id"];
        Add2BasketByProductID($product_id);
        header('Location: /');
    }
?>