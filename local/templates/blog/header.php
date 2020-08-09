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
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="price.html">Pricing</a></li>
                    <li class="menu-has-children"><a href="">Blog</a>
                        <ul>
                            <li><a href="blog-home.html">Blog Home</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Pages</a>
                        <ul>
                            <li><a href="elements.html">Elements</a></li>
                            <li class="menu-has-children"><a href="">Level 2 </a>
                                <ul>
                                    <li><a href="#">Item One</a></li>
                                    <li><a href="#">Item Two</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<? $APPLICATION->ShowViewContent('sub_header'); ?>