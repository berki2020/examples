<?php if (!defined ("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
				
				</div>
			</section>
			<div class="d_footer width_960"></div>
			<div class="clear"></div>
		</div>
	<!--Footer -->
		<footer class="footer width_960">
			<section class="float_inner bottom_block">
            <?$APPLICATION->IncludeComponent(
                "soft:stores.list", 
                "stores_short", 
                array(
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "COMPONENT_TEMPLATE" => "stores_short",
                    "DETAIL_URL" => "",
                    "IBLOCKS" => "4",
                    "IBLOCK_TYPE" => "salons",
                    "QUANTITY_ELEMENTS" => "2",
                    "URL_TO_ALL_STORES" => "/company/stores/",
                    "SORT_FIELD" => "RAND",
                    "SORT_ORDER" => "DESC"
                ),
                false
            );?>
            	<section class="info_block left_block_shadow">
                <h2><?=  getMessage('INFORMATION_FOOTER'); ?></h2>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "menu_footer",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "bottom",
                        "USE_EXT" => "N"
                	));
                ?>
                </section>
			</section>
			<div class="footer_inner">
				<a href="http://www.soft.ru" target="_blank" class="soft grey inline-block">Сделано в</a>
				<div class="copy">&copy; 2013 Рога &amp; Сила. Продажа автомобилей.</div>
			</div>
		</footer>
	</body>
</html>
