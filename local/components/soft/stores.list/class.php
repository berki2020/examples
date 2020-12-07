<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class StoresList extends CBitrixComponent
{
    public $paramsQuery = [];

    public function onPrepareComponentParams($arParams) {

        if (!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 3600;
        }

        $arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
        if (strlen($arParams["IBLOCK_TYPE"]) < 1) {
            $arParams["IBLOCK_TYPE"] = "salons";
        }

        $arParams["IBLOCKS"] = trim($arParams["IBLOCKS"]);

        $arParams["QUANTITY_ELEMENTS"] = intval($arParams["QUANTITY_ELEMENTS"]);
        if ($arParams["QUANTITY_ELEMENTS"] < 1) {
            $arParams["QUANTITY_ELEMENTS"] = 0;
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
            "PROPERTY_WORK_HOURS",
            "PROPERTY_PHONE",
            "PROPERTY_ADDRESS"
        ];

        if ($this->arParams["SHOW_MAP"] == "Y") {
            $arSelect[] = "PROPERTY_MAP";
        }

        $arFilter = [
            "IBLOCK_ID" => $this->arParams["IBLOCKS"],
            "ACTIVE_DATE" => "Y",
            "ACTIVE"=> "Y",
            "CHECK_PERMISSIONS"=> "Y",
        ];

        $arSort = [$this->arParams['SORT_FIELD'] => $this->arParams['SORT_ORDER']];

        
        if ($this->arParams["QUANTITY_ELEMENTS"] == 0) {
            $arNavStartParams = false;
        } else {
            $arNavStartParams = ["nTopCount" => $this->arParams["QUANTITY_ELEMENTS"]];
        }
        

        $this->paramsQuery["ORDER"] = $arSort;
        $this->paramsQuery["FILTER"] = $arFilter;
        $this->paramsQuery["GROUP"] = false;
        $this->paramsQuery["NAV_PARAMS"] = $arNavStartParams;
        $this->paramsQuery["SELECT_FIELDS"] = $arSelect;
    }


    public function getData()
    {
        if (!CModule::IncludeModule("iblock")) {
            $this->AbortResultCache();
            ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
            return;
        }

        $rsIBlockElement = CIBlockElement::GetList(
            $this->paramsQuery["ORDER"],
            $this->paramsQuery["FILTER"],
            $this->paramsQuery["GROUP"],
            $this->paramsQuery["NAV_PARAMS"],
            $this->paramsQuery["SELECT_FIELDS"]
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

            $arResult["ITEMS"][] = $result;
        }

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
            }
        }

        return $arResult;
    }

    public function setMapData($result)
    {
        list($lat, $lon) = explode(",", $result["PROPERTY_MAP_VALUE"]);
        $result = [
            "LAT" => $lat,
            "LON" => $lon,
            "TEXT" => $result["PROPERTY_ADDRESS_VALUE"]
        ];

        return $result;
    }

    public function setButtonEdit()
    {
        global $APPLICATION;

        if (
            isset($this->arParams["IBLOCKS"])
            && CModule::includeModule("iblock")
            && $APPLICATION->GetShowIncludeAreas()
        ) {
            $arButtons = CIBlock::GetPanelButtons(
                $this->arParams["IBLOCKS"],
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

            $this->setParamsQuery();
            $dbResult = $this->getData();
            $this->arResult = $this->prepareResultArray($dbResult);

            if ($this->arParams["SHOW_MAP"] == "Y") {
                $this->SetResultCacheKeys(["POSITION"]);
            } else {
                $this->SetResultCacheKeys([]);
            }
           
            $this->IncludeComponentTemplate();
        }

        $this->setButtonEdit();
    }
}
