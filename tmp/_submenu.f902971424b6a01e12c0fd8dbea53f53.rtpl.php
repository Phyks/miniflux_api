<?php if(!class_exists('raintpl')){exit;}?>

<aside class="submenu feed-submenu">
    <div class="submenu--wrapper">
        <div class="submenu--search searchbar">
            <input class="searchbar--input" type="search" placeholder="Search…"/>
            <img class="searchbar--icon" alt="" src="http://localhost/miniflux_api/tpl/zen/img/search.svg"/>
        </div>

        <section id="submenu-list">

            <div class="submenu--section">
                <h4 class="submenu--section-title">Feeds</h4>
                <ul class="submenu--link-list">
                </ul>
            </div>

        </section>

        <section id="submenu-more">
            <div class="submenu--section">
                <h4 class="submenu--section-title">Synchronization</h4>
            </div>
            <div class="submenu--section">
                <h4 class="submenu--section-title">New feed</h4>
				<form method="post" action="http://localhost/miniflux_api/settings.php">
					<input type="text" name="feed_url" id="feed_url" placeholder="Feed URL" />
					<input type="hidden" name="feed_post" id="feed_post" value="" />
					<input type="submit" value="Add" style="margin-top: 0; margin-bottom: 1em" />
				</form>
            </div>
            <div class="submenu--section">
                <h4 class="submenu--section-title">Entries</h4>
				<p>
					<a href="" class="link-btn read-all">Mark all as read</a>
				</p>
            </div>
        </section>

    </div>
</aside>
