<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рога и Сила - главная страница");
?>

<?$APPLICATION->IncludeComponent(
    "soft:main.banner",
    ".default",
    Array(
        "JQUERY" => "Y",
        "QUANTITY" => "3",
        "CACHE_TIME" => "0",
        "CACHE_TYPE" => "A",
        "DEFAULT_TEMPLATE" => ".default",
        "TYPE" => "main_soft_banner",
    )
);?>

<?$APPLICATION->IncludeComponent(
    "soft:catalog.models.week", 
    "models_main", 
    array(
        "CACHE_TIME" => "180",
        "CACHE_TYPE" => "A",
        "DETAIL_URL" => "",
        "IBLOCKS" => "5",
        "IBLOCK_TYPE" => "products",
        "QUANTITY_ELEMENTS" => "4",
        "SHOW_MAP" => "N",
        "SORT_FIELD" => "RAND",
        "SORT_ORDER" => "DESC",
        "URL_TO_ALL_STORES" => "/company/stores/",
        "COMPONENT_TEMPLATE" => "models_main",
        "IBLOCK_ID" => "5"
    ),
    false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list", 
    "news_list_main", 
    array(
        "ACTIVE_DATE_FORMAT" => "j M Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "3",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "150",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "news_list_main",
        "NO_IMAGE" => "/local/templates/roga_i_sila_main/images/no-image.jpg"
    ),
    false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>