<?php if(!class_exists('raintpl')){exit;}?><?php if( !empty($value['authors']) ){ ?>

	<?php $remaining=$this->var['remaining']=count($value['authors']);?>

	<?php $counter1=-1; if( isset($value['authors']) && is_array($value['authors']) && sizeof($value['authors']) ) foreach( $value['authors'] as $key1 => $value1 ){ $counter1++; ?>

		<?php if( !empty($value1['uri']) ){ ?>

			<a href="http://localhost/miniflux_api/<?php echo $value1['uri'];?>"><?php echo $value1['name'];?></a>
		<?php }elseif( !empty($value1['email']) ){ ?>

			<a href="mailto:<?php echo $value1['email'];?>"><?php echo $value1['name'];?></a>
		<?php }elseif( !empty($value1['name']) ){ ?>

			<?php echo $value1['name'];?>

		<?php }else{ ?>

			Unknown
		<?php } ?>

		<?php $remaining=$this->var['remaining']=$remaining-1;?>

		<?php if( $remaining>1 ){ ?>, <?php }elseif( $remaining==1 ){ ?> and <?php } ?>

	<?php } ?>

<?php } ?>

