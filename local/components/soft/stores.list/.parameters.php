<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock")) return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock=array();

$rsIBlock = CIBlock::GetList(
    Array("sort" => "asc"),
    Array(
        "TYPE" => $arCurrentValues["IBLOCK_TYPE"],
        "ACTIVE"=> "Y"
    )
);

while($arr = $rsIBlock->Fetch()) {
    $arIBlock[$arr["ID"]] = "[" . $arr["ID"] . "] " . $arr["NAME"];
}

$arComponentParameters = array(
    "GROUPS" => array(
    ),
    "PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlockType,
            "REFRESH" => "Y",
        ),
        "IBLOCKS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_IBLOCK"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlock,
            "MULTIPLE" => "N",
            "ADDITIONAL_VALUES" => "N",
            "REFRESH" => "Y",
        ),
        "QUANTITY_ELEMENTS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("QUANTITY_ELEMENTS"),
            "TYPE" => "STRING",
            "DEFAULT" => '2',
        ),
        "URL_TO_ALL_STORES" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("URL_TO_ALL_STORES"),
            "TYPE" => "STRING",
            "DEFAULT" => '/company/stores/',
        ),
        "SORT_FIELD" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SORT_FIELD"),
            "TYPE" => "STRING",
            "DEFAULT" => 'RAND',
        ),
        "SORT_ORDER" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SORT_ORDER"),
            "TYPE" => "STRING",
            "DEFAULT" => 'DESC',
        ),
        "SHOW_MAP" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SHOW_MAP"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => 'N',
        ),
        "DETAIL_URL" => CIBlockParameters::GetPathTemplateParam(
            "DETAIL",
            "DETAIL_URL",
            GetMessage("IBLOCK_DETAIL_URL"),
            "",
            "URL_TEMPLATES"
        ),
        "CACHE_TIME" => Array("DEFAULT" => 180),
    ),
);
