<?php

class galamoon_ru extends CModule
{
    var $MODULE_ID = "galamoon.ru";
    var $MODULE_NAME;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;
    var $MODULE_GROUP_RIGHTS = "Y";

    function __construct()
    {
        $arModuleVersion = [];

        include(__DIR__ . "/version.php");

        $this->MODULE_VERSION      = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

        $this->MODULE_NAME        = "galamoon.ru";
        $this->MODULE_DESCRIPTION = "Функционал для сайта galamoon.ru";
        $this->PARTNER_NAME       = 'Galamoon';
        $this->PARTNER_URI        = 'https://galamoon.ru';
    }

    function DoInstall()
    {
        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
        $this->InstallEvents();
    }

    function DoUninstall()
    {
        $this->unInstallEvents();
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    function InstallEvents()
    {
        $oEventManager = \Bitrix\Main\EventManager::getInstance();//OnPageStart
    }

    function unInstallEvents()
    {
        $oEventManager = \Bitrix\Main\EventManager::getInstance();//OnPageStart
    }
}
