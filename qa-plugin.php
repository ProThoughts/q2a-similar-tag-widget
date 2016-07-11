<?php

/*
	Plugin Name: Similar Tag Widget Plugin
	Plugin URI:
	Plugin Description: Displary similar tag widget
	Plugin Version: 1.0
	Plugin Date: 2016-07-11
	Plugin Author: 38qa.net
	Plugin Author URI: http://www.question2answer.org/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI:
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

// widget
qa_register_plugin_module('widget', 'qa-similar-tag-widget.php', 'qa_similar_tag_widget', 'Similar Tag Widget');
