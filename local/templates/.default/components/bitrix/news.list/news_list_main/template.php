<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<section class="news_block inverse">
    <h2 class="inline-block"><?= getMessage('NEWS'); ?></h2><span class="all_list">&nbsp;/&nbsp;<a href="<?=$arResult["LIST_PAGE_URL"]?>" class="text_decor_none"><b><?= getMessage('ALL_LINK'); ?></b></a></span>
    <div>
<?foreach($arResult["ITEMS"] as $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
        <figure class="news_item">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"> 
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"] ?? MY_DEFAULT_TEMPLATE_PATH . 'images/no-image.jpg'?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
            </a>
            <figcaption class="news_item_description">
                <h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
                <div class="news_item_anons">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="text_decor_none">
                        <?= $arItem["PREVIEW_TEXT"]; ?>
                    </a>
                </div>
                        <?if ($arItem["DISPLAY_ACTIVE_FROM"]):?>
                            <div class="news_item_date grey"><?= $arItem["DISPLAY_ACTIVE_FROM"]?></div>
                        <?endif?>
            </figcaption>
        </figure>
<? } ?>
    </div>
</section>
