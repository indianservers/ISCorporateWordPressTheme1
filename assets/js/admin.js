(function () {
	'use strict';

	window.ISCP = window.ISCP || {};
	window.ISCP.adminReady = true;

	document.addEventListener('submit', function (event) {
		var form = event.target;

		if (!form || !form.querySelector('input[name="action"][value="iscp_import_demo"]')) {
			return;
		}

		if (!window.confirm('Import this demo content now? Existing content will not be deleted.')) {
			event.preventDefault();
		}
	});
}());
