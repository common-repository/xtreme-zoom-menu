<?php
/*
Plugin Name: Xtreme Zoom Menu
Plugin URI: http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-zoom-menu-xml-as3.html
Description: The most advanced XML Zoom Menu application. No Flash Knowledge required to insert the Zoom Menu SWF inside the HTML page(s) of your site.
Version: 1.2
Author: Flashtuning 
Author URI: http://www.flashtuning.net
*/

$xtreme_zoom_swf_nr	= 0; 											

function xtremeZoomMenuStart($xtreme_obj) {
	
	$txtP = preg_replace_callback('/\[xtreme-zoom-menu\s*(width="(\d+)")?\s*(height="(\d+)")?\s*(xml="([^"]+)")?\s*\]/i', 'xtremeZoomMenuAddObj', $xtreme_obj); 
	
	return $txtP;
}

function xtremeZoomMenuAddObj($xtreme_zoom_param) {

    global $xtreme_zoom_swf_nr; //number of swfs
	$xtreme_zoom_swf_nr++;
	
	$xtreme_zoom_rand = substr(rand(),0,3);
	
	$xtreme_zoom_dir = WP_CONTENT_URL .'/flashtuning/xtreme-zoom-menu/';
	$xtreme_zoom_swf = $xtreme_zoom_dir.'zoommenu.swf';
	$xtreme_zoom_config = "swfobj2";
	
	if ($xtreme_zoom_param[2] !=""){$xtreme_zoom_width = $xtreme_zoom_param[2];}
	else {$xtreme_zoom_width = 600;}
	
	if ($xtreme_zoom_param[4] !=""){$xtreme_zoom_height = $xtreme_zoom_param[4];}
	else {$xtreme_zoom_height = 220;}
	
	if ($xtreme_zoom_param[6] !=""){$xtreme_zoom_xml = $xtreme_zoom_dir.$xtreme_zoom_param[6];}
	else {$xtreme_zoom_xml = $xtreme_zoom_dir.'zoom-settings.xml';}
	
	
	
	/*
		quality - low | medium | high | autolow | autohigh | best
		bgcolor - hexadecimal RGB value
		wmode - Window | Opaque | Transparent
		allowfullscreen - true | false
		scale - noscale | showall | noborder | exactfit
		salign - L | R | T | B | TL | TR | BL | BR 
		allowscriptaccess - always | never | samedomain
	
	*/
	
	$xtreme_zoom_param = array("quality" =>	"high", "bgcolor" => "", "wmode"	=>	"window", "version" =>	"9.0.0", "allowfullscreen"	=>	"true", "scale" => "noscale", "salign" => "TL", "allowscriptaccess" => "samedomain");
	
	if (is_feed()) {$xtreme_zoom_config = "xhtml";}

	
	if ($xtreme_zoom_config != "xhtml") {
		$xtreme_zoom_output = "<div id=\"xtreme-zoom-menu".$xtreme_zoom_rand."\">Please install flash player.</div>";
	
	}
	
	switch ($xtreme_zoom_config) {
	
		case "xhtml":
			$xtreme_zoom_output.= "\n<object width=\"".$xtreme_zoom_width."\" height=\"".$xtreme_zoom_height."\">\n";
			$xtreme_zoom_output.= "<param name=\"movie\" value=\"".$xtreme_zoom_swf."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"quality\" value=\"".$xtreme_zoom_param['quality']."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"bgcolor\" value=\"".$xtreme_zoom_param['bgcolor']."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"wmode\" value=\"".$xtreme_zoom_param['wmode']."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"allowFullScreen\" value=\"".$xtreme_zoom_param['allowfullscreen']."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"scale\" value=\"".$xtreme_zoom_param['scale']."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"salign\" value=\"".$xtreme_zoom_param['salign']."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"allowscriptaccess\" value=\"".$xtreme_zoom_param['allowscriptaccess']."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"base\" value=\"".$xtreme_zoom_dir."\"></param>\n";
			$xtreme_zoom_output.= "<param name=\"FlashVars\" value=\"setupXML=".$xtreme_zoom_xml."\"></param>\n";
			
			
			$xtreme_zoom_output.= "<embed type=\"application/x-shockwave-flash\" width=\"".$xtreme_zoom_width."\" height=\"".$xtreme_zoom_height."\" src=\"".$xtreme_zoom_swf."\" ";
			$xtreme_zoom_output.= "quality=\"".$xtreme_zoom_param['quality']."\" bgcolor=\"".$xtreme_zoom_param['bgcolor']."\" wmode=\"".$xtreme_zoom_param['wmode']."\" scale=\"".$xtreme_zoom_param['scale']."\" salign=\"".$xtreme_zoom_param['salign']."\" allowScriptAccess=\"".$xtreme_zoom_param['allowscriptaccess']."\" allowFullScreen=\"".$xtreme_zoom_param['allowfullscreen']."\" base=\"".$xtreme_zoom_dir."\" FlashVars=\"setupXML=".$xtreme_zoom_xml."\"  ";
			
			$xtreme_zoom_output.= "></embed>\n";
			$xtreme_zoom_output.= "</object>\n";
			break;
	
		default:
		
			$xtreme_zoom_output.= '<script type="text/javascript">';
			$xtreme_zoom_output.= "swfobject.embedSWF('{$xtreme_zoom_swf}', 'xtreme-zoom-menu{$xtreme_zoom_rand}', '{$xtreme_zoom_width}', '{$xtreme_zoom_height}', '{$xtreme_zoom_param['version']}', '' , { setupXML: '{$xtreme_zoom_xml}'}, {base: '{$xtreme_zoom_dir}', wmode: '{$xtreme_zoom_param['wmode']}', scale: '{$xtreme_zoom_param['scale']}', salign: '{$xtreme_zoom_param['salign']}', allowScriptAccess: '{$xtreme_zoom_param['allowscriptaccess']}', allowFullScreen: '{$xtreme_zoom_param['allowfullscreen']}'}, {});";
			$xtreme_zoom_output.= '</script>';
	
			break;
					
	}
	return $xtreme_zoom_output;
}

