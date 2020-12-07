<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("ADV_BANNER_NAME"),
    "DESCRIPTION" => GetMessage("ADV_BANNER_DESC"),
    "ICON" => "/images/banner.gif",
    "CACHE_PATH" => "Y",
    "PATH" => array(
        "ID" => "content_salons",
        "CHILD" => array(
            "ID" => "mainBanner",
            "NAME" => GetMessage("ADVERTISING_SERVICE")
        )
    ),
);
?>