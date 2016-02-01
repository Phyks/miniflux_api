<?php if(!class_exists('raintpl')){exit;}?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Freeder</title>
		<link rel="stylesheet" href="http://localhost/miniflux_api/tpl/zen/css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_modal" );?>

		<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_menu" );?>

		<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_submenu" );?>

		<main class="main">
