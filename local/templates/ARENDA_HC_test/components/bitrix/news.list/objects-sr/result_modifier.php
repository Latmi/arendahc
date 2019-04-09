<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


echo "<pre>";



foreach ($arResult["ITEMS"] as $arItem) {
    if ($arItem["IBLOCK_SECTION_ID"] == 2) {
        $arResult["BC"][] = $arItem;
    }
    if ($arItem["IBLOCK_SECTION_ID"] == 1) {
        $arResult["TC"][] = $arItem;
    }
    if ($arItem["IBLOCK_SECTION_ID"] == 3) {
        $arResult["SR"][] = $arItem;
    }
}

//print_r($arResult["TC"]);

echo "</pre>";
?>