function  xtremeZoomMenuEcho($xtreme_zoom_width, $xtreme_zoom_height, $xtreme_zoom_xml) {
    echo xtremeZoomMenuAddObj( array( null, null, $xtreme_zoom_width, null, $xtreme_zoom_height, null, $xtreme_zoom_xml) );
}


function xtremeZoomAdmin() {

if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }


?>
		<div class="wrap">
			<h2>Xtreme Zoom Menu 1.2</h2>
					<table>
					<tr>
						<th valign="top" style="padding-top: 10px;color:#FF0000;">
							!IMPORTANT: Copy the free archive folder in the wp-content folder. (eg.: http://www.yoursite.com/wp-content/flashtuning/xtreme-zoom-menu/)
						</th>
					</tr>
                    
                     <tr>
						<td>
					      <ul>
					        <li>1. Insert the swf into post or page using this tag: <strong>[xtreme-zoom-menu]</strong>.</li>
                            <li>2. If you want to modify the width and height of the zoom menu insert this attributes into the tag: <strong>[xtreme-zoom-menu width="yourvalue" height="yourvalue"]</strong></li>
   					        <li>3. If you want to use multiple instances of Xtreme Zoom Menu on different pages. Follow this steps:
                            	<ul>
	                           <li>a. There are 2 xml files in <strong>wp-content/flashtuning/xtreme-zoom-menu</strong> folder: zoom-settings.xml, used for general settings, and zoom-content.xml, used for individual items.</li>
                                <li>b. Modify the 2 xml files according to your needs and rename them (eg.: zoom-settings2.xml, zoom-content2.xml) </li>
                                <li>c. Open the zoom-settings2.xml, search for this tag <strong> < object param="contentXML"	value="zoom-content.xml" /></strong> and change the attribute value to <em>zoom-content2.xml</em> </li>
                                <li>d. Copy the 2 modified xml files to <strong>wp-content/flashtuning/xtreme-zoom-menu</strong> folder</li>
                                <li>e. Use the <strong>xml</strong> attribute [xtreme-zoom-menu xml="zoom-settings2.xml"] when you insert the zoom menu on a page. </li>
                                </ul>
                            <li>4. Optionally for custom pages use this php function: <strong>xtremeZoomMenuEcho(width,height,xmlFile)</strong> (e.g: xtremeZoomMenuEcho(600,220,'zoom-settings.xml') )</li>                  
                            </ul>
						</td>
				  </tr>         
                    
					<tr>
						<td>
						  <p>Check out other useful links. If you have any questions / suggestions, please leave a comment on the component page. </p>
					      <ul>
					        <li><a href="http://www.flashtuning.net">Author Home Page</a></li>
			                <li><a href="http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-zoom-menu-xml-as3.html">Xtreme Zoom Menu Page</a> </li>
			           </ul>
						</td>
				  </tr>
				</table>
			
		</div>
		
<?php
}
function xtremeZoomAdminAdd() {
	
	add_options_page('Xtreme Zoom Menu Options', 'Xtreme Zoom Menu', 'manage_options','xtremezoommenu', 'xtremeZoomAdmin');
}

function xtremeZoomMenuSwfObj() {
		wp_enqueue_script('swfobject');
	}


add_filter('the_content', 'xtremeZoomMenuStart');
add_action('admin_menu', 'xtremeZoomAdminAdd');
add_action('init', 'xtremeZoomMenuSwfObj');
?>