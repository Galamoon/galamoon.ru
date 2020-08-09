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
<html class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <? $APPLICATION->ShowHead(); ?>
    <? CJSCore::Init(array('jquery2')); ?>
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

<? $APPLICATION->ShowPanel(); ?>


<header id="header">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/">Galamoon</a>
                <p>Да, мысли материализуются на самом деле!?</p>
            </div>
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top",
                [
                    "ALLOW_MULTI_SELECT"    => "N",
                    "CHILD_MENU_TYPE"       => "left",
                    "DELAY"                 => "Y",
                    "MAX_LEVEL"             => "2",
                    "MENU_CACHE_GET_VARS"   => [""],
                    "MENU_CACHE_TIME"       => "3600",
                    "MENU_CACHE_TYPE"       => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE"        => "top",
                    "USE_EXT"               => "Y"
                ]
            ); ?>
        </div>
    </div>
</header>

<section class="relative sub-header">
    <? $APPLICATION->ShowViewContent('sub-header'); ?>
</section>
