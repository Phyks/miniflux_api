<?php if(!class_exists('raintpl')){exit;}?><?php $active_menu=$this->var['active_menu']='home';?>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_begin" );?>


<article class="article<?php if( !empty($entries) ){ ?> hidden<?php } ?> nothing-new">
    <div class="article--wrapper">
        <?php if( empty($feeds) ){ ?>

            <h1 class="article--title">Welcome to Freeder!</h1>
            <h2 class="article--info">It seems that you don't follow any feed</h2>
            <div class="article--content">
                <p>
                    You can add a new feed through the <a href="http://localhost/miniflux_api/settings.php#tab-feeds">Feeds settings</a> page.<br/>
                    You can also import your feed from another reader thanks to <a href="http://localhost/miniflux_api/settings.php#tab-import">OPML import</a>.
                </p>
            </div>
        <?php }else{ ?>

            <h1 class="article--title">Nothing new!</h1>
            <h2 class="article--info">You have no more unread entry</h2>
        <?php } ?>

    </div>
</article>

<?php $counter1=-1; if( isset($entries) && is_array($entries) && sizeof($entries) ) foreach( $entries as $key1 => $value1 ){ $counter1++; ?>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->assign( "key", $key1 ); $tpl->assign( "value", $value1 );$tpl->draw( "_article" );?>

<?php } ?>


<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_end" );?>

