<?php
/**
 * Editable starter copy for missing software topics. Existing products retain their URLs.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

/** Return distinct topics, rather than a separate page for each keyword variation. */
function iscp_get_software_topics() {
	return array(
		'college-management-software' => array(
			'title' => 'College Management Software',
			'summary' => 'Indian Servers develops college management software around admissions, departments, student records, fees and academic administration.',
			'audience' => 'College administrators, department coordinators and admissions teams managing students across programmes and academic years.',
			'workflows' => array( 'Map admission enquiries to programme selection and student enrolment.', 'Organize department, course, batch and academic-year records.', 'Agree on fee schedules, attendance reports and staff access before implementation.', 'Define the academic reports and integrations required by each department.' ),
			'example' => 'A college can begin by documenting how admissions staff hand student records to accounts and departments. That handover determines which records should be shared and which approvals need separate permissions.',
			'question' => 'How is college software different from school software?',
			'answer' => 'Colleges often organize records by programmes, departments, semesters and batches. Start with those structures rather than copying a school workflow. Indian Servers can discuss the required customizations during discovery.',
			'related' => array( 'school-management-software', 'fee-management-software', 'student-attendance-management-software' ),
		),
		'fee-management-software' => array(
			'title' => 'Fee Management Software',
			'summary' => 'Indian Servers develops fee management workflows for schools and colleges that need fee schedules, receipts, dues tracking and administrative reports.',
			'audience' => 'School and college accounts teams handling fee collection, concessions, outstanding balances and parent enquiries.',
			'workflows' => array( 'Define fee heads, instalments, due dates and authorized concessions.', 'Record collections and receipts against the correct student and academic year.', 'Review outstanding amounts and reconcile collections with accounts.', 'Plan payment or notification integrations after reviewing the existing systems.' ),
			'example' => 'When a student pays in instalments, the office needs to see the original schedule, receipts already issued and the remaining balance. Agree on cancellation and correction permissions before moving records.',
			'question' => 'Can fee software replace the entire accounting system?',
			'answer' => 'Fee collection and full accounting solve different problems. Define whether you need only student balances and receipts or an integration with your accounting workflow. Confirm reconciliation, exports and payment-provider requirements in the project scope.',
			'related' => array( 'school-management-software', 'college-management-software', 'accounts-software' ),
		),
		'marks-management-software' => array(
			'title' => 'Marks Management Software for Schools',
			'summary' => 'Indian Servers develops marks management workflows for schools to organize subject-wise marks, grading rules, verification and academic reports.',
			'audience' => 'Teachers, examination coordinators and school administrators replacing disconnected marks sheets with a defined review process.',
			'workflows' => array( 'Document subjects, assessments, maximum marks and grading rules.', 'Assign marks-entry permissions to the responsible teachers.', 'Review corrections and obtain approval before results are released.', 'Specify report-card formats and term comparisons required by the school.' ),
			'example' => 'A school using different assessment weights for each term should agree on calculation examples before development. Teachers and the examination coordinator can then verify the same sample report together.',
			'question' => 'Can school-specific grading and report cards be discussed?',
			'answer' => 'Yes. Share sample report cards, assessment weights, rounding rules and promotion criteria with Indian Servers. These requirements need to be reviewed and agreed before implementation; no board-specific certification is implied.',
			'related' => array( 'examination-results-management-software', 'school-management-software', 'student-attendance-management-software' ),
		),
		'student-attendance-management-software' => array(
			'title' => 'Student Attendance Management Software',
			'summary' => 'Indian Servers develops student attendance workflows connecting class records, staff responsibility and attendance reports for education administrators.',
			'audience' => 'Schools and colleges that need a consistent way to record attendance and review absences by class, batch or reporting period.',
			'workflows' => array( 'Choose daily or period-wise attendance and define academic calendars.', 'Assign recording and correction permissions by class or department.', 'Review student absence histories and summary reports.', 'Assess notification or device integrations against the institution\'s actual equipment and permissions.' ),
			'example' => 'An institution switching from paper registers can first compare one class register with the required monthly report. This reveals holiday rules, late-entry handling and correction approvals before a wider rollout.',
			'question' => 'Does attendance software automatically include biometric integration?',
			'answer' => 'No. Device connectivity depends on the device vendor, available API and agreed project scope. Share the model and current process so Indian Servers can assess compatibility before committing to an integration.',
			'related' => array( 'school-management-software', 'college-management-software', 'marks-management-software' ),
		),
		'examination-results-management-software' => array(
			'title' => 'Examination and Results Management Software',
			'summary' => 'Indian Servers develops examination and results workflows covering assessment setup, marks verification and controlled result publication.',
			'audience' => 'Examination departments coordinating assessment schedules, subject records, reviewer approvals and result release.',
			'workflows' => array( 'Define examinations, subjects, assessment components and schedules.', 'Connect marks collection to a documented verification process.', 'Agree on result calculations, correction windows and approval responsibilities.', 'Specify result reports and how approved results should reach students or parents.' ),
			'example' => 'An examination coordinator may need to lock an approved result while allowing a documented correction request. Capture who can request, approve and publish each correction before development.',
			'question' => 'How does examination management relate to marks management?',
			'answer' => 'Marks management concentrates on entry, grading and report cards. Examination management also covers assessment organization and the approval-to-publication process. They can be scoped together rather than maintained as disconnected records.',
			'related' => array( 'marks-management-software', 'college-management-software', 'school-management-software' ),
		),
		'accounts-software' => array(
			'title' => 'Accounts and Accounting Software',
			'summary' => 'Indian Servers develops accounts software and accounting integrations around billing, receipts, expenses and business reporting requirements.',
			'audience' => 'Business owners and accounts teams that need operational transactions to connect with their financial records.',
			'workflows' => array( 'Map invoices, receipts, expenses and approval responsibilities.', 'Define the transaction exports and reconciliation reports required by accounts.', 'Review how sales, purchasing and inventory records should connect.', 'Confirm accountant-reviewed reporting and any statutory requirements before implementation.' ),
			'example' => 'A distributor may need sales invoices and receipts to reach its existing accounts package. Reviewing the source fields and reconciliation process is more useful than replacing accounting software without a migration plan.',
			'question' => 'Is statutory or GST compliance guaranteed?',
			'answer' => 'No compliance guarantee is implied. Ask your accountant to confirm the required tax fields, reports and filing workflow. Indian Servers can then assess the implementation or integration against that agreed specification.',
			'related' => array( 'inventory-management-software', 'sales-pos-software', 'vyapara-erp' ),
		),
		'sales-pos-software' => array(
			'title' => 'Sales Management and POS Software',
			'summary' => 'Indian Servers develops sales and point-of-sale workflows for businesses that need billing, item selection, receipts and daily sales visibility.',
			'audience' => 'Retail and sales operations reviewing how counter transactions, returns and stock records should work together.',
			'workflows' => array( 'Map item selection, billing, discounts and payment recording.', 'Define returns, cancellations and supervisor approval rules.', 'Plan stock updates and end-of-day sales reports.', 'Check receipt-printer, barcode and payment integrations before selecting a deployment approach.' ),
			'example' => 'A retail counter needs to distinguish a completed sale from a return or cancelled bill. Reviewing these cases with the store manager helps define permissions and stock adjustments.',
			'question' => 'Is retail POS the same as restaurant POS?',
			'answer' => 'Retail POS centers on item sales and counter operations. Restaurant POS can also require tables, menus and kitchen order tickets. Indian Servers already has a separate Restaurant POS offering; choose the workflow that matches your operation.',
			'related' => array( 'restaurant-pos-software', 'inventory-management-software', 'accounts-software', 'crm' ),
		),
		'task-management-software' => array(
			'title' => 'Task Management Software',
			'summary' => 'Indian Servers develops task management workflows to make ownership, due dates, status changes and approvals visible to business teams.',
			'audience' => 'Operations managers and teams tracking recurring work, handovers and follow-ups across people or departments.',
			'workflows' => array( 'Define tasks, owners, priorities and due dates.', 'Agree on status transitions and completion approvals.', 'Document recurring work and escalation responsibilities.', 'Specify team reports and connections to existing project or CRM records.' ),
			'example' => 'A support handover may need one owner, a due date and evidence of completion. Start with that daily workflow before adding project-level planning or complex dashboards.',
			'question' => 'When do we need project management instead of task management?',
			'answer' => 'Task management tracks individual work and recurring operations. Project management adds coordinated milestones, delivery planning and project reporting. Indian Servers can discuss whether the existing Project Management Software offering covers both needs.',
			'related' => array( 'project-management-software', 'crm', 'vyapara-erp' ),
		),
		'whatsapp-api-integration' => array(
			'title' => 'WhatsApp API Integration Services',
			'summary' => 'Indian Servers integrates WhatsApp messaging with business applications, CRM, ERP and notification workflows, subject to provider capabilities and approval requirements.',
			'audience' => 'Businesses and education teams planning consent-based notifications and customer communication connected to their existing records.',
			'workflows' => array( 'Identify the notification or customer-support workflow and consent records.', 'Review the selected provider, business account and approved message templates.', 'Connect authorized events using APIs, webhooks and error logs.', 'Plan human follow-up, access permissions and delivery-status handling.' ),
			'example' => 'A fee reminder workflow should check the student balance, the permitted recipient and the agreed messaging process before sending. Provider responses and failures need to be visible to the responsible staff.',
			'question' => 'Does API integration guarantee account approval or message delivery?',
			'answer' => 'No. Account approval, template decisions, messaging limits, provider charges and delivery depend on the platform and recipient conditions. Indian Servers does not claim official Meta partner status or unrestricted messaging.',
			'related' => array( 'crm', 'fee-management-software', 'custom-software-development' ),
		),
	);
}
