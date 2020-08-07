#!/usr/bin/env php
<?php

$pwdFilePath = bx_cli_absolute_path(getcwd().DIRECTORY_SEPARATOR.$_SERVER['SCRIPT_NAME']);
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(dirname(dirname($pwdFilePath))));

function bx_cli_absolute_path($path)
{
	$path = str_replace(DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, $path);
	$parts = explode(DIRECTORY_SEPARATOR, $path);
	$validParts = [];

	foreach ($parts as $part)
	{
		if ($part == '.')
		{
			continue;
		}
        elseif ($part == '..')
		{
			array_pop($validParts);
		}
		else
		{
			$validParts[] = $part;
		}
	}

	return join(DIRECTORY_SEPARATOR, $validParts);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/modules/sprint.migration/tools/migrate.php';