<?
/**
 * @global $APPLICATION
 * @global $USER
 */
if ( ! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <? $APPLICATION->ShowHead(); ?>
    <? if ($USER->IsAdmin()) {
        $arAssets = \Bitrix\Main\UI\Extension::getAssets('galamoon.assets');
        foreach ($arAssets['css'] as $sCssFile) {
            if ( ! file_exists($_SERVER['DOCUMENT_ROOT'] . $sCssFile)) {
                continue;
            }
            echo sprintf('<link rel="stylesheet" href="%s">', $sCssFile);
        }
        foreach ($arAssets['js'] as $sjsFile) {
            if ( ! file_exists($_SERVER['DOCUMENT_ROOT'] . $sjsFile)) {
                continue;
            }
            echo sprintf('<script src="%s"></script>', $sjsFile);
        }
    } else {
        \Bitrix\Main\UI\Extension::load('galamoon.assets');
    } ?>
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
</head>

<body>
<div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
</div>