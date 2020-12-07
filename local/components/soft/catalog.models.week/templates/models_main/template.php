<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h2 class="push_right">Модели недели</h2>
<section class="product_line">
        <? foreach ($arResult["ITEMS"] as $result): ?>
        <?
        $this->AddEditAction($result['ID'], $result['EDIT_LINK'], CIBlock::GetArrayByID($result["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($result['ID'], $result['DELETE_LINK'], CIBlock::GetArrayByID($result["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <figure class="product_item" id="<?=$this->GetEditAreaId($result['ID']);?>">
            <?if ($result["PROPERTY_SALE_VALUE_VALUE"] || ($result["PROPERTY_SALE_VALUE_VALUE"] && $result["PROPERTY_NEW_VALUE_VALUE"])):?>
                <div class="product_item_label sale"></div>
            <?endif?>
            <?if ($result["PROPERTY_NEW_VALUE_VALUE"] && !$result["PROPERTY_SALE_VALUE_VALUE"]):?>
                <div class="product_item_label new"></div>
            <?endif?>
            <div class="product_item_pict">
                <a href="<?=$result["DETAIL_PAGE_URL"]?>/">
                    <img src="<?=$result["PICTURE"]["SRC"] ?? MY_DEFAULT_TEMPLATE_PATH . 'images/no-image.jpg'?>" alt="<?=$result["PICTURE"]["ALT"]?>" title="<?=$result["PICTURE"]["TITLE"]?>" />
                </a>
            </div>
                <figcaption>
                    <h3><a href="<?=$result["DETAIL_PAGE_URL"]?>/"><?=$result["NAME"]?></a></h3>
                    <? if (isset($result["PRICE"]["DISCOUNT_PRICE"])):?>
                    <span class="product_item_price dark_grey old_price"><?=$result["PRICE"]["BASIC_PRICE"]?> <?=GetMessage($result["PRICE"]["CURRENCY"])?></span>
                    <?endif?>
                    <p class="product_item_price dark_grey"><?=$result["PRICE"]["DISCOUNT_PRICE"] ?? $result["PRICE"]["BASIC_PRICE"]?> <?=GetMessage($result["PRICE"]["CURRENCY"])?></p>
                    <a class="buy_button inverse inline-block pie" href="<?= $result["PRICE"]["PRODUCT_QUANTITY"] > 0 ? '?action=ADD2BASKET&id=' . $result["ID"] : '#'?>"><?= $result["PRICE"]["PRODUCT_QUANTITY"] > 0 ? GetMessage("IN_BASKET"):GetMessage("NOT_AVAILABLE"); ?></a>
                </figcaption>
        </figure>
        <? endforeach;?>
</section>
