<?php
/** Prepare an enquiry locally; reuse the existing WhatsApp/email contact workflow. */
defined( 'ABSPATH' ) || exit;
$service = $args['service'];
$business = iscp_get_software_business_profile();
$email = sanitize_email( iscp_get_theme_mod( 'iscp_email', 'info@indianservers.com' ) );
$privacy_url = get_privacy_policy_url();
?>
<section id="iscp-service-enquiry" class="iscp-service-enquiry iscp-service-section" aria-labelledby="iscp-service-enquiry-title">
	<div class="iscp-service-heading"><p class="iscp-service-kicker">Talk to Indian Servers</p><h2 id="iscp-service-enquiry-title">Tell us what your team needs</h2><p>Request a demonstration or quotation for <?php echo esc_html( $service['title'] ); ?>. Call <a href="<?php echo esc_url( 'tel:' . $business['telephone'] ); ?>" data-iscp-conversion="call_click"><?php echo esc_html( $business['phone'] ); ?></a> or prepare the details below.</p></div>
	<div class="iscp-enquiry-composer" data-iscp-enquiry-composer data-whatsapp="<?php echo esc_url( $business['whatsapp'] ); ?>" data-email="<?php echo esc_attr( $email ); ?>" hidden>
		<p class="iscp-enquiry-privacy-note">This prepares a message in your browser. It is not a submitted enquiry. No form details are stored by this page or sent until you choose a channel and send the message there. Do not include passwords, student records or other confidential information.</p>
		<form class="iscp-enquiry-form" method="post" action="#iscp-service-enquiry" data-iscp-enquiry-form>
			<div class="iscp-enquiry-fields">
				<label for="iscp-enquiry-name">Name <span aria-hidden="true">*</span><input id="iscp-enquiry-name" name="name" autocomplete="name" maxlength="100" required></label>
				<label for="iscp-enquiry-phone">Mobile <span aria-hidden="true">*</span><input id="iscp-enquiry-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" maxlength="25" pattern="[+0-9\(\) .\-]{7,25}" required></label>
				<label for="iscp-enquiry-email">Email (optional)<input id="iscp-enquiry-email" name="email" type="email" autocomplete="email" maxlength="160"></label>
				<label for="iscp-enquiry-organization">Company or institution <span aria-hidden="true">*</span><input id="iscp-enquiry-organization" name="organization" autocomplete="organization" maxlength="160" required></label>
				<label for="iscp-enquiry-service">Interested software <span aria-hidden="true">*</span><select id="iscp-enquiry-service" name="service" required><?php foreach ( iscp_get_service_experiences() as $slug => $profile ) : ?><option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $slug, $service['slug'] ); ?>><?php echo esc_html( $profile['title'] ); ?></option><?php endforeach; ?></select></label>
				<label for="iscp-enquiry-city">City <span aria-hidden="true">*</span><input id="iscp-enquiry-city" name="city" autocomplete="address-level2" maxlength="100" required></label>
				<label for="iscp-enquiry-purpose">Enquiry type<select id="iscp-enquiry-purpose" name="purpose"><option value="demo">Request a demonstration</option><option value="quotation">Request a quotation</option><option value="enquiry">Discuss a requirement</option></select></label>
				<label class="iscp-enquiry-message" for="iscp-enquiry-message">Your requirement <span aria-hidden="true">*</span><textarea id="iscp-enquiry-message" name="message" rows="5" minlength="20" maxlength="2000" required></textarea></label>
			</div>
			<label class="iscp-enquiry-consent"><input name="consent" type="checkbox" required><span>I agree to share these details with Indian Servers through the channel I choose. I will review and send the message in WhatsApp or email.<?php if ( $privacy_url ) : ?> <a href="<?php echo esc_url( $privacy_url ); ?>">Read the privacy policy</a>.<?php endif; ?></span></label>
			<button class="iscp-btn iscp-btn-primary" type="submit">Prepare my enquiry</button>
			<p role="status" aria-live="polite" data-iscp-enquiry-status></p>
		</form>
		<div class="iscp-enquiry-review" data-iscp-enquiry-review hidden><h3>Review your message</h3><pre data-iscp-enquiry-preview></pre><p>Continue to your chosen channel, review the recipient and send there. Opening the channel is not confirmation that Indian Servers received your enquiry.</p><div class="iscp-service-actions"><a class="iscp-btn iscp-btn-primary" data-iscp-enquiry-whatsapp target="_blank" rel="noopener noreferrer" referrerpolicy="no-referrer">Continue to WhatsApp</a><?php if ( $email ) : ?><a class="iscp-btn iscp-btn-ghost" data-iscp-enquiry-email>Open email draft</a><?php endif; ?></div></div>
	</div>
	<noscript><p>The message preparation tool needs JavaScript. Use the call or WhatsApp contact option instead.</p></noscript>
	<p>Prefer a direct conversation? <a href="<?php echo esc_url( $business['whatsapp'] ); ?>" target="_blank" rel="noopener noreferrer" data-iscp-conversion="whatsapp_click">Contact Indian Servers on WhatsApp</a><?php if ( $email ) : ?> or <a href="<?php echo esc_url( 'mailto:' . $email . '?subject=' . rawurlencode( 'Software enquiry: ' . $service['title'] ) ); ?>" data-iscp-conversion="email_click">email <?php echo esc_html( $email ); ?></a><?php endif; ?>.</p>
</section>
