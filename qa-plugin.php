<?php

/*
	Plugin Name: Thumbnail in list Plugin
	Plugin URI:
	Plugin Description: A thumbnail is shown to a list of questions
	Plugin Version: 1.0
	Plugin Date: 2016-07-14
	Plugin Author: 38qa.net
	Plugin Author URI: http://38qa.net/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: https://github.com/yshiga/q2a-thumbnail-in-list
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

// layer
qa_register_plugin_layer('q2a-thumbnail-in-list-layer.php','Thumbnail in List Layer');
