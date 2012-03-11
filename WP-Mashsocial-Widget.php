<?php
/*
Plugin Name: WP MashSocial Wigdet
Plugin URI: http://freakify.com/2012/01/wordpress-wp-mashsocial-widget-by-ahmad-awais/
Description: A beautiful widget inspired by Mashable to be used in sidebar, it allows you to add your G+ , twitter , Facebook and Feeds in it.
Version: 1.1.1
Author: Ahmad Awais
Author URI: http://freakify.com/
License: GPLv2
*/
 //Registering the function 
 
class mashsocial extends WP_Widget {

	function mashsocial() {
		$widget_ops = array('classname' => 'mashsocial', 'description' => __(' Add your G+ , twitter , Facebook and Feeds in sidebar by WP Mashsocial Widget By Ahmad Awais | Freakify.com'));
		$control_ops = array('width' => 250, 'height' => 350);
		$this->WP_Widget('mashsocial', __('WP MashSocial Wigdet'), $widget_ops, $control_ops);
	}
//adding the css
	function addhead() {
		$siteurl = get_option('siteurl');
		$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/cssstyles.css';
		echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
	}
		
	
	function widget( $args, $instance ) {
		extract($args);	
		
		$feedbr_id = $instance['feedbr_id'];
		$twtr_id = $instance['twtr_id'];
		$fb_id = $instance['fb_id'];
		$linkedinn_id = $instance['linkedinn_id'];
		$gplus_id = $instance['gplus_id'];
		$widgwidth_id = $instance['widgwidth_id'];
		$fbwidth_id = $instance['fbwidth_id'];
		$fbheight_id = $instance['fbheight_id'];
		$recom_id = $instance['recom_id'];
		$ewidth_id = $instance['ewidth_id'];
		$etext_id = $instance['etext_id'];
		$footerurl_id = $instance['footerurl_id'];
		$footertext_id = $instance['footertext_id'];
		$fbboxcolor_id = $instance['fbboxcolor_id'];
		$gpluscolor_id = $instance['gpluscolor_id'];
		$twtrcolor_id = $instance['twtrcolor_id'];
		$ecolor_id = $instance['ecolor_id'];
		$othercolor_id = $instance['othercolor_id'];
		/* Our G+ Circle from the widget settings. */
		
	    $google_page_id = $instance['google_page_id'];
		$badge_layout = $instance['badge_layout'];
		$badge_color = $instance['badge_color'];
		?>
		
<!--begin of MashSocial Widget--> 
<div style="margin-bottom:10px;">
<div id="mashsocial" style="width:<?php echo $widgwidth_id; ?>px;"> <!-- MashSocial  Widget -->

<!-- Link blog to Google+ page -->

	<span class="mash-add-to-circle">
	<?php 	if ( $google_page_id || $badge_layout || $badge_color ) 
			echo "<a style=\"display: block; height: 0;\" href =\"https://plus.google.com/".$google_page_id."/\"  rel=\"publisher\"></a>";
			echo "<g:plus href=\"https://plus.google.com/".$google_page_id."/\"  width=\"".$widgwidth_id."px;\" size=\"".$badge_layout."\" theme=\"".$badge_color."\"></g:plus>";
		
	?>
	</span>

<!-- FB -->
	<div class="mashfb-likebox" style="background: <?php echo $fbboxcolor_id; ?>;"> 
		<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $fb_id; ?>&amp;send=false&amp;layout=standard&amp;width=<?php echo $fbwidth_id; ?>&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=<?php echo $fbheight_id; ?>&amp;appId=234513819928295" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $fbwidth_id; ?>px; height:<?php echo $fbheight_id; ?>px;"></iframe>
	</div>

<!-- G+ -->

	<div class="mashgoogleplus" style="background: <?php echo $gpluscolor_id; ?>;"> 
		

	
		<span><?php echo $recom_id; ?></span><div class="g-plusone" data-size="medium"></div>  
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script> 
	</div>
<!-- twitter -->
	<div class="mashtwitter" style="background: <?php echo $twtrcolor_id; ?>;"> 
        	<iframe title="" style="width: 300px; height: 20px;" class="twitter-follow-button" src="http://platform.twitter.com/widgets/follow_button.html#_=1319978796351&amp;align=&amp;button=blue&amp;id=twitter_tweet_button_0&amp;lang=en&amp;link_color=&amp;screen_name=<?php echo $twtr_id; ?>&amp;show_count=&amp;show_screen_name=&amp;text_color=" frameborder="0" scrolling="no"></iframe>
	</div>
<!-- Subscribe -->
	<div id="mash-email-subscribe" style="background: <?php echo $ecolor_id; ?>;"> 
		<div class="mash-email-box">
			<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedbr_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">	
				<input class="email" type="text" style="width: <?php echo $ewidth_id; ?>px; font-size: 12px;" id="email" name="email" value="<?php echo $etext_id; ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>		
				<input type="hidden" value="<?php echo $feedbr_id; ?>" name="uri"/>
				<input type="hidden" name="loc" value="en_US"/>
				<input class="subscribe" name="commit" type="submit" value="Subscribe"/>	
			</form>
		</div>
	</div>
<!-- Other Social-->
<div id="mash-other-social" style="background: <?php echo $othercolor_id; ?>;"> 
	<ul class="other-follow">
		<li class="erss">
			<a rel="nofollow" title="RSS" href="http://feeds.feedburner.com/<?php echo $feedbr_id; ?>" target="_blank">RSS Feed</a>
		</li>
		<li class="elinkedins">
			<a rel="nofollow external" title="LinkedIn" href="http://www.linkedin.com/profile/view?id=<?php echo $linkedinn_id; ?>" target="_blank">LinkedIn</a>
		</li>
		<li class="my-gplus">
			<a title="Google Plus" rel="author" href="http://plus.google.com/<?php echo $gplus_id; ?>" target="_blank">Google Plus</a>
		</li>
	</ul>
</div>

<div id="get-mashsocial" style="background: #EBEBEB;border: 1px solid #CCC;border-top: 1px solid white;padding: 1px 8px 1px 3px;text-align: right;border-image: initial;font-size:10px;font-family: Arial,Helvetica,sans-serif;">
      <span class="author-credit" style="font-family: Arial, Helvetica, sans-serif;"><a href="<?php echo $footerurl_id; ?>" target="_blank" title="<?php echo $footertext_id; ?>"><?php echo $footertext_id; ?> »»</a></span></div>
	  
	  </div> <!-- End Widget -->

</div>
<!--end of social widget--> 

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;		
		$instance['feedbr_id'] = $new_instance['feedbr_id'];
		$instance['twtr_id'] =  $new_instance['twtr_id'];
		$instance['fb_id'] =  $new_instance['fb_id'];
		$instance['linkedinn_id'] =  $new_instance['linkedinn_id'];
		$instance['gplus_id'] =  $new_instance['gplus_id'];
		$instance['widgwidth_id'] =  $new_instance['widgwidth_id'];
		$instance['fbwidth_id'] =  $new_instance['fbwidth_id'];
		$instance['fbheight_id'] =  $new_instance['fbheight_id'];
		$instance['recom_id'] =  $new_instance['recom_id'];
		$instance['ewidth_id'] =  $new_instance['ewidth_id'];
		$instance['etext_id'] =  $new_instance['etext_id'];
		$instance['footerurl_id'] =  $new_instance['footerurl_id'];
		$instance['footertext_id'] =  $new_instance['footertext_id'];
		$instance['fbboxcolor_id'] =  $new_instance['fbboxcolor_id'];
		$instance['gpluscolor_id'] =  $new_instance['gpluscolor_id'];
		$instance['twtrcolor_id'] =  $new_instance['twtrcolor_id'];
		$instance['ecolor_id'] =  $new_instance['ecolor_id'];
		$instance['othercolor_id'] =  $new_instance['othercolor_id'];
				/* Strip tags for title and name to remove HTML (important for text inputs). */

		$instance['google_page_id'] = strip_tags( $new_instance['google_page_id'] );

		/* No need to strip tags for sex and show_sex. */
		$instance['badge_layout'] = $new_instance['badge_layout'];
		$instance['badge_color'] = $new_instance['badge_color'];
		return $instance;
	}

