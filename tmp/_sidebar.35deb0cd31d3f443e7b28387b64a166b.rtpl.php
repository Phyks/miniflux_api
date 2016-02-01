<?php if(!class_exists('raintpl')){exit;}?>


<aside class="Side">
	<header class="Side-logo Logo">
		<h1 class="Logo-h1"><a class="Logo-a" href="http://localhost/miniflux_api/index.php" title="Home"><img class="Logo-img" alt="Freeder" src="http://localhost/miniflux_api/tpl/default/img/logo_complete.svg"></a></h1>
	</header>

	<ul class="Side-menu Menu">
		<li class="Menu-li"><a href="http://localhost/miniflux_api/index.php" title="Home"><img src="http://localhost/miniflux_api/tpl/default/img/home.svg" alt="Home"></a></li>
		<li class="Menu-li"><a href="http://localhost/miniflux_api/%tag%/_sticky" title="Sticky articles"><img src="http://localhost/miniflux_api/tpl/default/img/stick.svg" alt="Sticky"></a></li>
	<?php if( !empty($user) ){ ?>

	<li class="Menu-li"><a href="http://localhost/miniflux_api/refresh.php?token=<?php echo generate_token('refresh'); ?>" title="Refresh"><img src="http://localhost/miniflux_api/tpl/default/img/sync.svg" alt="Refresh"></a></li>
		<li class="Menu-li"><a href="http://localhost/miniflux_api/settings.php#feedManagement" title="Settings"><img src="http://localhost/miniflux_api/tpl/default/img/settings.svg" alt="Settings"></a></li>
		<li class="Menu-li"><a href="http://localhost/miniflux_api/logout.php" title="Logout"><img src="http://localhost/miniflux_api/tpl/default/img/off.svg" alt="Logout"></a></li>
	<?php }else{ ?>

		<li><a href="http://localhost/miniflux_api/login.php">Login</a></li>
	<?php } ?>

	</ul>

	<form class="Side-mainForm MainForm">
		<input class="MainForm-Input Input" type="text" name="newTag" id="newTag" placeholder="Global search…"/>
		<button class="MainForm-Submit Submit Button"><!--<img src="http://localhost/miniflux_api/tpl/default/img/glass.png" alt="Search">-->Search</button>
	</form>

	<?php if( !empty($nb_entries) ){ ?>

	<p class="ItemsNumber <?php if( $view == '_home' ){ ?>UnreadNumber<?php } ?>"><span id="ItemsNumberCounter"><?php echo $nb_entries;?></span> item<?php if( $nb_entries> 1 ){ ?><span id="ItemsNumberPlural">s</span><?php } ?></p>
	<?php } ?>


	<?php if( !empty($user) && isset($nb_entries) ){ ?>

	<button class="Side-button Button red" onclick="if (window.confirm('Mark all items of the current view as read ?')) { tag_all(this, '_read'); }">Read all</button>
	<?php } ?>


	<ul class="Side-tagList TagList">
			<?php $counter1=-1; if( NULL !== get_tags(USER_TAGS) && is_array(get_tags(USER_TAGS)) && sizeof(get_tags(USER_TAGS)) ) foreach( get_tags(USER_TAGS) as $key1 => $value1 ){ $counter1++; ?>

				<li class="TagList-completeTag CompleteTag">
					<a class="TagList-tagName TagName" href="http://localhost/miniflux_api/%tag%/<?php echo tag_encode($value1['name']); ?>"><?php echo $value1['name'];?></a>
				</li>
			<?php } ?>

	</ul>

	<ul class="Side-feedList FeedList">
		<?php $counter1=-1; if( isset($feeds) && is_array($feeds) && sizeof($feeds) ) foreach( $feeds as $key1 => $value1 ){ $counter1++; ?>

			<li>
				<a class="FeedList-feed" href="http://localhost/miniflux_api/%feed%/<?php echo $value1['id'];?>" title="<?php echo $value1['description'];?>"><?php echo $value1['title'];?></a>
			</li>
		<?php } ?>

	</ul>

</aside>
