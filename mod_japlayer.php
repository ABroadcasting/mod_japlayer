<?php
# @version		$version 0.1 Amvis United Company Limited  $
# @copyright	Copyright (C) 2017 AUnited Co Ltd. All rights reserved.
# @license		MIT, see LICENSE.php
# Updated		5th January 2018
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

$module = JModuleHelper::getModule('mod_japlayer');
$moduleParams = new JRegistry($module->params);
$options['stream']   =   $moduleParams->get('stream', 0);
$options['title']   =   $moduleParams->get('title', 'APlayer');
$options['description']=$moduleParams->get('description', 'Default Music');
$options['stream']  =   $moduleParams->get('source', 'music.mp3');
$options['narrow']  =   $moduleParams->get('narrow', '0');
$options['autoplay']   =   $moduleParams->get('autoplay', 'false');
$options['pic']     =   $moduleParams->get('pic', '');
$options['color']   =   $moduleParams->get('color', '#fff');
$options['width']   =   $moduleParams->get('width', '100');
$options['measurement']   =   $moduleParams->get('measurement', 'px');

//Logical exceptions
if ($options['narrow'] == 1)
{
    $options['width'] = "0";
    $options['narrow'] = "true";
}
else
{
    $options['narrow'] = "false";
};

if ($options['autoplay'] == 1)
{
    $options['autoplay'] = "true";
}
else
{
    $options['autoplay'] = "false";
};

if($options['stream']){
    echo "";
};

/**
 * @param $options
 * @return string
 */
function StreamPlayer($options)
{
return '<div style="width:100%; background:'.$options['color'].'; text-align:center;" id="japlayer" class="aplayer"></div>
<script src="modules/mod_japlayer/APlayer.min.js"></script>
<script>
var ap = new APlayer({
    element: document.getElementById(\'japlayer\'),
    narrow: '.$options['narrow'].',
    autoplay: '.$options['autoplay'].',
    music: {
        title: \''.$options['title'].'\',
        author: \''.$options['description'].'\',
        url: \''.$options['stream'].'\',
        pic: \''.$options['pic'].'\'
    }
});
</script>';}
function Playlists($options){
    if($options['stream']){
return "<div>
<a href='modules/mod_japlayer/assests/playlist.php?name=".$options['title']."&pltype=m3u&stream=".$options['source']."'><img src='modules/mod_japlayer/assests/aimp3.svg' width='32px' /></a>
<a href='modules/mod_japlayer/assests/playlist.php?name=".$options['title']."&pltype=wpl&stream=".$options['source']."'><img src='modules/mod_japlayer/assests/wmp.svg' width='32px' /></a>
<a href='modules/mod_japlayer/assests/playlist.php?name=".$options['title']."&pltype=qtl&stream=".$options['source']."'><img src='modules/mod_japlayer/assests/quicktime.svg' width='32px' /></a>
<a href='modules/mod_japlayer/assests/playlist.php?name=".$options['title']."&pltype=xfps&stream=".$options['source']."'><img src='modules/mod_japlayer/assests/amarok.svg' width='32px' /></a>
</div>";}
else {return "";}
}
echo '<div style="width:'.$options['width'].$options['measurement'].';">'.StreamPlayer($options).Playlists($options).'</div>';