	function form( $instance ) { 
		$instance = wp_parse_args( (array) $instance, array( 'feedbr_id' => 'freakify', 'twtr_id' => 'freakify', 'fb_id' => 'https://facebook.com/freakify', 'fbwidth_id' => '270', 'fbheight_id' => '80', 'recom_id' => 'Recommend on Google', 'ewidth_id' => '140', 'etext_id' => 'Enter your email', 'footerurl_id' => 'http://freakify.com/2012/01/wordpress-wp-mashsocial-widget-by-ahmad-awais/', 'footertext_id' => 'Get this widget', 'fbboxcolor_id' => '#FFF', 'gpluscolor_id' => '#F5FCFE', 'twtrcolor_id' => '#EEF9FD', 'ecolor_id' => '#E3EDF4', 'othercolor_id' => '#D8E6EB', 'linkedinn_id' => 'mrahmadawais', 'gplus_id' => '102220710143180184553', 'widgwidth_id' => '280','google_page_id' => '109270748242866772874', 'badge_layout' => 'standard', 'badge_color' => 'light' ) );
		$feedbr_id = $instance['feedbr_id'];
		$twtr_id = format_to_edit($instance['twtr_id']);
		$fb_id = format_to_edit($instance['fb_id']);
		$linkedinn_id = format_to_edit($instance['linkedinn_id']);
		$gplus_id = format_to_edit($instance['gplus_id']);
		$widgwidth_id = format_to_edit($instance['widgwidth_id']);
		$fbwidth_id = format_to_edit($instance['fbwidth_id']);
		$fbheight_id = format_to_edit($instance['fbheight_id']);
		$recom_id = format_to_edit($instance['recom_id']);
		$ewidth_id = format_to_edit($instance['ewidth_id']);
		$etext_id = format_to_edit($instance['etext_id']);
		$footerurl_id = format_to_edit($instance['footerurl_id']);
		$footertext_id = format_to_edit($instance['footertext_id']);
		$fbboxcolor_id = format_to_edit($instance['fbboxcolor_id']);
		$gpluscolor_id = format_to_edit($instance['gpluscolor_id']);
		$twtrcolor_id = format_to_edit($instance['twtrcolor_id']);
		$ecolor_id = format_to_edit($instance['ecolor_id']);
		$othercolor_id = format_to_edit($instance['othercolor_id']);
	?>			
		<center><strong><u>Social Profiles Setting</u></strong></center><br />
		<p><label for="<?php echo $this->get_field_id('feedbr_id'); ?>"><?php _e('Enter your Feedburner ID:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('feedbr_id'); ?>" name="<?php echo $this->get_field_name('feedbr_id'); ?>" type="text" value="<?php echo $feedbr_id; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('twtr_id'); ?>"><?php _e('Enter your twitter ID:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('twtr_id'); ?>" name="<?php echo $this->get_field_name('twtr_id'); ?>" value="<?php echo $twtr_id; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('fb_id'); ?>"><?php _e('Enter your Facebook URL:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('fb_id'); ?>" value="<?php echo $fb_id; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('linkedinn_id'); ?>"><?php _e('Enter your LinkedIn ID:'); ?><a href="http://freakify.com/2012/01/wordpress-wp-mashsocial-widget-by-ahmad-awais/#linkedin">?</a></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('linkedinn_id'); ?>" value="<?php echo $linkedinn_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('gplus_id'); ?>"><?php _e('Enter your Google+ ID:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('gplus_id'); ?>" value="<?php echo $gplus_id; ?>" /></p>
 <!-- Badge G+ -->	
		<!-- Google Page ID: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'google_page_id' ); ?>">Google+ Page ID:<a href="https://developers.google.com/+/plugins/badge/#faq-find-page-id" target="_blank">?</a></label>
			<input id="<?php echo $this->get_field_id( 'google_page_id' ); ?>" name="<?php echo $this->get_field_name( 'google_page_id' ); ?>" value="<?php echo $instance['google_page_id']; ?>" style="width:100%;" />
		</p>

		<!-- Badge Layout Style: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'badge_layout' ); ?>">Layout Style:</label>
			<select id="<?php echo $this->get_field_id( 'badge_layout' ); ?>" name="<?php echo $this->get_field_name( 'badge_layout' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( 'smallbadge' == $instance['badge_layout'] ) echo 'selected="selected"'; ?> value="smallbadge">Small</option>
				<option <?php if ( 'badge' == $instance['badge_layout'] ) echo 'selected="selected"'; ?> value="badge">Standard</option>
			</select>
		</p>
		
