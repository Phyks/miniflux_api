<?php if(!class_exists('raintpl')){exit;}?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Freeder</title>
		<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_include" );?>

	</head>
	<body>
		<div class="flex">
			<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_sidebar" );?>

			<main class="MainContent">