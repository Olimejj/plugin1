<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
if (file_exists( dirname(__FILE__) . '/../vendor/autoload.php')){
        require_once dirname(__FILE__).'/../vendor/autoload.php';
}else{ echo "its not workig";}
use Inc\AdminTools;
?>


<h1>Handy Plugin</h1>

<div class='handy_products'>
	
	<?php AdminTools::list_products(); ?>
</div> 
<div class='handy_plans'>
	
	<?php AdminTools::list_plans(); ?>
</div> 
<div class='create_sub'>
	
	<?php AdminTools::create_usr(); ?>
</div> 
<div class='get_sub'>
	<?php AdminTools::get_sub(); ?>

</div>
<div class='upgrade_sub'>
	<?php AdminTools::upgrade_usr(); ?>

</div>
<div class='get_sub'>
	<?php AdminTools::get_sub(); ?>

</div>
