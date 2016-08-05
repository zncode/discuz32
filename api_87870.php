<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: api.php 33591 2013-07-12 06:39:49Z andyzheng $
 */

header('Expires: '.gmdate('D, d M Y H:i:s', time() + 60).' GMT');
define('IN_API', true);
define('CURSCRIPT', 'api');

loadcore();

$tid = intval($_GET['tid']);
$type = $_GET['type'];


switch ($type) {
	case 'forum':
		include_once libfile('function/forum');
		break;

	case 'thread':
		include_once libfile('function/forum');		
		$threads = get_thread_by_tid($tid);
		var_dump($threads);die();

		break;	

	default:
		include_once libfile('function/forum');
		break;
}






function loadcore() {
	global $_G;
	require_once './source/class/class_core.php';

	$discuz = C::app();
	$discuz->init_cron = false;
	$discuz->init_session = false;
	$discuz->init();
}

?>