                <!-- Badge Color Scheme: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'badge_color' ); ?>">Color Scheme:</label>
			<select id="<?php echo $this->get_field_id( 'badge_color' ); ?>" name="<?php echo $this->get_field_name( 'badge_color' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( 'light' == $instance['badge_color'] ) echo 'selected="selected"'; ?> value="light">Light</option>
				<option <?php if ( 'dark' == $instance['badge_color'] ) echo 'selected="selected"'; ?> value="dark">Dark</option>
			</select>
		</p>
		
		<p><hr />
			<label>If you like this plugin, Please contribute your like on facebook:  </label><br />
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffreakify.com&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=295337620523337" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
<iframe src="//www.facebook.com/plugins/subscribe.php?href=https%3A%2F%2Fwww.facebook.com%2Fahmadawais&amp;layout=button_count&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=120&amp;appId=102008056593077" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px;  height:21px;" allowTransparency="true"></iframe>
<g:plus href="https://plus.google.com/102220710143180184553/" size="smallbadge"></g:plus>

	</p>	
 <!-- Badge G+ -->		
		<center><strong><u>Advanced Settings</u></strong></center><br />
		<p><label for="<?php echo $this->get_field_id('widgwidth_id'); ?>"><?php _e('Widget width(px):'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('widgwidth_id'); ?>" value="<?php echo $widgwidth_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('fbwidth_id'); ?>"><?php _e('Facebook width(px):'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('fbwidth_id'); ?>" value="<?php echo $fbwidth_id; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('fbheight_id'); ?>"><?php _e('Facebook height(px):'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('fbheight_id'); ?>" value="<?php echo $fbheight_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('recom_id'); ?>"><?php _e('Google recommend text:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('recom_id'); ?>" value="<?php echo $recom_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('ewidth_id'); ?>"><?php _e('Subscription box width(px):'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('ewidth_id'); ?>" value="<?php echo $ewidth_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('etext_id'); ?>"><?php _e('Subscription box text:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('etext_id'); ?>" value="<?php echo $etext_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('footertext_id'); ?>"><?php _e('Widget foot anchor text:(Optional)'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('footertext_id'); ?>" value="<?php echo $footertext_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('footerurl_id'); ?>"><?php _e('Widget foot URL:(Optional)'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('footerurl_id'); ?>" value="<?php echo $footerurl_id; ?>" /></p>
		<center><strong><u>Background Color Settings</u></strong><br />(Get color code list  <a href="http://html-color-codes.info/" rel="nofollow" title="Get color code list here" target="_blank"><strong>HERE</strong></a>)</center><br />
		<p><label for="<?php echo $this->get_field_id('fbboxcolor_id'); ?>"><?php _e('Facebook: Default: #FFFFFF'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('fbboxcolor_id'); ?>" value="<?php echo $fbboxcolor_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('gpluscolor_id'); ?>"><?php _e('Google: Default: #F5FCFE'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('gpluscolor_id'); ?>" value="<?php echo $gpluscolor_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('twtrcolor_id'); ?>"><?php _e('twitter: Default: #EEF9FD'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('twtrcolor_id'); ?>" value="<?php echo $twtrcolor_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('ecolor_id'); ?>"><?php _e('Subscription: Default: #E3EDF4'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('ecolor_id'); ?>" value="<?php echo $ecolor_id; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('othercolor_id'); ?>"><?php _e('RSS, LinkedIn, Google+: Default: #D8E6EB'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('othercolor_id'); ?>" value="<?php echo $othercolor_id; ?>" /></p>
		<p>Support this widget Share it! For more info, go to <a href="http://freakify.com/2012/01/wordpress-wp-mashsocial-widget-by-ahmad-awais/" target="_blank">WP MashSocial Wigdet</a>  page</p>
		<?php }
}

function insert_google_script_in_head() {

                echo '<script type="text/javascript">';
		echo '(function()';
		echo '{var po = document.createElement("script");';
		echo 'po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";';
		echo 'var s = document.getElementsByTagName("script")[0];';
		echo 's.parentNode.insertBefore(po, s);';

		echo '})();</script>';
	   
}

add_action( 'wp_head', 'insert_google_script_in_head');



add_action('widgets_init', create_function('', 'return register_widget(\'mashsocial\');'));
add_action('wp_head', array('mashsocial', 'addhead'));