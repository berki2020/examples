<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="shops_block">
    <h2 class="inline-block"><?=getMessage("OUR_SALONS")?></h2>
    <span class="dark_grey all_list">&nbsp;/&nbsp;<a href="<?=$arParams["URL_TO_ALL_STORES"]?>" class="text_decor_none"><b><?=getMessage("ALL")?></b></a></span>
    <div>
        <? foreach ($arResult["ITEMS"] as $result): ?>
        <figure class="shops_block_item">
            <a href="<?=$result["DETAIL_PAGE_URL"]?>"><img src="<?=$result["PICTURE"]["SRC"] ?? MY_DEFAULT_TEMPLATE_PATH . 'images/no-image.jpg'?>" alt="<?=$result["PICTURE"]["ALT"]?>" title="<?=$result["PICTURE"]["TITLE"]?>" /></a>
                <figcaption class="shops_block_item_description">
                    <h3 class="shops_block_item_name"><?=$result["NAME"]?></h3>
                    <p class="dark_grey"><?=$result["PROPERTY_ADDRESS_VALUE"]?></p>
                    <p class="black"><?=$result["PROPERTY_PHONE_VALUE"]?></p>
                    <p><?=getMessage("OPENING_HOURS")?>:<br/><?=$result["PROPERTY_WORK_HOURS_VALUE"]?></p>
                </figcaption>
        </figure>
        <? endforeach;?>
    </div>
</section>
