<?php

namespace Sprint\Migration;


class VersionInstallGalamoonRuModule20200811102531 extends \Galamoon\Migration\Migration
{
    protected $description = "Установка модуля galamoon.ru";

    protected $moduleVersion = "3.17.1";

    public function up()
    {
        $oModule = \CModule::CreateModuleObject('galamoon.ru');
        $oModule->DoInstall();
    }

    public function down()
    {
        $oModule = \CModule::CreateModuleObject('galamoon.ru');
        $oModule->DoUninstall();
    }
}
