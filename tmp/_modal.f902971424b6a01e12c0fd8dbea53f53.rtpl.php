<?php if(!class_exists('raintpl')){exit;}?><?php if( empty($error) ){ ?>

	<?php $type=$this->var['type']='hidden';?>

	<?php $title=$this->var['title']='';?>

	<?php $content=$this->var['content']='';?>

<?php }else{ ?>

	<?php $type=$this->var['type']=$error['type'];?>

	<?php $title=$this->var['title']=$error['title'];?>

	<?php $content=$this->var['content']=$error['content'];?>

<?php } ?>

<div class="modalbox <?php echo $type;?>">
	<div class="modalbox--wrapper1">
	<div class="modalbox--wrapper2">
		<h1 class="modalbox--title"><?php echo $title;?></h1>
		<div class="modalbox--content">
			<?php echo $content;?>

		</div>
		<button class="modalbox--close button">Ok</button>
	</div>
	</div>
</div>