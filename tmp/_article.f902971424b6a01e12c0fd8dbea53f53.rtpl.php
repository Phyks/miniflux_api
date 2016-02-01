<?php if(!class_exists('raintpl')){exit;}?>




<?php $entry_feed=$this->var['entry_feed']=get_feed_from_entry($value, $feeds);?>

<article class="article" id="entry-<?php echo $value['id'];?>">
    <div class="article--wrapper">
        <nav class="article--nav horizontal-nav">
            <div class="article--nav-wrapper">
                <button class="horizontal-nav--item"><img class="icon" alt="More" src="http://localhost/miniflux_api/tpl/zen/img/plus.svg"/></button>
                <button class="horizontal-nav--item"><img class="icon" alt="Share" src="http://localhost/miniflux_api/tpl/zen/img/share.svg"/></button>
                <button class="horizontal-nav--item close-btn"><img class="icon" alt="Close" src="http://localhost/miniflux_api/tpl/zen/img/close.svg"/></button>
            </div>
        </nav>
        <h1 class="article--title">
            <a href="<?php echo get_entry_link($value); ?>"><?php echo $value['title'];?></a>
        </h1>
        <h2 class="article--info">
            <a href="http://localhost/miniflux_api/feed/<?php echo $entry_feed['id'];?>"><?php echo $entry_feed['title'];?></a>
        </h2>
        <p class="article--subinfo">
            <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_author" );?><br/>
            <time datetime="">
                <?php echo format_date($value['updated']); ?>

            </time>
        </p>
        <div class="article--content">
            <?php echo $value['content'];?>

        </div>
    </div>
</article>
