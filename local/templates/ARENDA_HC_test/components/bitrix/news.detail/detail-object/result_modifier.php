<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");

//echo "<pre>";

function getCoords($address) {
    $params = array(
        'geocode' => $address, // адрес
        'format'  => 'json',                          // формат ответа
        'results' => 1,                               // количество выводимых результатов
        'key'     => '...',                           // ваш api key
    );
    $response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?' . http_build_query($params, '', '&')));
    if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0)
    {
        $pieces = explode(" ", $response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos);
        $coords = $pieces[1].', '.$pieces[0];
        return $coords;
    }
    else
    {
        return 'Ничего не найдено';
    }
}
$addressDetail = array();

$arResult["MAP_DETAIL"][0]["NAME"] = $arResult["NAME"];
$arResult["MAP_DETAIL"][0]["ADDRESS"] = $arResult["PROPERTIES"]["ATT_ADDRESS"]["VALUE"]["TEXT"];
$coords = getCoords($arResult["PROPERTIES"]["ATT_ADDRESS"]["VALUE"]["TEXT"]);
$coord = explode(", ", $coords);
$arResult["MAP_DETAIL"][0]["POINTS"][0] = doubleval($coord[0]);
$arResult["MAP_DETAIL"][0]["POINTS"][1] = doubleval($coord[1]);


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
        $arResult["THIS_PLACE"][$count]["ID"] = $arFields["ID"];
        foreach ($arProps["ATT_ARPHOTO"]["VALUE"] as $image) {
            $arResult["THIS_PLACE"][$count]["PHOTO"][] = CFile::GetPath($image);
        }
        foreach ($arProps["ATT_PLAN"]["VALUE"] as $image) {
            $arResult["THIS_PLACE"][$count]["PLAN"][] = CFile::GetPath($image);
        }
    }
$count++;

}



//var_dump ($arResult["THIS_PLACE"]);

//echo "</pre>";