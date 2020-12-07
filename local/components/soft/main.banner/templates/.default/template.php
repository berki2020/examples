<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="slider">
    <ul class="bxslider">
    <?foreach ($arResult["BANNERS"] as $arItem):?> 
        <li>
            <div class="banner">
            <?=$arItem?>
            </div>
        </li>
    <?endforeach;?>
    </ul>
 </div>