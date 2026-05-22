<?php
/**
 * Theme admin dashboard hooks.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_register_admin_page' ) ) {
	/**
	 * Add theme admin page.
	 */
	function iscp_register_admin_page() {
		add_theme_page(
			esc_html__( 'Indian Servers Corp Pro', 'iscp' ),
			esc_html__( 'Indian Servers Corp Pro', 'iscp' ),
			'manage_options',
			'iscp-theme',
			'iscp_render_admin_page'
		);
	}
}
add_action( 'admin_menu', 'iscp_register_admin_page' );

if ( ! function_exists( 'iscp_get_admin_tabs' ) ) {
	/**
	 * Return admin tabs.
	 *
	 * @return array
	 */
	function iscp_get_admin_tabs() {
		return array(
			'welcome'       => __( 'Welcome', 'iscp' ),
			'demo-import'   => __( 'Demo Import', 'iscp' ),
			'section-studio' => __( 'Section Studio', 'iscp' ),
			'template-studio' => __( 'Template Studio', 'iscp' ),
			'design-system' => __( 'Design System', 'iscp' ),
			'conversion-tools' => __( 'Conversion Tools', 'iscp' ),
			'checklist'     => __( 'Theme Checklist', 'iscp' ),
			'documentation' => __( 'Documentation', 'iscp' ),
			'system-status' => __( 'System Status', 'iscp' ),
			'support'       => __( 'Support', 'iscp' ),
		);
	}
}

