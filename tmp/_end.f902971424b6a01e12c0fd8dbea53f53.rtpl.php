<?php if(!class_exists('raintpl')){exit;}?>



		<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "_include_end" );?>


		</main>
    </body>
</html>