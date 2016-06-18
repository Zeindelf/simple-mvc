<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		{if isset($variables.headerTitle)}
			<title>{$variables.headerTitle} | {$smarty.const.SITE_NAME}</title>
		{else}
			<title>{$smarty.const.SITE_NAME}</title>
		{/if}

		<meta name="description" content="{$smarty.const.SITE_DESC}">

		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{$smarty.const.BASE_CSS}/style.css">
	</head>

	<body>