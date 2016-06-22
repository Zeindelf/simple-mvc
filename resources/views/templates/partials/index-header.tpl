{assign var=siteName value=Config::get('html.siteName')}
{assign var=baseUrl value=Config::get('html.baseUrl')}

<div class="main__header">
	<header class="container header__container">
		<div class="header__title">
			<a title="{$siteName}" href="{$baseUrl}">
				<h1>{$siteName}</h1>
				<p>Main Header</p>
			</a>
		</div><!-- /.header__title -->

		{include file="partials/index-nav.tpl"}

	</header>
</div><!-- /.main__header -->