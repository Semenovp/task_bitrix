<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col">Описание</th>
        <th scope="col">Дата и время</th>
        <th scope="col">Статус</th>
        <th scope="col">Дейсвтие</th>
    </tr>
    </thead>
    <tbody>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <tr data-id="<?= $arItem['ID']; ?>">
            <th scope="row" class="id"><?= $arItem['ID']; ?></th>
            <td class="name"><?= $arItem['NAME']; ?></td>
            <td class="preview"><?= $arItem['PREVIEW_TEXT']; ?></td>
            <td><?= $arItem["TIMESTAMP_X"]; ?></td>
            <? if ($arItem["PROPERTIES"]["status"]["VALUE_XML_ID"] == "IN_WORK"): ?>
                <td class="status"><span class="badge badge-primary">В работе</span></td>
            <? else : ?>
                <td class="status"><span class="badge badge-success">Завершена</span></td>
            <? endif; ?>
            <td>
                <? if ($arItem["PROPERTIES"]["status"]["VALUE_XML_ID"] == "IN_WORK"): ?>
                    <a href="javascript:void(0);" class="check" data-id="<?= $arItem['ID']; ?>"><i class="fas fa-check-circle"></i></a>
                <? else : ?>
                    <a href="javascript:void(0);" class="uncheck" data-id="<?= $arItem['ID']; ?>"><i class="fas fa-check-circle red"></i></a>
                <? endif; ?>

                <a href="javascript:void(0);" class="edit" data-id="<?= $arItem['ID']; ?>" data-toggle="modal" data-target="#modal_edit" data-name="<?= $arItem["NAME"]; ?>" data-preview="<?= $arItem['PREVIEW_TEXT']; ?>"><i class="fas fa-edit"></i></a>
                <a href="javascript:void(0);" class="delete" data-id="<?= $arItem['ID']; ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>