<?php

require_once('lib/PhpTemplate.php');
require_once('lib/helper.php');
require_once('lib/config.php');

$tpl = new PhpTemplate('template/page.phtml');
echo $tpl->render(array(
	'page' => 'rooms',
	'baseurl' => baseurl(),
	'title' => 'Overview',

	'rooms' => $GLOBALS['CONFIG']['ROOMS'],
));
