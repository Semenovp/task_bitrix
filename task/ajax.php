<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php" );
CModule::IncludeModule("iblock");
// Помечаем задачу выполненой
if ($_POST['action'] == 'check') {
    $PROP = array();
    $PROP[9] = 6;
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(),
        "IBLOCK_SECTION" => false,
        "PROPERTY_VALUES" => $PROP,
        "ACTIVE"         => "Y",
    );
    $PRODUCT_ID = $_POST['id'];
    $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
    if ($res) {
        echo "success";
    }
    else {
        echo "Error: " . $el->LAST_ERROR;
    }
}
// Возвращаем задачу обратно в работу
if ($_POST['action'] == 'in_work') {
    $PROP = array();
    $PROP[9] = 5;
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(),
        "IBLOCK_SECTION" => false,
        "PROPERTY_VALUES" => $PROP,
        "ACTIVE"         => "Y",
    );
    $PRODUCT_ID = $_POST['id'];
    $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
    if ($res) {
        echo "success";
    }
    else {
        echo "Error: " . $el->LAST_ERROR;
    }
}
// Создание новой задачи
if($_POST['action'] == 'create') {
    $el = new CIBlockElement;
    $PROP = array();
    $PROP[9] = 5;
    $arLoadProductArray = Array(
        "MODIFIED_BY" => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID" => 5,
        "PROPERTY_VALUES" => $PROP,
        "NAME" => $_POST['name'],
        "ACTIVE" => "Y",            // активен
        "PREVIEW_TEXT" => $_POST['preview_text'],
    );

    if ($PRODUCT_ID = $el->Add($arLoadProductArray))
        echo $PRODUCT_ID;
    else
        echo "error";
}
// Удаляем задачу
if ($_POST['action'] == 'delete') {
    if(CIBlockElement::Delete($_POST['id'])) {
        echo "success";
    }
}
// Редактирование задачи
if ($_POST['action'] == 'edit') {
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(),
        "IBLOCK_SECTION" => false,
        "NAME"           => $_POST['name'],
        "PREVIEW_TEXT"   => $_POST['preview_text'],
        "ACTIVE"         => "Y",
    );
    $PRODUCT_ID = $_POST['id'];
    $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
    if ($res) {
        echo "success";
    }
    else {
        echo "Error: " . $el->LAST_ERROR;
    }
}
?>
