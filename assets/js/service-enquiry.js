(function () {
	'use strict';
	var servicePage = document.querySelector('[data-iscp-service]');
	if (!servicePage) { return; }
	var composer = servicePage.querySelector('[data-iscp-enquiry-composer]');
	if (!composer) { return; }
	var form = composer.querySelector('[data-iscp-enquiry-form]');
	var review = composer.querySelector('[data-iscp-enquiry-review]');
	var status = form.querySelector('[data-iscp-enquiry-status]');
	var preview = composer.querySelector('[data-iscp-enquiry-preview]');
	var whatsapp = composer.querySelector('[data-iscp-enquiry-whatsapp]');
	var email = composer.querySelector('[data-iscp-enquiry-email]');
	composer.hidden = false;

	// An existing consent-aware analytics adapter may listen. No personal fields,
	// network requests, cookies, local storage or analytics vendor are used here.
	function announce(action) {
		document.dispatchEvent(new CustomEvent('iscp:conversion', {
			detail: { action: action, service: servicePage.getAttribute('data-iscp-service') }
		}));
	}
	function invalidate() {
		review.hidden = true;
		preview.textContent = '';
		whatsapp.removeAttribute('href');
		if (email) { email.removeAttribute('href'); }
		status.textContent = '';
	}
	servicePage.querySelectorAll('[data-iscp-interest]').forEach(function (link) {
		link.addEventListener('click', function () {
			form.elements.purpose.value = link.getAttribute('data-iscp-interest');
			invalidate();
		});
	});
	servicePage.querySelectorAll('[data-iscp-conversion]').forEach(function (link) {
		link.addEventListener('click', function () { announce(link.getAttribute('data-iscp-conversion')); });
	});
	form.addEventListener('input', function (event) {
		invalidate();
		if (typeof event.target.setCustomValidity === 'function') { event.target.setCustomValidity(''); }
	});
	form.addEventListener('change', invalidate);
	form.addEventListener('submit', function (event) {
		event.preventDefault();
		var digits = form.elements.phone.value.replace(/\D/g, '');
		form.elements.phone.setCustomValidity(digits.length >= 7 && digits.length <= 15 ? '' : 'Enter a mobile number with 7 to 15 digits, including your country code when appropriate.');
		['name', 'organization', 'city', 'message'].forEach(function (name) {
			form.elements[name].value = form.elements[name].value.trim();
		});
		form.elements.message.setCustomValidity(form.elements.message.value.length >= 20 ? '' : 'Describe your requirement in at least 20 characters.');
		if (!form.reportValidity()) { return; }
		var selected = form.elements.service.options[form.elements.service.selectedIndex];
		var purpose = form.elements.purpose.options[form.elements.purpose.selectedIndex].text;
		var message = [
			'Hello Indian Servers,', purpose + ': ' + selected.text,
			'Name: ' + form.elements.name.value,
			'Mobile: ' + form.elements.phone.value,
			form.elements.email.value ? 'Email: ' + form.elements.email.value.trim() : '',
			'Organization: ' + form.elements.organization.value,
			'City: ' + form.elements.city.value,
			'Requirement: ' + form.elements.message.value
		].filter(Boolean).join('\n');
		preview.textContent = message;
		whatsapp.href = composer.getAttribute('data-whatsapp') + '?text=' + encodeURIComponent(message);
		if (email) {
			email.href = 'mailto:' + composer.getAttribute('data-email') + '?subject=' + encodeURIComponent(purpose + ': ' + selected.text) + '&body=' + encodeURIComponent(message);
		}
		review.hidden = false;
		status.textContent = 'Your message is ready to review. It has not been sent.';
		announce('enquiry_prepared');
	});
	whatsapp.addEventListener('click', function () { if (whatsapp.hasAttribute('href')) { announce('whatsapp_handoff'); } });
	if (email) {
		email.addEventListener('click', function () { if (email.hasAttribute('href')) { announce('email_draft'); } });
	}
	form.addEventListener('reset', invalidate);
	// Clear message URLs when returning from another application or the browser cache.
	window.addEventListener('pageshow', invalidate);
}());
