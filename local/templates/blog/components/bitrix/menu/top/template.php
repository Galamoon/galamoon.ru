<?php
/**
 * @var $arResult
 */
$previousLevel = 0;
?>
<nav id="nav-menu-container">
    <ul class="nav-menu">
        <? foreach ($arResult as $arItem): ?>
            <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
                <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
            <? endif ?>

            <? if ($arItem["IS_PARENT"]): ?>
                <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                    <?= "<li class='menu-has-children'>" ?>
                    <a href="<?= $arItem["LINK"] ?>"
                       class="<?= $arItem["SELECTED"] ? 'menu-active' : '' ?>"><?= $arItem["TEXT"] ?></a>
                    <?= "<ul>" ?>
                <? else: ?>
                    <? $isSelected = $arItem['SELECTED'] ? 'menu-active' : '' ?>
                    <?= "<li class='{$isSelected}'>" ?>
                    <a href="<?= $arItem["LINK"] ?>" class="parent"><?= $arItem["TEXT"] ?></a>
                    <?= "<ul>" ?>
                <? endif ?>
            <? else: ?>
                <? if ($arItem["PERMISSION"] > "D"): ?>
                    <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                        <li class="menu-has-children">
                            <a href="<?= $arItem["LINK"] ?>"
                               class="<?= $arItem["SELECTED"] ? 'menu-active' : '' ?>"><?= $arItem["TEXT"] ?></a>
                        </li>
                    <? else: ?>
                        <li class="<?= $arItem["SELECTED"] ? 'menu-active' : '' ?>">
                            <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                        </li>
                    <? endif ?>
                <? endif ?>
            <? endif ?>

            <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
        <? endforeach ?>

        <? if ($previousLevel > 1): ?>
            <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
        <? endif ?>
    </ul>
</nav>
