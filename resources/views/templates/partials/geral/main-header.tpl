<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		{assign var=baseCss value=Config::get('html.baseCss')}
		{assign var=siteName value=Config::get('html.siteName')}
		{assign var=siteDesc value=Config::get('html.siteDesc')}

		{if isset($variables.headerTitle)}
			<title>{$variables.headerTitle} | {$siteName}</title>
		{else}
			<title>{$siteName}</title>
		{/if}

		<meta name="description" content="{$siteDesc}">

		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{$baseCss}/style.css">
	</head>

	<body>