if ( ! function_exists( 'iscp_render_admin_page' ) ) {
	/**
	 * Render admin page.
	 */
	function iscp_render_admin_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have permission to access this page.', 'iscp' ) );
		}

		$tabs       = iscp_get_admin_tabs();
		$active_tab = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : 'welcome';

		if ( ! isset( $tabs[ $active_tab ] ) ) {
			$active_tab = 'welcome';
		}
		?>
		<div class="wrap iscp-admin-page">
			<div class="iscp-admin-hero">
				<div>
					<p class="iscp-admin-kicker"><?php esc_html_e( 'ISCP Theme Dashboard', 'iscp' ); ?></p>
					<h1><?php esc_html_e( 'Indian Servers Corp Pro', 'iscp' ); ?></h1>
					<p><?php esc_html_e( 'A professional WordPress website theme for Indian Servers Pvt. Ltd. software development, cloud, AI and digital solution pages.', 'iscp' ); ?></p>
				</div>
				<span class="iscp-admin-version"><?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></span>
			</div>

			<?php iscp_render_admin_notice(); ?>

			<nav class="nav-tab-wrapper iscp-admin-tabs" aria-label="<?php esc_attr_e( 'ISCP admin tabs', 'iscp' ); ?>">
				<?php foreach ( $tabs as $tab_key => $tab_label ) : ?>
					<a class="nav-tab <?php echo $active_tab === $tab_key ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( add_query_arg( array( 'page' => 'iscp-theme', 'tab' => $tab_key ), admin_url( 'themes.php' ) ) ); ?>">
						<?php echo esc_html( $tab_label ); ?>
					</a>
				<?php endforeach; ?>
			</nav>

			<div class="iscp-admin-panel">
				<?php
				if ( 'welcome' === $active_tab ) {
					iscp_render_welcome_tab();
				} elseif ( 'demo-import' === $active_tab ) {
					iscp_render_demo_import_tab();
				} elseif ( 'section-studio' === $active_tab ) {
					iscp_render_section_studio_tab();
				} elseif ( 'template-studio' === $active_tab ) {
					iscp_render_template_studio_tab();
				} elseif ( 'design-system' === $active_tab ) {
					iscp_render_design_system_tab();
				} elseif ( 'conversion-tools' === $active_tab ) {
					iscp_render_conversion_tools_tab();
				} elseif ( 'checklist' === $active_tab ) {
					iscp_render_checklist_tab();
				} elseif ( 'documentation' === $active_tab ) {
					iscp_render_documentation_tab();
				} elseif ( 'system-status' === $active_tab ) {
					iscp_render_system_status_tab();
				} elseif ( 'support' === $active_tab ) {
					iscp_render_support_tab();
				}
				?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_template_studio_tab' ) ) {
	/**
	 * Render Template Studio tab.
	 */
	function iscp_render_template_studio_tab() {
		$templates = array(
			__( 'ISCP Full Width', 'iscp' )          => __( 'Flexible block canvas for custom corporate pages.', 'iscp' ),
			__( 'ISCP Landing Page', 'iscp' )        => __( 'Campaigns, service offers and lead-generation pages.', 'iscp' ),
			__( 'ISCP SaaS Landing', 'iscp' )        => __( 'Software products, demos, feature education and pricing.', 'iscp' ),
			__( 'ISCP Agency Page', 'iscp' )         => __( 'Agencies that need services, proof, process and inquiry CTAs.', 'iscp' ),
			__( 'ISCP Consulting Page', 'iscp' )     => __( 'Authority-building consulting and professional service pages.', 'iscp' ),
			__( 'ISCP IT Company Page', 'iscp' )     => __( 'IT firms, software teams and technology service providers.', 'iscp' ),
			__( 'ISCP Training Institute Page', 'iscp' ) => __( 'Courses, outcomes, enrollment and institute credibility.', 'iscp' ),
			__( 'ISCP Product Showcase', 'iscp' )    => __( 'Product pages with feature, screenshot, comparison and pricing flow.', 'iscp' ),
			__( 'ISCP Contact Page', 'iscp' )        => __( 'Contact cards, map placeholder, form area and office details.', 'iscp' ),
			__( 'ISCP Pricing Page', 'iscp' )        => __( 'Pricing tiers, comparison table, FAQ and conversion CTA.', 'iscp' ),
			__( 'ISCP Case Studies Page', 'iscp' )   => __( 'Archive-style project grid with simple category chips.', 'iscp' ),
			__( 'ISCP Blog Grid', 'iscp' )           => __( 'Editorial grid with search, categories and pagination.', 'iscp' ),
		);
		?>
		<div class="iscp-admin-grid iscp-admin-grid-two">
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'ISCP Template Studio', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Template Studio gives buyers complete page structures that work with WordPress page templates, Section Studio patterns and the ISCP design system.', 'iscp' ); ?></p>
				<div class="iscp-admin-actions">
					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>"><?php esc_html_e( 'Create New Page', 'iscp' ); ?></a>
					<a class="button" href="<?php echo esc_url( get_template_directory_uri() . '/docs/template-studio.html' ); ?>"><?php esc_html_e( 'Read Template Studio Docs', 'iscp' ); ?></a>
				</div>
			</section>
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'How to assign a template', 'iscp' ); ?></h2>
				<ol class="iscp-admin-steps">
					<li><?php esc_html_e( 'Go to Pages > Add New.', 'iscp' ); ?></li>
					<li><?php esc_html_e( 'Open Page settings and choose a template from the Template dropdown.', 'iscp' ); ?></li>
					<li><?php esc_html_e( 'Publish, then customize content with blocks and ISCP Section Studio patterns.', 'iscp' ); ?></li>
				</ol>
			</section>
		</div>
		<section class="iscp-admin-card">
			<h2><?php esc_html_e( 'Available Templates', 'iscp' ); ?></h2>
			<div class="iscp-admin-template-list">
				<?php foreach ( $templates as $template => $use_case ) : ?>
					<article>
						<h3><?php echo esc_html( $template ); ?></h3>
						<p><?php echo esc_html( $use_case ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_design_system_tab' ) ) {
	/**
	 * Render Design System tab.
	 */
	function iscp_render_design_system_tab() {
		$tokens = function_exists( 'iscp_get_active_design_tokens' ) ? iscp_get_active_design_tokens() : array();
		$swatches = array(
			__( 'Primary', 'iscp' ) => isset( $tokens['primary'] ) ? $tokens['primary'] : '#2563eb',
			__( 'Accent', 'iscp' )  => isset( $tokens['accent'] ) ? $tokens['accent'] : '#12d6ff',
			__( 'Dark', 'iscp' )    => isset( $tokens['bg'] ) ? $tokens['bg'] : '#07111f',
			__( 'Surface', 'iscp' ) => isset( $tokens['surface_2'] ) ? $tokens['surface_2'] : '#f8fafc',
			__( 'Text', 'iscp' )    => isset( $tokens['text'] ) ? $tokens['text'] : '#0f172a',
			__( 'Border', 'iscp' )  => isset( $tokens['border'] ) ? $tokens['border'] : '#e2e8f0',
		);
		?>
		<div class="iscp-admin-grid iscp-admin-grid-two">
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'ISCP Design System', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Global presets control color, spacing, card style, button shape and editor previews through lightweight CSS variables and WordPress-native settings.', 'iscp' ); ?></p>
				<p>
					<strong><?php esc_html_e( 'Active preset:', 'iscp' ); ?></strong>
					<?php echo esc_html( isset( $tokens['preset_label'] ) ? $tokens['preset_label'] : __( 'Corporate Blue', 'iscp' ) ); ?>
				</p>
				<div class="iscp-admin-actions">
					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=iscp_design_presets' ) ); ?>"><?php esc_html_e( 'Open Design Presets', 'iscp' ); ?></a>
					<a class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=iscp_components' ) ); ?>"><?php esc_html_e( 'Edit Components', 'iscp' ); ?></a>
				</div>
			</section>
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Color Swatches', 'iscp' ); ?></h2>
				<div class="iscp-admin-swatches">
					<?php foreach ( $swatches as $label => $value ) : ?>
						<div class="iscp-admin-swatch">
							<span style="background: <?php echo esc_attr( $value ); ?>"></span>
							<strong><?php echo esc_html( $label ); ?></strong>
							<code><?php echo esc_html( $value ); ?></code>
						</div>
					<?php endforeach; ?>
				</div>
			</section>
			<section class="iscp-admin-card iscp-admin-preview-card">
				<p class="iscp-admin-eyebrow"><?php esc_html_e( 'Typography Preview', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'A polished corporate heading', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Readable body text, restrained spacing and clear hierarchy keep business pages credible and easy to scan.', 'iscp' ); ?></p>
				<a class="button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Customize Theme', 'iscp' ); ?></a>
			</section>
			<section class="iscp-admin-card iscp-admin-card-preview">
				<span class="iscp-admin-preview-icon"></span>
				<h3><?php esc_html_e( 'Card Preview', 'iscp' ); ?></h3>
				<p><?php esc_html_e( 'Cards inherit the active preset radius, border and shadow intensity.', 'iscp' ); ?></p>
			</section>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_conversion_tools_tab' ) ) {
	/**
	 * Render Conversion Tools tab.
	 */
	function iscp_render_conversion_tools_tab() {
		$tools = array(
			__( 'Sticky CTA Bar', 'iscp' )      => iscp_get_theme_mod( 'iscp_sticky_cta_enabled', false ),
			__( 'Exit Intent Modal', 'iscp' )  => iscp_get_theme_mod( 'iscp_exit_modal_enabled', false ),
			__( 'Scroll Progress Bar', 'iscp' ) => iscp_get_theme_mod( 'iscp_scroll_progress_enabled', false ),
			__( 'Reading Time', 'iscp' )       => iscp_get_theme_mod( 'iscp_reading_time_enabled', true ),
			__( 'Share Buttons', 'iscp' )      => iscp_get_theme_mod( 'iscp_share_buttons_enabled', true ),
		);
		?>
		<div class="iscp-admin-grid iscp-admin-grid-two">
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Conversion Tools', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'ISCP includes lightweight, optional conversion helpers. They use no third-party scripts and can be controlled from the Customizer.', 'iscp' ); ?></p>
				<div class="iscp-admin-actions">
					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=iscp_conversion' ) ); ?>"><?php esc_html_e( 'Open Conversion Settings', 'iscp' ); ?></a>
					<a class="button" href="<?php echo esc_url( get_template_directory_uri() . '/docs/conversion-tools.html' ); ?>"><?php esc_html_e( 'Read Documentation', 'iscp' ); ?></a>
				</div>
			</section>
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Tool Status', 'iscp' ); ?></h2>
				<ul class="iscp-checklist">
					<?php foreach ( $tools as $label => $enabled ) : ?>
						<li>
							<?php echo esc_html( $label ); ?>:
							<strong><?php echo $enabled ? esc_html__( 'Enabled', 'iscp' ) : esc_html__( 'Disabled', 'iscp' ); ?></strong>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Shortcodes', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Use ISCP shortcodes inside pages, posts, widgets or block editor Shortcode blocks for buttons, CTAs, stats and dynamic CPT grids.', 'iscp' ); ?></p>
				<a class="button" href="<?php echo esc_url( get_template_directory_uri() . '/docs/shortcodes.html' ); ?>"><?php esc_html_e( 'View Shortcodes', 'iscp' ); ?></a>
			</section>
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Widget Areas', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Add widgets to sidebars, footer columns, the header top bar, offcanvas panel or the CTA before footer area.', 'iscp' ); ?></p>
				<a class="button" href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Manage Widgets', 'iscp' ); ?></a>
			</section>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_section_studio_tab' ) ) {
	/**
	 * Render Section Studio tab.
	 */
	function iscp_render_section_studio_tab() {
		$categories = array(
			__( 'Hero Sections', 'iscp' ),
			__( 'Feature Sections', 'iscp' ),
			__( 'Service Sections', 'iscp' ),
			__( 'Solution Sections', 'iscp' ),
			__( 'Trust Sections', 'iscp' ),
			__( 'Conversion Sections', 'iscp' ),
			__( 'Pricing Sections', 'iscp' ),
			__( 'FAQ Sections', 'iscp' ),
			__( 'Testimonial Sections', 'iscp' ),
			__( 'Contact Sections', 'iscp' ),
		);
		?>
		<div class="iscp-admin-grid iscp-admin-grid-two">
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'ISCP Section Studio', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Section Studio is a premium WordPress-native pattern library for building corporate pages without a page builder dependency. Insert sections from the block editor, edit the content and combine layouts freely.', 'iscp' ); ?></p>
				<div class="iscp-admin-actions">
					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>"><?php esc_html_e( 'Create New Page', 'iscp' ); ?></a>
					<a class="button" href="<?php echo esc_url( get_template_directory_uri() . '/docs/section-studio.html' ); ?>"><?php esc_html_e( 'Read Section Studio Docs', 'iscp' ); ?></a>
					<a class="button" href="https://wordpress.org/documentation/article/block-pattern/"><?php esc_html_e( 'Pattern Inserter Documentation', 'iscp' ); ?></a>
				</div>
			</section>
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Included Categories', 'iscp' ); ?></h2>
				<ul class="iscp-checklist">
					<?php foreach ( $categories as $category ) : ?>
						<li><?php echo esc_html( $category ); ?></li>
					<?php endforeach; ?>
				</ul>
			</section>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_admin_notice' ) ) {
	/**
	 * Render import notices.
	 */
	function iscp_render_admin_notice() {
		$notice = isset( $_GET['iscp_notice'] ) ? sanitize_key( wp_unslash( $_GET['iscp_notice'] ) ) : '';

		if ( ! $notice ) {
			return;
		}

		$messages = array(
			'imported'         => __( 'Demo content imported successfully.', 'iscp' ),
			'already_imported' => __( 'This demo has already been imported. You can import another demo or manually remove existing demo content.', 'iscp' ),
			'invalid_demo'     => __( 'Invalid demo selection.', 'iscp' ),
		);

		if ( isset( $messages[ $notice ] ) ) {
			?>
			<div class="notice notice-<?php echo 'imported' === $notice ? 'success' : 'warning'; ?> is-dismissible">
				<p><?php echo esc_html( $messages[ $notice ] ); ?></p>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'iscp_render_welcome_tab' ) ) {
	/**
	 * Render welcome tab.
	 */
	function iscp_render_welcome_tab() {
		?>
		<div class="iscp-admin-grid iscp-admin-grid-two">
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Theme name: Indian Servers Corp Pro', 'iscp' ); ?></h2>
				<p><strong><?php esc_html_e( 'Short name:', 'iscp' ); ?></strong> <?php esc_html_e( 'ISCP', 'iscp' ); ?></p>
				<p><?php esc_html_e( 'ISCP provides reusable corporate layouts, native custom post types, Customizer controls and a safe demo importer for commercial website builds.', 'iscp' ); ?></p>
				<div class="iscp-admin-actions">
					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Customize Theme', 'iscp' ); ?></a>
					<a class="button" href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Manage Menus', 'iscp' ); ?></a>
					<a class="button" href="<?php echo esc_url( add_query_arg( array( 'page' => 'iscp-theme', 'tab' => 'demo-import' ), admin_url( 'themes.php' ) ) ); ?>"><?php esc_html_e( 'Import Demo', 'iscp' ); ?></a>
					<a class="button" href="<?php echo esc_url( add_query_arg( array( 'page' => 'iscp-theme', 'tab' => 'documentation' ), admin_url( 'themes.php' ) ) ); ?>"><?php esc_html_e( 'View Documentation', 'iscp' ); ?></a>
				</div>
			</section>
			<section class="iscp-admin-card">
				<h2><?php esc_html_e( 'Built for Indian Servers', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Use the included sections to present Indian Servers services, software products, case studies, support information and contact paths.', 'iscp' ); ?></p>
			</section>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_demo_import_tab' ) ) {
	/**
	 * Render demo import tab.
	 */
	function iscp_render_demo_import_tab() {
		$demos = iscp_get_demo_configs();
		?>
		<section class="iscp-admin-card">
			<h2><?php esc_html_e( 'One-click demo import', 'iscp' ); ?></h2>
			<p><?php esc_html_e( 'Demo content is imported only after an admin clicks an import button. No copyrighted media is included and duplicate imports are prevented.', 'iscp' ); ?></p>
		</section>
		<div class="iscp-demo-grid">
			<?php foreach ( $demos as $demo_key => $demo ) : ?>
				<?php $imported = get_option( $demo['option'] ); ?>
				<section class="iscp-admin-card iscp-demo-card">
					<h3><?php echo esc_html( $demo['label'] ); ?></h3>
					<p><?php echo esc_html( $demo['description'] ); ?></p>
					<?php if ( $imported ) : ?>
						<p class="iscp-imported-badge"><?php esc_html_e( 'Already imported', 'iscp' ); ?></p>
						<p><?php esc_html_e( 'This demo has already been imported. You can import another demo or manually remove existing demo content.', 'iscp' ); ?></p>
					<?php else : ?>
						<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
							<input type="hidden" name="action" value="iscp_import_demo">
							<input type="hidden" name="iscp_demo_key" value="<?php echo esc_attr( $demo_key ); ?>">
							<?php wp_nonce_field( 'iscp_import_demo', 'iscp_import_nonce' ); ?>
							<button class="button button-primary" type="submit"><?php esc_html_e( 'Import Demo', 'iscp' ); ?></button>
						</form>
					<?php endif; ?>
				</section>
			<?php endforeach; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_checklist_tab' ) ) {
	/**
	 * Render checklist tab.
	 */
	function iscp_render_checklist_tab() {
		$items = array(
			__( 'Set logo', 'iscp' ),
			__( 'Assign menu', 'iscp' ),
			__( 'Import demo', 'iscp' ),
			__( 'Customize colors', 'iscp' ),
			__( 'Add contact details', 'iscp' ),
			__( 'Set homepage', 'iscp' ),
			__( 'Refresh permalinks', 'iscp' ),
			__( 'Add real images', 'iscp' ),
			__( 'Add SEO plugin optional', 'iscp' ),
			__( 'Add caching plugin optional', 'iscp' ),
		);
		?>
		<section class="iscp-admin-card">
			<h2><?php esc_html_e( 'Launch checklist', 'iscp' ); ?></h2>
			<ul class="iscp-checklist">
				<?php foreach ( $items as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_documentation_tab' ) ) {
	/**
	 * Render documentation tab.
	 */
	function iscp_render_documentation_tab() {
		$docs = array(
			__( 'How to import demo: open Demo Import, choose a demo and click Import Demo.', 'iscp' ),
			__( 'How to customize homepage: use Appearance > Customize > ISCP Theme Options and edit homepage section content through CPT entries.', 'iscp' ),
			__( 'How to add solutions: go to Solutions > Add New and publish solution entries.', 'iscp' ),
			__( 'How to add services: go to Services > Add New and publish service entries.', 'iscp' ),
			__( 'How to add testimonials: go to Testimonials > Add New and complete testimonial fields.', 'iscp' ),
			__( 'How to change colors: open Customizer > ISCP Theme Options > Colors.', 'iscp' ),
			__( 'How to use Template Studio: create a page, choose an ISCP template from the Page Template dropdown and add Section Studio patterns as needed.', 'iscp' ),
			__( 'How to use shortcodes: add an ISCP shortcode inside a Shortcode block, widget or classic editor content area.', 'iscp' ),
			__( 'How to use conversion tools: open Customizer > ISCP Theme Options > Conversion Tools and enable only the tools needed for the project.', 'iscp' ),
			__( 'How to use widgets: go to Appearance > Widgets and place blocks in ISCP sidebars, footer columns, header top bar or CTA areas.', 'iscp' ),
			__( 'How to assign menus: go to Appearance > Menus and assign Primary and Footer menus.', 'iscp' ),
		);
		?>
		<section class="iscp-admin-card">
			<h2><?php esc_html_e( 'Documentation', 'iscp' ); ?></h2>
			<ul class="iscp-doc-list">
				<?php foreach ( $docs as $doc ) : ?>
					<li><?php echo esc_html( $doc ); ?></li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_system_status_tab' ) ) {
	/**
	 * Render system status tab.
	 */
	function iscp_render_system_status_tab() {
		global $wp_version;

		$theme = wp_get_theme();
		$rows  = array(
			__( 'WordPress version', 'iscp' )       => $wp_version,
			__( 'PHP version', 'iscp' )             => PHP_VERSION,
			__( 'Theme version', 'iscp' )           => $theme->get( 'Version' ),
			__( 'Active theme', 'iscp' )            => $theme->get( 'Name' ),
			__( 'Memory limit', 'iscp' )            => WP_MEMORY_LIMIT,
			__( 'Upload max filesize', 'iscp' )     => size_format( wp_max_upload_size() ),
			__( 'Permalink structure', 'iscp' )     => get_option( 'permalink_structure' ) ? get_option( 'permalink_structure' ) : __( 'Plain', 'iscp' ),
			__( 'Front page assignment', 'iscp' )   => get_option( 'page_on_front' ) ? __( 'Assigned', 'iscp' ) : __( 'Not assigned', 'iscp' ),
			__( 'Recommended PHP version', 'iscp' ) => '8.1+',
			__( 'Required PHP version', 'iscp' )    => '7.4',
		);
		?>
		<section class="iscp-admin-card">
			<h2><?php esc_html_e( 'System Status', 'iscp' ); ?></h2>
			<table class="widefat striped iscp-system-table">
				<tbody>
					<?php foreach ( $rows as $label => $value ) : ?>
						<tr>
							<th scope="row"><?php echo esc_html( $label ); ?></th>
							<td><?php echo esc_html( $value ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</section>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_support_tab' ) ) {
	/**
	 * Render support tab.
	 */
	function iscp_render_support_tab() {
		?>
		<section class="iscp-admin-card">
			<h2><?php esc_html_e( 'Support', 'iscp' ); ?></h2>
			<p><strong><?php esc_html_e( 'Support Email:', 'iscp' ); ?></strong> <?php esc_html_e( 'info@indianservers.com', 'iscp' ); ?></p>
			<p><strong><?php esc_html_e( 'Support Website:', 'iscp' ); ?></strong> <a href="https://indianservers.com"><?php esc_html_e( 'https://indianservers.com', 'iscp' ); ?></a></p>
			<p><?php esc_html_e( 'Use this dashboard to manage the Indian Servers website presentation and internal content setup.', 'iscp' ); ?></p>
		</section>
		<?php
	}
}
