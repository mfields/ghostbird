<?php
/**
 * Page Template.
 *
 * This template is loaded whenever a single page is being viewed.
 *
 * @package      Ghostbird
 * @author       Michael Fields <michael@mfields.org>
 * @copyright    Copyright (c) 2011, Michael Fields
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.1
 */

if ( ! have_posts() ) {
	get_template_part( '404', 'page' );
}

get_header( 'page' );

?>

<div id="content">

<?php
while ( have_posts() ) {
	the_post();
?>

	<div id="intro">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<p id="byline"><?php printf( esc_html__( 'By %1$s', 'ghostbird' ), get_the_author() ); ?></p>
		<?php if ( has_excerpt() ) { ?>
			<div id="summary"><?php the_excerpt() ?></div>
		<?php } ?>
		<?php ghostbird_summary_meta( '<div id="intro-meta">', '</div>' ); ?>
	</div>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action( 'ghostbird_entry_start' ); ?>

	<div class="entry-content">
	<?php the_content(); ?>
	</div><!--entry-content-->

	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'ghostbird' ), 'after' => '</div>' ) ); ?>

	<?php do_action( 'ghostbird_entry_end' ); ?>

	</div><!--entry-->

<?php
}
?>

<?php get_template_part( 'biography', 'page' ); ?>

<?php comments_template( '', true ); ?>

</div><!--content-->

<div class="clear"></div>

<?php get_footer( 'page' ); ?>