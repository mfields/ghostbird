<?php
/**
 * Taxonomy Template
 *
 * This file closes all html tags that it opens.
 *
 * @package      Ghostbird
 * @author       Michael Fields <michael@mfields.org>
 * @copyright    Copyright (c) 2011, Michael Fields
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0
 */

if ( ! have_posts() ) {
	get_template_part( '404' );
	exit;
}

get_header();

?>

<div id="content">

	<div id="intro">
		<h1><?php single_term_title() ?></h1>
		<div id="summary"><?php term_description(); ?></div>
		<?php ghostbird_summary_meta( '<div id="intro-meta">', '</div>' ) ?>
	</div>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'loop', 'taxonomy' );
	}
}
?>
</div><!--content-->

<div class="clear"></div>

<?php get_footer(); ?>