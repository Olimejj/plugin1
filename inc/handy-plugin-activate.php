<?php
/**
*@package HandyPlugin
*/

class HandyPluginActivate
{
	public static function activate(){
		flush_rewrite_rules();
	}
}

