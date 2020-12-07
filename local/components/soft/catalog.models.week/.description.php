<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("T_IBLOCK_DESC_MODELS_LIST"),
    "DESCRIPTION" => GetMessage("T_IBLOCK_DESC_MODELS_DESC"),
    "CACHE_PATH" => "Y",
    "SORT" => 40,
    "PATH" => array(
        "ID" => "content_salons",
        "CHILD" => array(
            "ID" => "modelsWeek",
            "NAME" => GetMessage("T_IBLOCK_DESC_MODELS"),
            "SORT" => 20,
        )
    ),
);

?>