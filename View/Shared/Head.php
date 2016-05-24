<?php

namespace fishStore\View\Shared;

/**
 * Head
 *
 * The boilerplate HTML used by all templates
 *
 * @package    fishStore
 * @author     Pete Burkindine <pburkind@gmail.com>
 * @copyright  2016
 * @version    Release: 1.3
 */
class Head extends \fishStore\Base\View
{
	
	private static $_required_js =	[
										'https://code.jquery.com/jquery-2.2.4.min.js',
										'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
										'http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js',
										'http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js',
										'https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js',
										JS_PATH . 'shared/global.js',
										JS_PATH . 'shared/doc_ready.js',
										JS_PATH . 'shared/validators.js'
									];
	
	private static $_required_css =	[
										CSS_PATH . 'shared/global.css',
										CSS_PATH . 'shared/clearfix.css',
										CSS_PATH . 'shared/layout.css',
										CSS_PATH . 'shared/menu.css',
										CSS_PATH . 'shared/sidebar.css',
										CSS_PATH . 'shared/topbar.css',
										CSS_PATH . 'shared/footer.css',
										REQ_PATH . 'font-awesome-4.6.3/css/font-awesome.min.css', // font-awesome's CDN is very slow
									];
	
	/**
	 * GetHTML
	 *
	 * Return a string of HTML for output of the view
	 *
	 * @param (Model) The data model for the view, if any
	 * @return (string) The finished tag
	 */
	public function GetHTML( \fishStore\Base\Model $model = null )
	{
		global $ini, $html, $Envelope;
		
		$arr_js = array_merge( self::$_required_js, $Envelope['dependencies']['js'] );
		$arr_css = array_merge( self::$_required_css, $Envelope['dependencies']['css'] );
		
		$out = "<!DOCTYPE html>\n".$html->html_beg() . $html->head_beg();
		$out .= $html->title([], $Envelope['title'] );
		
		foreach( $arr_js as $js )
			$out .= $html->script(	[
										'type' => 'text/javascript',
										'src' => $js
									]);
		
		foreach( $arr_css as $css )
		{
			$out .= $html->link(	[
										'rel' => 'stylesheet',
										'href' => $css
									] );
		}
		
		$out .= $html->head_end();
		$out .= $html->body_beg() . $html->div_beg( [ 'id' => 'site_wrapper' ] );
		
		return $out;
	
	} // GetHTML
	
	
	
} // Head
