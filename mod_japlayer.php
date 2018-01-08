<?php
# @version		$version 0.1 Amvis United Company Limited  $
# @copyright	Copyright (C) 2017 AUnited Co Ltd. All rights reserved.
# @license		GNU/GPL, see LICENSE.php
# Updated		5th January 2017
#
# Site: http://aunited.ru
# Email: info@aunited.ru
# Phone: null
#
# Joomla! is free software. This version may have been modified pursuant
# to the GNU General Public License, and as distributed it includes or
# is derivative of works licensed under the GNU General Public License or
# other free or open source software licenses.
# See COPYRIGHT.php for copyright notices and details.

// no direct access
defined('_JEXEC') or die ('Restricted Access');
$exit = "No Player";

/**
 * @param $color
 * @param $case
 * @return string
 */
$module = JModuleHelper::getModule('mod_japlayer');
$moduleParams = new JRegistry($module->params);
$options['title']   =   $moduleParams->get('title', 'APlayer');
$options['description']=$moduleParams->get('description', 'Default Music');
$options['stream']  =   $moduleParams->get('param_name', 'music.mp3');
$options['narrow']  =   $moduleParams->get('param_name', 'false');
$options['pic']     =   $moduleParams->get('param_name', 'music.png');
$options['color']   =   $moduleParams->get('param_name', '#fff');
$options['width']   =   $moduleParams->get('param_name', '100%');
function StreamPlayer($options)
{
return '<div style="width:'.$options['width'].'; background:'.$options['color'].'; text-align:center;" id="aplayer1" class="aplayer"></div>
<script src="APlayer.min.js"></script>
<script>
var ap = new APlayer({
    element: document.getElementById(\'aplayer1\'),
    narrow: false,
    autoplay: false,
    music: {
        title: \''.$options['title'].' \',
        author: \''.$options['description'].' \',
        url: \''.$options['stream'].' \',
        pic: \''.$options['pic'].'\'
    }
});
</script>';}
echo $exit;
