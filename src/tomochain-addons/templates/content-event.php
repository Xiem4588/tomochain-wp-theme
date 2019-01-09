<?php
/**
 * Template part for displaying events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
$columns       = get_field('event_columns','options') ? get_field('event_columns','options') : '3';
$classes       = 'col-xs-12 col-md-'.$columns;
$custom_url    = get_field('event_custom_url');
$open_new_tab  = get_field('event_open_in_new_tab') ? '__blank' : '';

$start_date = date_i18n(get_option('date_format'), strtotime(get_field('start_date')));
$end_date   = date_i18n(get_option('date_format'), strtotime(get_field('end_date')));
$date       = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');

$enable_excerpt = get_field('event_enable_excerpt','options');
$excerpt_length = get_field('event_excerpt_length','options') ? get_field('event_excerpt_length','options') : '20';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?> data-id="<?php echo esc_attr(get_the_ID());?>">
	<div class="inner">
		<div class="box-content">
			<div class="entry-img">
				<a class="post-thumbnail" href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>" target="<?php echo esc_attr($open_new_tab)?>" rel="bookmark">
					<?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail('tomo-post-thumbnail');
                        } else { $img_url = get_template_directory_uri() . '/assets/images/image-list.jpg';?>
							<img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr(get_the_title());?>">
						<?php }
					?>
				</a>
			</div>
			<div class="entry-header">
				<div class="entry-title">
					<?php
						if ( is_singular() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
                        } else {
				            the_title('<a href="' . ($custom_url ? esc_url($custom_url) : get_permalink()) . '" target="' . esc_attr($open_new_tab) . '" rel="bookmark">', '</a>');
						}
					?>
					<span class="event-venue">- <?php the_field('venue'); ?></span>
				</div>
				<div class="entry-meta">
					<?php if ( $date ) : ?>
						<span class="posted-on"><?php echo $date;?></span>
                    <?php endif; ?>
				</div>
			</div>
			<div class="entry-box">
				<?php if ( get_the_excerpt() ) :?>
					<div class="entry-content">
						<?php
						if ( $enable_excerpt ) {
                            echo tomochain_excerpt($excerpt_length);
                        }
						?>
					</div>
				<?php endif;?>
				<div class="entry-footer">
					<a class="btn-tmp-txt1" href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>" target="<?php echo esc_attr($open_new_tab)?>" rel="bookmark"><?php echo esc_html__('See detail','tomochain')?></a>
				</div>
			</div>
		</div>
		<span class="btn_close"><?php echo esc_html__('Close','tomochain');?></span>
	</div>
</article>

