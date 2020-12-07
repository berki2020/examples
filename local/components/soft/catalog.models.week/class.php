<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class ModelsWeek extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams) {

        if (!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 3600;
        }

        $arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
        if (strlen($arParams["IBLOCK_TYPE"]) < 1) {
            $arParams["IBLOCK_TYPE"] = "products";
        }

        $arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);

        $arParams["QUANTITY_ELEMENTS"] = intval($arParams["QUANTITY_ELEMENTS"]);
        if ($arParams["QUANTITY_ELEMENTS"] > 4) {
            $arParams["QUANTITY_ELEMENTS"] = 4;
        }

        $arParams["URL_TO_ALL_STORES"] = trim($arParams["URL_TO_ALL_STORES"]);
        $arParams["SORT_FIELD"] = trim($arParams["SORT_FIELD"]);
        $arParams["SORT_ORDER"] = trim($arParams["SORT_ORDER"]);

        return $arParams;
    }

    public function setParamsQuery()
    {
        $arSelect = [
            "ID",
            "IBLOCK_ID",
            "NAME",
            "PREVIEW_PICTURE",
            "PROPERTY_MODEL_WEEKS",
            "PROPERTY_SALE_VALUE",
            "PROPERTY_NEW_VALUE",
            "DETAIL_PAGE_URL",
        ];

        $arFilter = [
            "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
            "ACTIVE_DATE" => "Y",
            "ACTIVE"=> "Y",
            "PROPERTY_MODEL_WEEKS_VALUE" => "Y"
        ];

        $arSort = [$this->arParams['SORT_FIELD'] => $this->arParams['SORT_ORDER']];

        
        if ($this->arParams["QUANTITY_ELEMENTS"] == 0) {
            $arNavStartParams = false;
        } else {
            $arNavStartParams = ["nTopCount" => $this->arParams["QUANTITY_ELEMENTS"]];
        }
        
        return [
            "ORDER" => $arSort,
            "FILTER" => $arFilter,
            "GROUP" => false,
            "NAV_PARAMS" => $arNavStartParams,
            "SELECT_FIELDS" => $arSelect
        ];
    }

    public function getData()
    {
        if (!CModule::IncludeModule("iblock")) {
            ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
            return;
        }

        $paramsQuery = $this->setParamsQuery();

        $rsIBlockElement = CIBlockElement::GetList(
            $paramsQuery["ORDER"],
            $paramsQuery["FILTER"],
            $paramsQuery["GROUP"],
            $paramsQuery["NAV_PARAMS"],
            $paramsQuery["SELECT_FIELDS"]
        );

        return $rsIBlockElement;
    }

    public function preparePictures($arPictures)
    {
        $dbFiles = CFile::GetList([], ['@ID' => $arPictures]);

        $pictures = [];
        while ($picture = $dbFiles->GetNext()) {
            $picture['SRC'] = CFile::GetFileSRC($picture);
            $pictures[$picture['ID']] = $picture;
        }

        return $pictures;
    }

    public function prepareResultArray($rsIBlockElement)
    {
        while ($result = $rsIBlockElement->GetNext()) {

            if ($result["PREVIEW_PICTURE"]) {
                $arPictures[] = $result["PREVIEW_PICTURE"];
            }

            if ($this->arParams["SHOW_MAP"] == "Y") {
                $arResult["POSITION"]["PLACEMARKS"][] = $this->setMapData($result);
            }

            $arButtons = CIBlock::GetPanelButtons(
                $result["IBLOCK_ID"],
                $result["ID"],
                0,
                array("SECTION_BUTTONS" => false, "SESSID" => false)
            );
            
            $result["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
            $result["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

            $forPrice[$result["ID"]] = $result["PROPERTY_SALE_VALUE_VALUE"];
            $arResult["ITEMS"][] = $result;
        }

        $arPrices = $this->getPrices($forPrice);

        if (empty($arResult)) {
            $this->AbortResultCache();
            ShowError(GetMessage("IBLOCK_ID_NOT_EXITST"));
            return;
        }

        if (!empty($arPictures)) {
            $pictures = $this->preparePictures($arPictures);

            foreach ($arResult["ITEMS"] as $key => $item) {
                $arResult["ITEMS"][$key]["PICTURE"]["SRC"] = $pictures[$item["PREVIEW_PICTURE"]]["SRC"];
                $arResult["ITEMS"][$key]["PICTURE"]["TITLE"] = $pictures[$item["PREVIEW_PICTURE"]]["ORIGINAL_NAME"];
                $arResult["ITEMS"][$key]["PICTURE"]["ALT"] = $pictures[$item["PREVIEW_PICTURE"]]["ORIGINAL_NAME"];

                $arResult["ITEMS"][$key]["PRICE"] = $arPrices[$item["ID"]];
            }
        }

        return $arResult;
    }

    public function getPrices($forPrice)
    {
        if (CModule::IncludeModule("catalog")) {
        $prices = [];
        $otherID = [];

        foreach ($forPrice as $key => $value) {
            $otherID[] = $key;

            if ($value == "Y") {
                $arPrice = CCatalogProduct::GetOptimalPrice($key);
                $new_id = (int) $arPrice["PRICE"]["ID"];
                $prices[$key]["BASIC_PRICE"] =  (int) $arPrice["PRICE"]["PRICE"];
                $prices[$key]["DISCOUNT_PRICE"] = (int) $arPrice["RESULT_PRICE"]["DISCOUNT_PRICE"];
                $prices[$key]["PRODUCT_QUANTITY"] = 1;
            }
        
        }

        $dbPrices = CPrice::GetList(
             ["ID" => "DESC"],
             ["@ID" => $otherID],
             false,
             false,
             ["PRICE", "CURRENCY", "PRODUCT_QUANTITY", "ID"]
        );

        while ($dbRes = $dbPrices->getNext()) {
            $prices[$dbRes["ID"]]["BASIC_PRICE"] = (int) $dbRes["PRICE"];
            $prices[$dbRes["ID"]]["CURRENCY"] = $dbRes["CURRENCY"];
            $prices[$dbRes["ID"]]["PRODUCT_QUANTITY"] = (int) $dbRes["PRODUCT_QUANTITY"];
        }
    }
        return $prices;
    }

    public function setButtonEdit()
    {
        global $APPLICATION;

        if (
            isset($this->arParams["IBLOCK_ID"])
            && CModule::includeModule("iblock")
            && $APPLICATION->GetShowIncludeAreas()
        ) {
            $arButtons = CIBlock::GetPanelButtons(
                $this->arParams["IBLOCK_ID"],
                0,
                0,
                array()
            );

            $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
        }
    }

    public function executeComponent()
    {
        if ($this->StartResultCache($this->arParams["CACHE_TIME"])) {

            $dbResult = $this->getData();
            $this->arResult = $this->prepareResultArray($dbResult);
            
            $this->SetResultCacheKeys([]);
            $this->IncludeComponentTemplate();
        }

        $this->setButtonEdit();
    }
}
