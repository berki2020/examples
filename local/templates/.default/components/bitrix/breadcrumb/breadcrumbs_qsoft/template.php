<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;
//delayed function must return a string

if(empty($arResult)) {
	return '';
}

$strReturn = '<nav class="nav_chain">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++) {

    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    $arrow = '<span class="nav_arrow inline-block"></span>';
    $link = $arResult[$index]["LINK"];

    if ($link <> "" && $index != $itemSize - 1) {
        $strReturn .= '<a href="' . $link . '">' . $title . '</a>' . $arrow;
    } else {
        $strReturn .= $title ;
    }
}

$strReturn .= '</nav>';

return $strReturn;
