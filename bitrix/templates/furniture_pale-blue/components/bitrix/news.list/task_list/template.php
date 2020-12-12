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
<!--        <pre>-->
<!--            --><?// var_dump($arItem); ?>
<!--        </pre>-->
        <tr>
            <th scope="row"><?= $arItem['ID']; ?></th>
            <td><?= $arItem['NAME']; ?></td>
            <td><?= $arItem['PREVIEW_TEXT']; ?></td>
            <td><?= $arItem["TIMESTAMP_X"]; ?></td>
            <? if ($arItem["PROPERTIES"]["status"]["VALUE_XML_ID"] == "IN_WORK"): ?>
                <td><span class="badge badge-primary">В работе</span></td>
            <? else : ?>
                <td><span class="badge badge-success">Завершена</span></td>
            <? endif; ?>
            <td>
                <a href=""><i class="fas fa-check-circle"></i></a>
                <a href=""><i class="fas fa-edit"></i></a>
                <a href=""><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>