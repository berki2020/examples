<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>
<?if (!$compositeStub && $arParams['SHOW_AUTHOR'] == 'Y'):?>
	<div class="bx-basket-block">
		<i class="fa fa-user"></i>
		<?if ($USER->IsAuthorized()):
			$name = trim($USER->GetFullName());
			if (! $name)
				$name = trim($USER->GetLogin());
			if (strlen($name) > 15)
				$name = substr($name, 0, 12).'...';
			?>
			<a href="<?=$arParams['PATH_TO_PROFILE']?>"><?=htmlspecialcharsbx($name)?></a>
			&nbsp;
			<a href="?logout=yes"><?=GetMessage('TSB1_LOGOUT')?></a>
		<?else:
			$arParamsToDelete = array(
				"login",
				"login_form",
				"logout",
				"register",
				"forgot_password",
				"change_password",
				"confirm_registration",
				"confirm_code",
				"confirm_user_id",
				"logout_butt",
				"auth_service_id",
				"clear_cache"
			);

			$currentUrl = urlencode($APPLICATION->GetCurPageParam("", $arParamsToDelete));
			if ($arParams['AJAX'] == 'N')
			{
				?><script type="text/javascript"><?=$cartId?>.currentUrl = '<?=$currentUrl?>';</script><?
			}
			else
			{
				$currentUrl = '#CURRENT_URL#';
			}
			?>
			<a href="<?=$arParams['PATH_TO_AUTHORIZE']?>?login=yes&backurl=<?=$currentUrl; ?>">
				<?=GetMessage('TSB1_LOGIN')?>
			</a>
			<?
			if ($arParams['SHOW_REGISTRATION'] === 'Y')
			{
				?>
				<a href="<?=$arParams['PATH_TO_REGISTER']?>?register=yes&backurl=<?=$currentUrl; ?>">
					<?=GetMessage('TSB1_REGISTER')?>
				</a>
				<?
			}
			?>
		<?endif?>
	</div>
<?endif?>

		<?
		if (!$arResult["DISABLE_USE_BASKET"])
		{
			?><!-- <i class="fa fa-shopping-cart"></i> -->
			<a class="basket_product_count inline-block" href="<?= $arParams['PATH_TO_BASKET'] ?>"><?=$arResult['NUM_PRODUCTS']?></a><?
		}
		if (!$compositeStub)
		{
			if ($arParams['SHOW_TOTAL_PRICE'] == 'Y'):?>
			<br <? if ($arParams['POSITION_FIXED'] == 'Y'): ?>class="hidden-xs"<?endif ?>/>
			<span>
				<?= GetMessage('TSB1_TOTAL_PRICE') ?>
				<? if ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'):?>
					<strong><?= $arResult['TOTAL_PRICE'] ?></strong>
				<?endif ?>
			</span>
			<?endif;?>
			<?
		}
		if ($arParams['SHOW_PERSONAL_LINK'] == 'Y'):?>
			<a href="<?=$arParams['PATH_TO_PERSONAL']?>" class="order_button pie"><?=GetMessage('TSB1_PERSONAL')?></a>
		<?endif?>
