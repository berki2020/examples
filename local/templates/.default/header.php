<?php if (!defined ("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<!DOCTYPE>
<!--[if IE 7]>    <html class="ie7"> <![endif]-->
<!--[if IE 8]>    <html class="ie8> <![endif]-->
<!--[if IE 9]>    <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
    <head>
        <? $APPLICATION->ShowHead(); ?>

        <title><?$APPLICATION->ShowTitle()?></title>
        <? 
        use Bitrix\Main\Page\Asset;

        Asset::getInstance()->addString("<link href='" . MY_DEFAULT_TEMPLATE_PATH . "/favicon.ico' rel='shortcut icon' type='image/x-icon' />"); 

        Asset::getInstance()->addCss(MY_DEFAULT_TEMPLATE_PATH . "/css/base.css");

        Asset::getInstance()->addCss(MY_DEFAULT_TEMPLATE_PATH . "/js/bxslider/jquery.bxslider.css");

        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery-1.9.1.min.js");
        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery.placeholder.js");
        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/bxslider/jquery.bxslider.js");
        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/default_script.js");

        Asset::getInstance()->addCss(MY_DEFAULT_TEMPLATE_PATH . "/js/bxslider/jquery.bxslider.css");
        Asset::getInstance()->addCss(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.theme.css");
        Asset::getInstance()->addCss(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.css");

        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.core.js");
        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.widget.js");
        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.position.js");
        Asset::getInstance()->addJs(MY_DEFAULT_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js");
        ?>
        <!--[if lt IE 9]>
        	<script src="<?= MY_DEFAULT_TEMPLATE_PATH; ?>/js/html5shiv.js"></script>
        <![endif]-->
	</head>
	<body>
			<?php $APPLICATION->ShowPanel() ?>
		<div class="wrapper">
			<div class="base_layer"></div>
			<header class="header">
				<div class="width_960">	
					<div class="item-logo">
						<? if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) != '/')  { ?>
							<a href = "/"><span class="logo inline-block"></span></a>
							<? } else { ?>
							<span class="logo inline-block">
							<? } ?>
					</div>
                    <?$APPLICATION->IncludeComponent(
                    	"bitrix:system.auth.form", 
                    	"auth_form_header", 
                    	array(
                    		"FORGOT_PASSWORD_URL" => "/auth/",
                    		"PROFILE_URL" => "/personal/profile/",
                    		"REGISTER_URL" => "/auth/",
                    		"AUTH_LOGIN_URL" => "/auth/?login=yes",
                    		"AUTH_LOGOUT_URL" => "/auth/?logout=yes",
                    		"PERSONAL_URL" => "/personal/",
                    		"SHOW_ERRORS" => "N",
                    		"COMPONENT_TEMPLATE" => "auth_form_header"
                    	),
                    	false
                    );?>
					<div class="basket_block">
					<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	"basket", 
	array(
		"COMPONENT_TEMPLATE" => "basket",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE" => "N",
		"SHOW_EMPTY_VALUES" => "N",
		"SHOW_PERSONAL_LINK" => "Y",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"SHOW_AUTHOR" => "N",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_REGISTRATION" => "N",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"SHOW_PRODUCTS" => "N",
		"POSITION_FIXED" => "N",
		"HIDE_ON_BASKET_PAGES" => "N"
	),
	false
);?>
					</div>
				</div>
			</header>
			<section class="fixed_block">
				<div class="width_960">
					<form name="search_form" class="search_form pie">
						<div class="search_form_wrapper">
							<input type="text" placeholder="Поиск по сайту"/>
							<input type="submit" value=""/>
						</div>
					</form>

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu", 
                        "catalog_top", 
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "Y",
                            "COMPONENT_TEMPLATE" => "catalog_top"
                        ),
                        false
                    );?>

				</div>
			</section>
			
			<section class="content">
				<div class="work_area width_960">
					