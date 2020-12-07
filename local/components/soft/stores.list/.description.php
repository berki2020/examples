<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("T_IBLOCK_DESC_SALONS_LIST"),
    "DESCRIPTION" => GetMessage("T_IBLOCK_DESC_SALONS_DESC"),
    "CACHE_PATH" => "Y",
    "SORT" => 40,
    "PATH" => array(
        "ID" => "content_salons",
        "CHILD" => array(
            "ID" => "salons",
            "NAME" => GetMessage("T_IBLOCK_DESC_SALONS"),
            "SORT" => 20,
        )
    ),
);

?>