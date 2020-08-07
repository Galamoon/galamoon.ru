<?php

namespace Galamoon\Helper;

class Admin
{
    public static function isPanelShowed()
    {
        global $APPLICATION;
        return $APPLICATION->PanelShowed || $APPLICATION->showPanelWasInvoked;
    }
}