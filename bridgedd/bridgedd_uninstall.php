<?php
/*
	BridgeDD Uninstall for phpBB
	Copyright � 2015 by Dion Designs.
	All Rights Reserved.
*/
define('IN_PHPBB', true); $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './'; $phpEx = substr(strrchr(__FILE__, '.'), 1); include($phpbb_root_path . 'common.' . $phpEx); if (!isset($_POST['xdelete']) || empty($config['xdelete'])) { trigger_error('NO_ADMIN'); } $sql = 'DROP TABLE bridgedd_xuser'; $db->sql_query($sql); $sql = 'DROP TABLE bridgedd_xpost'; $db->sql_query($sql); $sql = 'DELETE FROM ' . CONFIG_TABLE . " WHERE config_name = 'xdelete'"; $db->sql_query($sql); @unlink($phpbb_root_path . 'cache/data_global.php');