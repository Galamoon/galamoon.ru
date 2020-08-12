<?php

namespace Galamoon\Ru\Event;

class EventManager
{
    /**
     * todo: необходимо закешировать выборку классов и регистрацию события
     * @return array
     */
    public static function bindEvents()
    {
        $oEventManager = \Bitrix\Main\EventManager::getInstance();
        $reader        = new \Bitrix\Main\Annotations\AnnotationReader();

        $classNameSpace = 'Galamoon\Ru\Event\Handlers';

        $sPath = __DIR__ . '/handlers';
        if ( ! is_dir($sPath)) {
            return [];
        }

        $arClassesList = glob($sPath . "/*.php");
        $arClassesList = array_map(function ($sFile) {
            return str_replace('.php', '', basename($sFile));
        }, $arClassesList);


        foreach ($arClassesList as $class) {
            $class            = $classNameSpace . '\\' . $class;
            try {
                $oReflectionClass = new \ReflectionClass($class);
            } catch (\ReflectionException $e) {
                //File not a class
            }
            foreach ($oReflectionClass->getMethods() as $oReflectionMethod) {
                $arAnnotations = $reader->getMethodAnnotations($oReflectionMethod);
                if (
                    isset($arAnnotations['Event']) &&
                    ! empty($arAnnotations['Event']['module']) &&
                    ! empty($arAnnotations['Event']['event'])) {
                    $oEventManager->addEventHandler(
                        $arAnnotations['Event']['module'],
                        $arAnnotations['Event']['event'],
                        [$oReflectionMethod->getDeclaringClass()->getName(), $oReflectionMethod->getName()]
                    );
                }
            }
        }
    }

}