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

<?if (!empty($arResult["DETAIL_PICTURE"]["SRC"])):?>
<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
<?endif?>
<p class="news_item_date grey"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></p>
<p><?=$arResult["DETAIL_TEXT"]?></p>

<!-- <pre>
 <?var_dump($arParams)?>
</pre> -->