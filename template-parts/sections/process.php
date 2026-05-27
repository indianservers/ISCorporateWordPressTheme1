<?php
/**
 * Process section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_steps = array(
	array( 'title' => __( 'Consult', 'iscp' ), 'desc' => __( 'Understand requirements, region, product type, users and business workflows.', 'iscp' ), 'outcome' => __( 'Clear scope, fixed timeline, no surprises', 'iscp' ) ),
	array( 'title' => __( 'Architect', 'iscp' ), 'desc' => __( 'Choose SaaS, custom software, cloud, AI, AR or security approach.', 'iscp' ), 'outcome' => __( 'Architecture designed for scale from day one', 'iscp' ) ),
	array( 'title' => __( 'Develop', 'iscp' ), 'desc' => __( 'Build with .NET, PHP, Python, mobile, APIs, databases and modern UI.', 'iscp' ), 'outcome' => __( 'Fortnightly demos so you see progress in real time', 'iscp' ) ),
	array( 'title' => __( 'Deploy', 'iscp' ), 'desc' => __( 'Host on secure Indian Servers cloud, VPS or managed infrastructure.', 'iscp' ), 'outcome' => __( 'Zero-downtime deployment with rollback capability', 'iscp' ) ),
	array( 'title' => __( 'Support', 'iscp' ), 'desc' => __( 'Maintain, monitor, improve and scale the application after launch.', 'iscp' ), 'outcome' => __( '99.9% uptime SLA with 24/7 monitoring', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-home-process">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Process', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'From Requirement to Managed Software Support', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-process-timeline">
			<?php foreach ( $iscp_steps as $iscp_index => $iscp_step ) : ?>
				<article class="iscp-process-step iscp-reveal">
					<span class="iscp-process-number"><?php echo esc_html( str_pad( (string) ( $iscp_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $iscp_step['title'] ); ?></h3>
					<p><?php echo esc_html( $iscp_step['desc'] ); ?></p>
					<small class="iscp-process-outcome"><?php echo esc_html( $iscp_step['outcome'] ); ?></small>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
