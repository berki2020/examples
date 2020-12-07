<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>
<?if($arResult["FORM_TYPE"] == "login"):?>

    <nav class="top_menu grey inline-block">
        <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" class="register"><?= getMessage("AUTH_REGISTER"); ?></a>
        <a href="<?=$arParams["AUTH_LOGIN_URL"] . '&backurl=' . $arResult['BACKURL']?>" class="auth"><?=getMessage("auth_form_comp_auth")?></a>
    </nav>

<?
else:
?>
    <nav class="top_menu grey inline-block authorize">
        <?= getMessage("HELLO"); ?>, <a href="<?= $arResult["PROFILE_URL"]; ?>"><b><?= $arResult["USER_NAME"]; ?></b></a>
        <a href="<?=$arParams["PERSONAL_URL"]?>"><?= getMessage("lk"); ?></a>
        <a href="<?=$arParams["AUTH_LOGOUT_URL"] . '&backurl=' . $arResult['BACKURL']?>"><?= getMessage("AUTH_LOGOUT_BUTTON"); ?></a>
    </nav>
<?endif?>
