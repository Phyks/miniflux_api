<?php if(!class_exists('raintpl')){exit;}?>









<aside class="menu">
    <div class="menu--wrapper">
        <div class="menu--logo">
            <a href="http://localhost/miniflux_api/"><img alt="freeder" src="http://localhost/miniflux_api/tpl/zen/img/logo.svg" class="icon" /></a>
        </div>
        
        <?php if( $active_menu!='hidden' ){ ?>


        <nav class="menu--nav vertical-nav">
            <?php if( $active_menu=='home' ){ ?>

            <div class="vertical-nav--arrow"><img class="icon" alt="Settings" src="http://localhost/miniflux_api/tpl/zen/img/arrow.svg"/></div>
            <?php } ?>


            <a href="http://localhost/miniflux_api/" class="vertical-nav--item"><img class="icon" alt="Home" src="http://localhost/miniflux_api/tpl/zen/img/home.svg"/></a>

            <?php if( $active_menu=='list' ){ ?>

            <div class="vertical-nav--arrow"><img class="icon" alt="Settings" src="http://localhost/miniflux_api/tpl/zen/img/arrow.svg"/></div>
            <?php } ?>

            
            <button class="vertical-nav--item toggle-submenu" id="open-submenu-list"><img class="icon" alt="Feeds" src="http://localhost/miniflux_api/tpl/zen/img/list.svg"/></button>

            <?php if( $active_menu=='settings' ){ ?>

            <div class="vertical-nav--arrow"><img class="icon" alt="Settings" src="http://localhost/miniflux_api/tpl/zen/img/arrow.svg"/></div>
            <?php } ?>

            
            <a href="http://localhost/miniflux_api/settings.php" class="vertical-nav--item"><img class="icon" alt="Settings" src="http://localhost/miniflux_api/tpl/zen/img/settings.svg"/></a>

            <?php if( $active_menu=='more' ){ ?>

            <div class="vertical-nav--arrow"><img class="icon" alt="Settings" src="http://localhost/miniflux_api/tpl/zen/img/arrow.svg"/></div>
            <?php } ?>

            
            <button class="vertical-nav--item toggle-submenu" id="open-submenu-more"><img class="icon" alt="More" src="http://localhost/miniflux_api/tpl/zen/img/plus_big.svg"/></button>
        </nav>

        <?php } ?>

    </div>
</aside>