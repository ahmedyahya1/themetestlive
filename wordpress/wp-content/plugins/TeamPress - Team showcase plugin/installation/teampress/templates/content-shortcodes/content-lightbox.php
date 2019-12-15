<?php 
  $customlink = ex_teampress_customlink(get_the_ID());
?>
<div class="exp-lightbox-info">
	<div class="lb-image"><a href="<?php echo $customlink; ?>"><?php the_post_thumbnail('full'); ?></a></div>
    <div class="lb-info">
        <h3><a href="<?php echo $customlink; ?>"><?php the_title(); ?></a></h3>
        <div class="exp-lightbox-meta">
            <div class="lb-social"><?php echo ex_teampress_social(get_the_ID());?></div>
            <?php $position = get_post_meta( get_the_ID(), 'extp_position', true ); 
            if($position!=''){ ?>
              <h5><span><?php echo esc_html__('Position: ','teampress'); ?></span><?php echo $position; ?></h5>
            <?php }?>
            <?php $phone = get_post_meta( get_the_ID(), 'extp_phone', true ); 
            if($phone!=''){ ?>
              <h5><span><?php echo esc_html__('Phone: ','teampress'); ?></span><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo $phone; ?></a></h5>
            <?php }?>
            <?php $email = get_post_meta( get_the_ID(), 'extp_email', true ); 
            if($email!=''){ ?>
              <h5><span> <?php echo esc_html__('Email: ','teampress'); ?></span><a href="mailto:<?php echo sanitize_email($email); ?>"><?php echo $email; ?></a></h5>
            <?php }
            ex_teampress_custom_info(get_the_ID());?>
        </div>
        <p><?php the_content(); ?></p>
    </div>
</div>