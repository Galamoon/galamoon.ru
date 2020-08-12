<?php

namespace Galamoon\Ru\Event;

/**
 * Class EventManager - класс
 *
 * @package Galamoon\Ru\Event
 */
class EventManager
{
    /**
     * Регистрация обработчиков события
     *
     * @return boolean
     */
    public function bindEvents()
    {
        $sPath = __DIR__ . '/handlers';
        if ( ! is_dir($sPath)) {
            return false;
        }

        $sCacheId   = filemtime($sPath);
        $sCachePath = str_replace(["\\", "::"], "/", __METHOD__);
        $obCache    = new \CPHPCache;

        $arEvents = [];
        if ($obCache->InitCache(3600, $sCacheId, $sCachePath)) {
            $arEvents = $obCache->GetVars();
        } elseif ($obCache->StartDataCache()) {
            global $CACHE_MANAGER;
            $CACHE_MANAGER->StartTagCache($sCachePath);
            $classNameSpace = 'Galamoon\Ru\Event\Handlers';
            $reader         = new \Bitrix\Main\Annotations\AnnotationReader();

            $arClassesList = glob($sPath . "/*.php");
            $arClassesList = array_map(function ($sFile) {
                return str_replace('.php', '', basename($sFile));
            }, $arClassesList);

            foreach ($arClassesList as $class) {
                $class = $classNameSpace . '\\' . $class;
                try {
                    $oReflectionClass = new \ReflectionClass($class);
                    foreach ($oReflectionClass->getMethods() as $oReflectionMethod) {
                        $arAnnotations = $reader->getMethodAnnotations($oReflectionMethod);
                        if (
                            isset($arAnnotations['Event']) &&
                            ! empty($arAnnotations['Event']['module']) &&
                            ! empty($arAnnotations['Event']['event'])) {

                            $arEvents[] = [
                                $arAnnotations['Event']['module'],
                                $arAnnotations['Event']['event'],
                                [$oReflectionMethod->getDeclaringClass()->getName(), $oReflectionMethod->getName()]
                            ];
                        }
                    }
                } catch (\ReflectionException $e) {
                    //File not a class
                }
                $CACHE_MANAGER->RegisterTag("galamoon.ru.ListEventHandlers");
                $CACHE_MANAGER->EndTagCache();
            }

            $obCache->EndDataCache($arEvents);
        }

        $oEventManager = \Bitrix\Main\EventManager::getInstance();
        foreach ($arEvents as $arEvent) {
            $oEventManager->addEventHandler($arEvent[0], $arEvent[1], $arEvent[2]);
        }

    }

}