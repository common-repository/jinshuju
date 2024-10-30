<?php
/*
Plugin Name: 金数据 [Jinshuju Shortcode Plugin]
Description: 更加方便的在wordpress中嵌入您的金数据表单，使用方法非常简单，只需要在文章编辑页面写入代码即可： [jinshuju form="WXDJRa" height="458"]. 代码可以在您金数据对应表单的分享页面拷贝粘贴。Enable shortcode to embed Jinshuju( https://jinshuju.net ) forms. Usage: <code>[jinshuju form="WXDJRa" height="458"]</code>. This code is available to copy and paste directly on Jinshuju Share Page.
Version: 1.0
License: GPL
Author: Roody / Jinshuju
Author URI: https://jinshuju.net
*/

function createJinshujuEmbedJS($atts, $content = null) {
	extract(shortcode_atts(array(
		'form'   => 'WXDJRa',
		'height'   => '500'
	), $atts));

	$JSEmbed =  "<script src='https://jinshuju.net/f/$form/embedded.js?height=$height'></script>";

	/**
	* iframe embed, loaded inside <noscript> tags
	*/

	$iframe_embed = "<iframe id='goldendata_form_$form' src='https://jinshuju.net/f/$form?embedded='true'";
	$iframe_embed .= " width='100%' frameborder='0' height='$height'></iframe>";
			
	/**
	* Return embed in JS and iframe
	*/
	return "$JSEmbed <noscript> $iframe_embed </noscript>";
}

add_shortcode('jinshuju', 'createJinshujuEmbedJS');

?>