<?php if (!defined ("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? include $_SERVER['DOCUMENT_ROOT'] . MY_DEFAULT_TEMPLATE_PATH . 'header.php'; ?>
				
<?$APPLICATION->IncludeComponent(
    "bitrix:breadcrumb", 
    "breadcrumbs_soft", 
    array(
        "PATH" => "",
        "SITE_ID" => "s1",
        "START_FROM" => "0",
        "COMPONENT_TEMPLATE" => "breadcrumbs_soft"
    ),
    false
);?>

<section class="content_area">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu_left", 
	array(
		"COMPONENT_TEMPLATE" => "menu_left",
		"ROOT_MENU_TYPE" => "bottom",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>

<h1><? $APPLICATION->showTitle(); ?></h1>