<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

CBitrixComponent::includeComponentClass("bitrix:advertising.banner");

class MainBanner extends AdvertisingBanner
{
    public function onPrepareComponentParams($params)
    {
        global $USER;

        $params = parent::onPrepareComponentParams($params);

        if (!$USER->IsAuthorized()) {
            $params["QUANTITY"] = 1;
        }

        return $params;
    }
}