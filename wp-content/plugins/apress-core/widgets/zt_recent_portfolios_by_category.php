<?php
if( ! class_exists( 'ZOLO_Recent_Portfolios_Widget' ) ) {
	add_action('widgets_init', 'zolo_recent_works_load_widgets');

	function zolo_recent_works_load_widgets()
	{
		register_widget('ZOLO_Recent_Portfolios_Widget');
	}

	class ZOLO_Recent_Portfolios_Widget extends WP_Widget {

		public function __construct()
		{
			$widget_ops = array('classname' => 'recent_works', 'description' => 'Recent works from the portfolio.');
			$control_ops = array('id_base' => 'recent_works-widget');
			parent::__construct('recent_works-widget', 'Apress: Recent Works', $widget_ops, $control_ops);
		}

		public function widget($args, $instance)
		{
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			$category  = $instance['category'];
			$number = $instance['number'];
			$display_portfolio_style = isset($instance['display_portfolio_style']) ? $instance['display_portfolio_style'] : '';

			echo $before_widget;

			if($title) {
				echo $before_title . $title . $after_title;
			}
			?>
			<div class="recent-works-items clearfix">
			<?php
			if($category == -1){
					$args = array(
					'post_type' => 'zt_portfolio',
					'posts_per_page' => $number,
					);
				
				}else{
									
				$args = array(
				'post_type' => 'zt_portfolio',
				'posts_per_page' => $number,
				'tax_query'=>array(
						array(
						'taxonomy'	=> 'catportfolio',
						'field'		=>	'term_id',
						'terms'		=> $category
						)
					)
					);
				}
					
			$portfolio = new WP_Query($args);
			if($portfolio->have_posts()): ?>
			<ul class="<?php echo $display_portfolio_style;?>">
			<?php while($portfolio->have_posts()): $portfolio->the_post(); ?>
			<li>
                <span class="post_list_item">
                	<span class="post_list_thumb">
                    <?php 
                    if(has_post_thumbnail()){ ?>
                    <a class="entry-title" href="<?php echo get_permalink(); ?>" target="_blank" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                    <?php } ?>
                    </span>
                    <?php if($display_portfolio_style == 'List'){?>
                     <span class="post_list_content entry-title">   
                     <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php echo the_title(); ?>
                        </a> 
                        <?php  echo '<span class="post-date">' . get_the_time( get_option( 'date_format' ) ) . '</span>'; ?>
                     </span>
                     <?php }?>
                 </span>
            </li>
			<?php endwhile; ?>
			</ul>
			<?php endif; 
			wp_reset_query();
			?>			
			</div>

			<?php echo $after_widget;
		}

		public function update($new_instance, $old_instance)
		{
			$instance = $old_instance;

			$instance['title'] = strip_tags($new_instance['title']);
			$instance['category']  = wp_strip_all_tags( $new_instance['category'] );
			$instance['number'] = $new_instance['number'];
			$instance['display_portfolio_style'] =  isset($new_instance['display_portfolio_style']) ? $new_instance['display_portfolio_style'] : '';
			

			return $instance;
		}

		public function form($instance)
		{
			$defaults = array('title' => 'Recent Works', 'category' => '', 'number' => 6, 'show_date' => '', 'show_featured_image' => '' );
			$instance = wp_parse_args((array) $instance, $defaults); 
			$category  = $instance['category'];
			$show_date = $instance['show_date'];
			$show_featured_image = $instance['show_featured_image'];
			$display_portfolio_style = isset($instance['display_portfolio_style']) ? $instance['display_portfolio_style'] : '';
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'apcore' ); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			<p>
			<label for="zolo_widget_cat_recent_portfolios_category"><?php _e( 'Category', 'apcore' ); ?>:</label>				
			
			<?php

			wp_dropdown_categories( array(
				'show_option_none' => __( 'Select Category' , 'apcore'),
				'orderby'    => 'title',
				'hide_empty' => false,
				'name'       => $this->get_field_name( 'category' ),
				'id'         => 'zolo_widget_cat_recent_portfolios_category',
				'class'      => 'widefat',
				'taxonomy'	 => 'catportfolio',
				'selected'   => $category

			) );

			?>

			</p>
			<p>
				<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of items to show:', 'apcore' ); ?></label>
				<input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
			</p>
            <p>
            <label for="<?php echo $this->get_field_id('display_portfolio_style'); ?>"><?php _e( 'Style:', 'apcore' ); ?></label>
            <select id="<?php echo $this->get_field_id('display_portfolio_style'); ?>" name="<?php echo $this->get_field_name('display_portfolio_style'); ?>" class="widefat" >
					<option <?php if ('List' == $display_portfolio_style) echo 'selected="selected"'; ?>><?php _e( 'List ', 'apcore' ); ?></option>
					<option <?php if ('Gallery' == $display_portfolio_style) echo 'selected="selected"'; ?>><?php _e( 'Gallery ', 'apcore' ); ?></option>
			</select>
            </p>
        
		<?php
		}
	}
}
?>