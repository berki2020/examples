<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<br>
<?
    if ($arParams["SHOW_MAP"] == "Y") {
       $APPLICATION->IncludeComponent(
            "bitrix:map.yandex.view", 
            ".default", 
            array(
                "CONTROLS" => array(
                    0 => "ZOOM",
                    1 => "TYPECONTROL",
                ),
                "INIT_MAP_TYPE" => "MAP",
                "MAP_DATA" => serialize($arResult["POSITION"]),
                "MAP_HEIGHT" => "500",
                "MAP_ID" => "salon",
                "MAP_WIDTH" => "600",
                "OPTIONS" => array(
                    0 => "ENABLE_SCROLL_ZOOM",
                ),
                "COMPONENT_TEMPLATE" => ".default"
            ),
            false
        );
    }
?>
<br>