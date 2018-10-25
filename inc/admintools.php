<?php
/**
* @package HandyPlugin
*/
namespace Inc;
if (file_exists( dirname(__FILE__) . '/../vendor/autoload.php')){
        require_once dirname(__FILE__).'/../vendor/autoload.php';
}
use Stripe\Stripe;
use Stripe\Product;
use Stripe\Plan;
use Stripe\Subscription;

Stripe::setApiKey("sk_test_T8lzOheZ2QQ1bJyckGUcf9Yt");

class AdminTools{
	public static function list_products(){
		echo '<h2>Products:</h2>';	
		echo Product::all();
	}	
	public static function list_plans(){
		echo '<h2>Plans:</h2>';
		echo Plan::all();
	}
	public static function create_usr(){
//		echo Subscription::create(array("customer" => "cus_DnO9x8FhbMsutK",
//			"items" => array(array("plan" => "plan_Dq7kTDvyqBmM1z", ), )));
	}
	public static function get_sub(){

		$sub = Subscription::retrieve("sub_Dq85oDuPH4vpsl");
		echo "<h2>Subscription:</h2>";
		echo $sub->canceled_at;
		echo "<br>";
		echo $sub->created;
		echo "<br>";
		echo $sub->plan;
	}
	public static function cancel_user(){
		$sub = Subscription::retrieve("sub_Dq85oDuPH4vpsl");
		echo "<h2>Cancel Subscription:</h2>";
		echo $sub->canceled_at;
		echo $sub->created;
		$sub->cancel_at_period_end=true;
		
		$sub->save();
		//$sub->cancel();
		echo "<br>";
		echo "<br>";
		echo $sub;
		
		
	}
	public static function upgrade_usr(){
		
		$sub = Subscription::retrieve("sub_Dq85oDuPH4vpsl");
		$plan = Plan::retrieve("plan_Dq7lCUpfAyX9OF");
		echo "<h2>Update Subscription:</h2>";
		$sub->plan =$plan;
		
		$sub->save();
	}
}
?>
