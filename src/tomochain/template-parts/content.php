<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
$columns = get_field('blog_columns','options') ? get_field('blog_columns','options') : '3';

$classes = 'post-loop col-xs-12 col-md-'.$columns;
$custom_url = get_field('custom_url');
$open_new_tab = get_field('open_in_new_tab') ? '__blank' : '';

$enable_excerpt = get_field('blog_enable_excerpt','options');
$excerpt_length = get_field('blog_excerpt_length','options') ? get_field('blog_excerpt_length','options') : '20';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
	<div class="inner">
		<div class="box-content">
			<div class="entry-img">
				<a class="post-thumbnail" href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>" target="<?php echo esc_attr($open_new_tab)?>" rel="bookmark">
					<?php if(has_post_thumbnail()):
							tomochain_post_thumbnail();
						else: $img_url = get_template_directory_uri() . '/assets/images/image-list.jpg';?>
							<img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr(get_the_title());?>">
						<?php endif;
					?>
				</a>
			</div>
			<div class="entry-header">
				<?php
					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php tomochain_post_date(); ?>
						</div>
					<?php endif; ?>
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
		            the_title('<h2 class="entry-title"><a href="' . ($custom_url ? esc_url($custom_url) : get_permalink()) . '" target="' . esc_attr($open_new_tab) . '" rel="bookmark">', '</a></h2>');
				endif;?>
			</div>
			<div class="entry-box">
				<?php if(get_the_excerpt()):?>
					<div class="entry-content">
						<?php
						if($enable_excerpt)
						echo tomochain_excerpt($excerpt_length);
						?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</article>
