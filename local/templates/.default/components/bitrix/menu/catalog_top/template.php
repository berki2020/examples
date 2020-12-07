<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="main_menu">
    <ul>
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

    <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
        <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
    <?endif?>

    <li <? if ($arItem["IS_PARENT"] || $arItem["SELECTED"]): ?>
        class="<?=$arItem["IS_PARENT"] ? "submenu " : "";?><?= $arItem["SELECTED"] ? "current" : ""; ?>"
        <?endif?>>
        <? if ($arItem["SELECTED"]): ?>
            <span><?=$arItem["TEXT"]?></span>
        <? else: ?>
            <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
        <?endif?>
        <? if ($arItem["IS_PARENT"]): ?>
            <div class="submenu_border"></div>
            <ul>
        <?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?endforeach?>

<?if ($previousLevel > 1):?>
    <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

    </ul>
</nav>
<?endif?>