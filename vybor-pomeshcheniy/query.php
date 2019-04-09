
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule("iblock");?>

<?php
//echo "<pre>";
$count = 0;
$result = array();
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_TEXT", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>2, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    //print_r($arFields);
    $arProps = $ob->GetProperties();
    //print_r($arProps);

    if ($_POST["objects"]) {
        if ($arProps["ATT_TYPE"]["VALUE"] == "Офис" || $arProps["ATT_TYPE"]["VALUE"] == "Торговая площадь" || $arProps["ATT_TYPE"]["VALUE"] == "Street retail") {

            $rsElem = CIBlockElement::GetById($arProps["ATT_OBJECT"]["VALUE"]);
            $arElem = $rsElem->GetNextElement();
            $arPropsEl = $arElem->GetProperties();

            $resEl = CIBlockElement::GetByID($arProps["ATT_OBJECT"]["VALUE"]);
            if($arResEl = $resEl->GetNext()) {
                $result[$count]["url"] = $arResEl["DETAIL_PAGE_URL"];
            }
            $result[$count]["id"] = $arFields["ID"];
            $result[$count]["name"] = $arFields["NAME"];
            $result[$count]["type"] = $arProps["ATT_TYPE"]["VALUE"];
            $result[$count]["square"] = floatval($arProps["ATT_SQUARE"]["VALUE"]);
            $result[$count]["metro"] = $arPropsEl["ATT_METRO"]["VALUE"];
            $result[$count]["text"] = $arFields["~DETAIL_TEXT"];
            if (is_array($arProps["ATT_PLAN"]["VALUE"])) {
                foreach ($arProps["ATT_PLAN"]["VALUE"] as $idImagePlan) {
                    $result[$count]["plan"][] = CFile::GetPath($idImagePlan);
                }
            } else {
                $result[$count]["plan"] = "";
            }
            if (is_array($arProps["ATT_ARPHOTO"]["VALUE"])) {
                foreach ($arProps["ATT_ARPHOTO"]["VALUE"] as $idImagePhoto) {
                    $result[$count]["photo"][] = CFile::GetPath($idImagePhoto);
                }
            } else {
                $result[$count]["photo"] = "";
            }


            $count++;
        }
    }

    if ($_POST["office"]) {

        if ($arProps["ATT_TYPE"]["VALUE"] == $_POST["office"] || $arProps["ATT_TYPE"]["VALUE"] == $_POST["square"] || $arProps["ATT_TYPE"]["VALUE"] == $_POST["retail"]) {

            $rsElem = CIBlockElement::GetById($arProps["ATT_OBJECT"]["VALUE"]);
            $arElem = $rsElem->GetNextElement();
            $arPropsEl = $arElem->GetProperties();

            $resEl = CIBlockElement::GetByID($arProps["ATT_OBJECT"]["VALUE"]);
            if($arResEl = $resEl->GetNext()) {
                $result[$count]["url"] = $arResEl["DETAIL_PAGE_URL"];
            }
            $result[$count]["id"] = $arFields["ID"];
            $result[$count]["name"] = $arFields["NAME"];
            $result[$count]["type"] = $arProps["ATT_TYPE"]["VALUE"];
            $result[$count]["square"] = floatval($arProps["ATT_SQUARE"]["VALUE"]);
            $result[$count]["metro"] = $arPropsEl["ATT_METRO"]["VALUE"];
            $result[$count]["text"] = $arFields["~DETAIL_TEXT"];
            if (is_array($arProps["ATT_PLAN"]["VALUE"])) {
                foreach ($arProps["ATT_PLAN"]["VALUE"] as $idImagePlan) {
                    $result[$count]["plan"][] = CFile::GetPath($idImagePlan);
                }
            } else {
                $result[$count]["plan"] = "";
            }
            if (is_array($arProps["ATT_ARPHOTO"]["VALUE"])) {
                foreach ($arProps["ATT_ARPHOTO"]["VALUE"] as $idImagePhoto) {
                    $result[$count]["photo"][] = CFile::GetPath($idImagePhoto);
                }
            } else {
                $result[$count]["photo"] = "";
            }

            $count++;

        }

    }

}

//var_dump($result);



echo json_encode($result);
//echo "</pre>";
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>