<?php

class galamoon_blocks extends CModule
{
    var $MODULE_ID = "galamoon.blocks";
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

        $this->MODULE_NAME        = "Galamoon block";
        $this->MODULE_DESCRIPTION = "Функционал для блоков контента";
        $this->PARTNER_NAME       = 'Galamoon';
        $this->PARTNER_URI        = 'https://galamoon.ru';
    }

    function DoInstall()
    {
        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
    }

    function DoUninstall()
    {
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}
