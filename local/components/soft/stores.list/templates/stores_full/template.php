<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div>

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <figure class="shops_block_item_new" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PICTURE"]["SRC"] ?? MY_DEFAULT_TEMPLATE_PATH . 'images/no-image.jpg'?>" alt="<?=$arItem["PICTURE"]["ALT"]?>" title="<?=$arItem["PICTURE"]["TITLE"]?>" /></a>
            <figcaption class="shops_block_item_description_new">
                <h3 class="shops_block_item_name"><?=$arItem["NAME"]?></h3>
                <p class="dark_grey"><?=$arItem["PROPERTY_ADDRESS_VALUE"]?></p>
                <p class="black"><?=$arItem["PROPERTY_PHONE_VALUE"]?></p>
                <p><?=getMessage("OPENING_HOURS")?>:<br/><?=$arItem["PROPERTY_WORK_HOURS_VALUE"]?></p>
            </figcaption>
    </figure>
    <br>
    <? endforeach;?>
</div>

