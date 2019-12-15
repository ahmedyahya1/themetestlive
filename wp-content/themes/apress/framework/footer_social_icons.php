<?php 
global $apress_data;  

$footer_social_links_boxed = isset($apress_data['footer_social_links_boxed']) ? $apress_data['footer_social_links_boxed'] : 'No';
$boxed_icons = ($footer_social_links_boxed == 'Yes') ? 'boxed-icons' : '';
	
echo '<div class="zolo-social '.$boxed_icons.'">';
?>
    <ul class="social-icon">
        <?php if(isset($apress_data['facebook_link']) && $apress_data['facebook_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['facebook_link']); ?>" ><i class="fa fa-facebook"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['flickr_link']) && $apress_data['flickr_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['flickr_link']); ?>" ><i class="fa fa-flickr"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['rss_link']) && $apress_data['rss_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['rss_link']); ?>" ><i class="fa fa-rss"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['twitter_link']) && $apress_data['twitter_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['twitter_link']); ?>" ><i class="fa fa-twitter"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['vimeo_link']) && $apress_data['vimeo_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['vimeo_link']); ?>"><i class="fa fa-vimeo-square"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['youtube_link']) && $apress_data['youtube_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['instagram_link']) && $apress_data['instagram_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['instagram_link']); ?>"><i class="fa fa-instagram"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['pinterest_link']) && $apress_data['pinterest_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['pinterest_link']); ?>"><i class="fa fa-pinterest"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['tumblr_link']) && $apress_data['tumblr_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['tumblr_link']); ?>"><i class="fa fa-tumblr"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['google_link']) && $apress_data['google_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['google_link']); ?>"><i class="fa fa-google-plus"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['dribbble_link']) && $apress_data['dribbble_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['dribbble_link']); ?>"><i class="fa fa-dribbble"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['digg_link']) && $apress_data['digg_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['digg_link']); ?>"><i class="fa fa-digg"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['linkedin_link']) && $apress_data['linkedin_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['skype_link']) && $apress_data['skype_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['skype_link']); ?>"><i class="fa fa-skype"></i></a></li>
        <?php endif; ?>        
        
		<?php if(isset($apress_data['deviantart_link']) && $apress_data['deviantart_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['deviantart_link']); ?>"><i class="fa fa-deviantart"></i></a></li>
        <?php endif; ?>
                
        <?php if(isset($apress_data['yahoo_link']) && $apress_data['yahoo_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['yahoo_link']); ?>"><i class="fa fa-yahoo"></i></a></li>
        <?php endif; ?>  
        
        <?php if(isset($apress_data['reddit_link']) && $apress_data['reddit_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['reddit_link']); ?>" ><i class="fa fa-reddit"></i></a></li>
        <?php endif; ?>

        <?php if(isset($apress_data['dropbox_link']) && $apress_data['dropbox_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['dropbox_link']); ?>" ><i class="fa fa-dropbox"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['soundcloud_link']) && $apress_data['soundcloud_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['soundcloud_link']); ?>" ><i class="fa fa-soundcloud"></i></a></li>
        <?php endif; ?>
                
        <?php if(isset($apress_data['vk_link']) && $apress_data['vk_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['vk_link']); ?>" ><i class="fa fa-vk"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['github_link']) && $apress_data['github_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['github_link']); ?>" ><i class="fa fa-github"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['behance_link']) && $apress_data['behance_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['behance_link']); ?>" ><i class="fa fa-behance"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['500px_link']) && $apress_data['500px_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['500px_link']); ?>" ><i class="fa fa-500px"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['xing_link']) && $apress_data['xing_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($apress_data['xing_link']); ?>" ><i class="fa fa-xing"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($apress_data['email_link']) && $apress_data['email_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="mailto:<?php echo esc_attr($apress_data['email_link']); ?>" ><i class="fa fa-envelope-o"></i></a></li>
        <?php endif; ?>
        
      </ul>

<?php 
	echo '</div>';

?>