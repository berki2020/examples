<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);?>

<div class="page_nav">
    <nav>

        <?if ($arResult["NavPageNomer"] > 1):?>
            <?if ($arResult["NavPageNomer"] > 2):?>
                <a class="prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"></a>
            <?else:?>
                <a class="prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"></a>
            <?endif?>
            <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
        <?else:?>
           <span class="prev"></span><span class="current">1</span>
        <?endif?>



         <?
         $arResult["nStartPage"]++;
         while ($arResult["nStartPage"] <= $arResult["nEndPage"] - 1):
         ?>
            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <span class="current"><?=$arResult["nStartPage"]?></span>
            <?else:?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
            <?endif?>
                <?$arResult["nStartPage"]++?>
                
        <?endwhile?>

        <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            <?if($arResult["NavPageCount"] > 1):?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
            <?endif?>
        <a class="next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"] + 1)?>"></a>
        <?else:?>
            <?if($arResult["NavPageCount"] > 1):?>
                <span class="current"><?=$arResult["NavPageCount"]?></span>
            <?endif?>
                <span class="next"></span>
        <?endif?>

   </nav>
</div>
