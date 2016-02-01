<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_begin" );?>


	<?php if( empty($entries) ){ ?>

	<article class="Article system">
		<div class="ArticleContent">
			<?php if( empty($feeds) ){ ?>

			<h1>Welcome in Freeder!</h1>
			<h4>It seems that you don't follow any feed!</h4>
			<p>
				You can add a feed through the <a href="http://localhost/miniflux_api/settings.php#feedManagement">Feeds settings</a> page.<br/>
				You can also import your feed from another reader thanks to <a href="http://localhost/miniflux_api/settings.php#importexport">OPML import</a>.
			</p>
			<?php }else{ ?>

			<h1>Nothing new</h1>
			<p>
				You have no more unread entry!
			</p>
			<?php } ?>

		</div>
	</article>
	<?php } ?>

	<?php $counter1=-1; if( isset($entries) && is_array($entries) && sizeof($entries) ) foreach( $entries as $key1 => $value1 ){ $counter1++; ?>

		<?php $entry_feed=$this->var['entry_feed']=get_feed_from_entry($value1, $feeds);?>

		<article class="Article<?php if( is_tag('_read', $value1) ){ ?> read<?php } ?>" id="<?php echo $value1['id'];?>">
			<nav class="Controls">
				<?php if( !empty($user) ){ ?>

					<?php if( !is_tag('_read', $value1) ){ ?>

						<button class="Controls-button Button red Read-button" onclick="tag_entry(this, <?php echo $value1['id'];?>, '_read')">Read</button>
					<?php }else{ ?>

						<button class="Controls-button Button red Read-button" onclick="untag_entry(this, <?php echo $value1['id'];?>, '_read')">Unread</button>
					<?php } ?>

					<?php if( !is_tag('_sticky', $value1) ){ ?>

						<button class="Controls-button Button darkgrey Stick-button" onclick="tag_entry(this, <?php echo $value1['id'];?>, '_sticky')">Stick</button>
					<?php }else{ ?>

						<button class="Controls-button Button darkgrey Stick-button" onclick="untag_entry(this, <?php echo $value1['id'];?>, '_sticky')">Unstick</button>
					<?php } ?>

					<button class="Controls-button Button green Share-button" onclick="">Share</button>
				<?php } ?>


				<div class="ArticleTags">
					<img class="DisplayTagsButton" alt="display the tag list" src="http://localhost/miniflux_api/tpl/default/img/tag.svg">
					<div class="ArticleTagsList">
						<ul class="Article-tagList TagList">
							<?php $counter2=-1; if( isset($value1['tags']) && is_array($value1['tags']) && sizeof($value1['tags']) ) foreach( $value1['tags'] as $key2 => $value2 ){ $counter2++; ?>

								<li class="TagList-completeTag CompleteTag">
									<a class="TagList-tagName TagName" href="http://localhost/miniflux_api/%tag%/<?php echo tag_encode($value2['name']); ?>"><?php echo $value2['name'];?></a>
								</li>
							<?php } ?>

						</ul>

						<?php if( !empty($user) ){ ?>

							<form class="Article-mainForm MainForm" action="" onsubmit="return tag_form(this, <?php echo $value1['id'];?>, '/%tag%/');">
								<input class="MainForm-Input Input grey" type="text" name="newTag" id="newTag" placeholder="Tag…"/>
								<button class="MainForm-Submit Submit Button">Tag</button>
							</form>
						<?php } ?>

					</div>
				</div>
			</nav>

			<div class="ArticleContent">
				<div class="Article-share Share">
					<ul class="Share-services Services">
					<?php $counter2=-1; if( NULL !== get_sharing_options() && is_array(get_sharing_options()) && sizeof(get_sharing_options()) ) foreach( get_sharing_options() as $key2 => $value2 ){ $counter2++; ?>

						<li><a class="Share-link Button green" href="<?php echo $value2['url'];?><?php echo get_entry_link($value1); ?>"><?php echo $value2['type'];?></a></li>
					<?php } ?>

					</ul>
				</div>

				<h1><a href="<?php echo get_entry_link($value1); ?>" <?php if( $config->open_items_new_tab != 0 ){ ?>target="_blank"<?php } ?>><?php echo $value1['title'];?></a></h1>
				<div class="FeedInfo">
					In <a href="http://localhost/miniflux_api/feed/<?php echo $entry_feed['id'];?>"><?php echo $entry_feed['title'];?></a><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->assign( "key", $key1 ); $tpl->assign( "value", $value1 );$tpl->draw( "_author" );?><br/>
					<time datetime="<?php echo date(DATE_ATOM,$value1['pubDate']); ?>"><?php echo format_date($value1['pubDate']); ?></time>
				</div>
				<div><?php echo $value1['displayed_content'];?></div>
			</div>

		</article>
	<?php } ?>


	<p><?php echo $nb_pages;?> page<?php echo $nb_pages > 1 ? 's' : '';?></p>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_end" );?>

