<?php
/**
 * Empty result content.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="iscp-no-results">
	<header class="iscp-entry-header">
		<h1 class="iscp-entry-title"><?php esc_html_e( 'Nothing found', 'iscp' ); ?></h1>
	</header>
	<div class="iscp-entry-content">
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'No results matched your search. Try different keywords.', 'iscp' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Content will appear here once it is published.', 'iscp' ); ?></p>
		<?php endif; ?>
	</div>
</section>

