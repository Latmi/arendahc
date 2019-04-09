<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");

//echo "<pre>";
$count = 0;
$arResult["THIS_PLACE"] = array();
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_TEXT", "PREVIEW_IMAGE", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>2, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5000), $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    //print_r($arFields);
    $arProps = $ob->GetProperties();
    //print_r($arProps);
    if ($arProps["ATT_OBJECT"]["VALUE"] === $arResult["ID"]) {
        $arResult["THIS_PLACE"][$count]["TYPE"] = $arProps["ATT_TYPE"]["VALUE"];
        $arResult["THIS_PLACE"][$count]["FLOOR"] = $arProps["ATT_FLOOR"]["VALUE"];
        if (stristr($arProps["ATT_SQUARE"]["VALUE"], '.')) {
            $arResult["THIS_PLACE"][$count]["SQUARE"] = floatval($arProps["ATT_SQUARE"]["VALUE"]);
        } else {
            $arResult["THIS_PLACE"][$count]["SQUARE"] = intval($arProps["ATT_SQUARE"]["VALUE"]);
        }
        $arResult["THIS_PLACE"][$count]["STATUS"] = $arProps["ATT_STATUS"]["VALUE"];
        $arResult["THIS_PLACE"][$count]["DESC"] = $arFields["DETAIL_TEXT"];
        foreach ($arProps["ATT_ARPHOTO"]["VALUE"] as $image) {
            $arResult["THIS_PLACE"][$count]["PHOTO"][] = CFile::GetPath($image);
        }
    }
$count++;

}



//var_dump ($arResult["THIS_PLACE"]);

//echo "</pre>";