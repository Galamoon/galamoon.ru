<?php

namespace Galamoon\Ru\Event\Handlers;

class ClearCache
{
    /**
     * Очистка кеша модуля по запросу пользователя
     *
     * @Event(module=main, event=OnBeforeProlog)
     */
    public function OnUserQueryClear()
    {
        global $USER, $CACHE_MANAGER;

        if (strtoupper($_GET['clear_cache']) === 'Y' && $USER->CanDoOperation('cache_control')) {
            $CACHE_MANAGER->ClearByTag("galamoon.ru.ListEventHandlers");//Сброс кеша зарегистрированных обработчиков событий
        }
    }
}