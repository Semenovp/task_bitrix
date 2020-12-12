<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php" );
CModule::IncludeModule("iblock");

var_dump($_POST);
$ELEMENT_ID = $_POST['ID'];  // код элемента
$PROPERTY_CODE = "status";  // код свойства
$PROPERTY_VALUE = "SUCCSESS";  // значение свойства

$dbr = CIBlockElement::GetList(array(), array("=ID"=>$ELEMENT_ID), false, false, array("ID", "IBLOCK_ID"));
if ($dbr_arr = $dbr->Fetch())
{
    $IBLOCK_ID = $dbr_arr["IBLOCK_ID"];
    CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);
}