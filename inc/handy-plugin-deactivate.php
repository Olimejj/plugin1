<?php
/**
*@package HandyPlugin
*/

class HandyPluginDeactivate
{
	public static function deactivate(){
		flush_rewrite_rules();
	}
}

