<?php
if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

return [
    'css'       => [
        './dist/assets.bundle.css',
        './dist/vendor.bundle.css'
    ],
    'js'        => [
        './dist/assets.bundle.js',
        './dist/vendor.bundle.js'
    ],
    'rel'       => [
        'main.core',
    ],
    'skip_core' => false,
];