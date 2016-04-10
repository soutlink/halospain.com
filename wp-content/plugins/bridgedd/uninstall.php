<?php
/*
	BridgeDD Uninstall
	Copyright � 2015 by Dion Designs.
	All Rights Reserved.
*/
if (!defined('WP_UNINSTALL_PLUGIN')) { die('ERROR 999'); } define('BDD_SEP', (defined('DIRECTORY_SEPARATOR') && DIRECTORY_SEPARATOR != '') ? DIRECTORY_SEPARATOR : '/'); $file_ary = glob(ABSPATH . 'bridgedd' . BDD_SEP . '*'); if (!empty($file_ary)) { foreach ($file_ary as $file) { @unlink($file); } } @rmdir(ABSPATH . 'bridgedd'); delete_option('bridgedd'); delete_option('bridgedd_redirect'); delete_option('bridgedd_forums'); delete_option('bridgedd_config'); delete_option('xpost_config'); delete_option('widget_bridgedd_widget_login_logout'); delete_option('widget_bridgedd_widget_recent_topics'); $phpbb_info = get_option('bridgedd_phpbb'); if ($phpbb_info) { $payload = 'xdelete=true'; $ch = curl_init($phpbb_info['url'] . 'bridgedd_uninstall.php'); curl_setopt($ch, CURLOPT_HEADER, false); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); $res = curl_exec($ch); curl_close($ch); @unlink($phpbb_info['path'] . 'bridgedd_uninstall.php'); delete_option('bridgedd_phpbb'); }