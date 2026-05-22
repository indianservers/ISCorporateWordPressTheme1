# Indian Servers Manual WordPress Page Content

Use this document while creating pages manually in WordPress. For each page, create a WordPress page with the listed title and slug, then paste the matching HTML into the page editor using a Custom HTML block or Code Editor mode.

## Pages To Create

### Core Pages
| Title | Slug | Purpose |
|---|---|---|
| About Indian Servers | `/about/` | Company profile, trust, delivery presence |
| Services | `/services/` | Service index page |
| Products | `/products/` | Product index page |
| Contact | `/contact/` | Contact and enquiry page |
| Recent News | `/blog/` | WordPress posts/news listing |

### Product Pages
| Title | Slug |
|---|---|
| HRMS Software | `/products/hrms/` |
| School Management Software | `/products/school-management-software/` |
| CRM Software | `/products/crm/` |
| Inventory Management Software | `/products/inventory-management-software/` |
| Restaurant POS Software | `/products/restaurant-pos-software/` |
| Vyapara ERP | `/products/vyapara-erp/` |
| Learning Management System | `/products/learning-management-system/` |
| Project Management Software | `/products/project-management-software/` |
| AI Business Assistant | `/products/ai-business-assistant/` |
| Cloud Hosting Platform | `/products/cloud-hosting-platform/` |

### Service Pages
| Title | Slug |
|---|---|
| Custom Software Development | `/services/custom-software-development/` |
| Web Application Development | `/services/web-application-development/` |
| Mobile App Development | `/services/mobile-app-development/` |
| AI Development | `/services/ai-development/` |
| AR/VR Development | `/services/ar-vr-development/` |
| Cloud Hosting | `/services/cloud-hosting/` |
| Cyber Security & VAPT | `/services/cyber-security-vapt/` |
| Dedicated Development Teams | `/services/dedicated-development-teams/` |
| WordPress Development | `/services/wordpress-development/` |
| Ecommerce Development | `/services/ecommerce-development/` |
| API & Integration Services | `/services/api-integration/` |
| UI/UX Design | `/services/ui-ux-design/` |
| DevOps & Monitoring | `/services/devops-monitoring/` |
| Software Maintenance | `/services/software-maintenance/` |

---

## Shared HTML Style

These blocks use plain HTML classes so the theme can style them cleanly. They are built as rich components: hero, metrics, cards, timeline, technology chips and CTA.

---

## Core Page Content

### Title: About Indian Servers

```html
<section class="iscp-manual-hero">
  <p class="iscp-eyebrow">Indian Servers Pvt. Ltd.</p>
  <h1>Bridging Innovation and Tradition in IT</h1>
  <p>Indian Servers helps organizations build dependable software, secure cloud infrastructure, AI-enabled workflows and long-term digital systems with practical Indian business understanding and global delivery discipline.</p>
  <div class="iscp-action-row">
    <a class="iscp-btn iscp-btn-gold" href="/contact/">Talk to Indian Servers</a>
    <a class="iscp-btn iscp-btn-ghost" href="/services/">Explore Services</a>
  </div>
</section>

<section class="iscp-manual-metrics">
  <article><strong>2200+</strong><span>Clients Served</span></article>
  <article><strong>2009</strong><span>Founded</span></article>
  <article><strong>India | USA | Aus</strong><span>Delivery Presence</span></article>
  <article><strong>9 AM - 5 PM</strong><span>Business Hours</span></article>
</section>

<section class="iscp-manual-grid">
  <article><h2>Software Engineering</h2><p>We design and build SaaS products, ERP systems, CRMs, portals, dashboards and mobile applications that are secure, scalable and supportable.</p></article>
  <article><h2>Cloud and Hosting</h2><p>Our hosting and cloud teams support websites, business applications, VPS, backups, SSL, monitoring and performance readiness.</p></article>
  <article><h2>AI and Security</h2><p>Indian Servers combines AI automation, document intelligence, cybersecurity, VAPT and secure deployment practices for modern business systems.</p></article>
</section>

<section class="iscp-manual-cta">
  <h2>Build with a team that understands both technology and business reality.</h2>
  <p>For custom software, cloud hosting, AI, VAPT or product engineering, contact Indian Servers.</p>
  <a class="iscp-btn iscp-btn-gold" href="/contact/">Start a Project</a>
</section>
```

### Title: Services

```html
<section class="iscp-manual-hero">
  <p class="iscp-eyebrow">Technology Services</p>
  <h1>Software, Cloud, AI and Security Services by Indian Servers</h1>
  <p>From idea to launch and long-term support, Indian Servers provides practical technology services for businesses, institutions, startups and enterprise teams.</p>
</section>

<section class="iscp-manual-grid">
  <article><h2>Build</h2><p>Custom software, web applications, mobile apps, WordPress, ecommerce and API integrations.</p></article>
  <article><h2>Scale</h2><p>Cloud hosting, DevOps, monitoring, backups, performance optimization and managed infrastructure.</p></article>
  <article><h2>Secure</h2><p>Cybersecurity, VAPT, hardening, access control review and secure deployment practices.</p></article>
  <article><h2>Automate</h2><p>AI assistants, workflow automation, document intelligence and data-driven operational tools.</p></article>
</section>

<section class="iscp-manual-cta">
  <h2>Need a reliable technology partner?</h2>
  <p>Indian Servers can plan, build, host, secure and maintain your digital systems.</p>
  <a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss Requirement</a>
</section>
```

### Title: Products

```html
<section class="iscp-manual-hero">
  <p class="iscp-eyebrow">SaaS Products</p>
  <h1>Business Software Products Built for Practical Operations</h1>
  <p>Indian Servers product platforms help manage HR, schools, CRM, inventory, restaurants, ERP, learning, projects, AI assistance and cloud hosting operations.</p>
</section>

<section class="iscp-manual-grid">
  <article><h2>Operational Control</h2><p>Role-based dashboards, approvals, reports and workflows for daily business clarity.</p></article>
  <article><h2>Configurable Modules</h2><p>Adapt modules for Indian business processes, institutional workflows and branch-level operations.</p></article>
  <article><h2>Cloud Ready</h2><p>Deploy on secure Indian Servers hosting with backups, SSL, monitoring and long-term maintenance.</p></article>
</section>

<section class="iscp-manual-cta">
  <h2>Choose a product, then customize it for your organization.</h2>
  <a class="iscp-btn iscp-btn-gold" href="/contact/">Request Product Discussion</a>
</section>
```

### Title: Contact

```html
<section class="iscp-manual-hero">
  <p class="iscp-eyebrow">Contact Indian Servers</p>
  <h1>Talk to Our Software, Cloud and AI Team</h1>
  <p>Speak with Indian Servers for software development, SaaS products, cloud hosting, AI, AR/VR, VAPT, dedicated teams and long-term support.</p>
</section>

<section class="iscp-manual-grid">
  <article><h2>Mobile</h2><p><a href="tel:+919618222220">+91 9618222220</a></p></article>
  <article><h2>Email</h2><p><a href="mailto:info@indianservers.com">info@indianservers.com</a></p></article>
  <article><h2>Presence</h2><p>India | USA | Aus</p></article>
  <article><h2>Business Hours</h2><p>9 AM - 5 PM</p></article>
</section>

<section class="iscp-manual-cta">
  <h2>Send your requirement to Indian Servers.</h2>
  <p>For fastest response, include the product or service you need, expected timeline and current business challenge.</p>
  <a class="iscp-btn iscp-btn-gold" href="https://wa.me/919618222220">Send WhatsApp</a>
</section>
```

---

## Product Page Content

### Title: HRMS Software

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>HRMS Software for Attendance, Leave, Payroll Support and HR Control</h1><p>Indian Servers HRMS helps organizations manage employee records, attendance, leave, approvals, onboarding and HR reporting from one secure platform.</p></section>
<section class="iscp-manual-metrics"><article><strong>People</strong><span>Employee lifecycle</span></article><article><strong>Attendance</strong><span>Shifts and reports</span></article><article><strong>Approvals</strong><span>Leave and HR workflows</span></article><article><strong>Self Service</strong><span>Staff dashboards</span></article></section>
<section class="iscp-manual-grid"><article><h2>Employee Master Data</h2><p>Central profiles, documents, departments, roles and joining details.</p></article><article><h2>Attendance Intelligence</h2><p>Daily attendance, shift tracking, late marks and payroll-ready summaries.</p></article><article><h2>Leave Workflows</h2><p>Manager approvals, balance visibility and clean HR audit trails.</p></article><article><h2>Reports</h2><p>Practical dashboards for HR, management and compliance preparation.</p></article></section>
<section class="iscp-manual-process"><h2>Implementation Flow</h2><ol><li>Map departments and policies.</li><li>Configure attendance and leave rules.</li><li>Import employee data.</li><li>Launch dashboards and reports.</li></ol></section>
<section class="iscp-manual-cta"><h2>Modernize HR operations with Indian Servers HRMS.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Request HRMS Demo</a></section>
```

### Title: School Management Software

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>School Management Software for Complete Institution Operations</h1><p>A practical platform for admissions, fees, attendance, exams, transport, parent communication and administration.</p></section>
<section class="iscp-manual-grid"><article><h2>Admissions</h2><p>Enquiry, admission, student profiles and document readiness.</p></article><article><h2>Fees</h2><p>Collections, receipts, dues tracking and financial visibility.</p></article><article><h2>Academics</h2><p>Attendance, exams, marks, reports and communication.</p></article><article><h2>Transport</h2><p>Route allocation, student mapping and administrative control.</p></article></section>
<section class="iscp-manual-metrics"><article><strong>Parents</strong><span>Communication ready</span></article><article><strong>Teachers</strong><span>Academic workflows</span></article><article><strong>Office</strong><span>Fees and records</span></article><article><strong>Management</strong><span>Reports and overview</span></article></section>
<section class="iscp-manual-cta"><h2>Run your institution with better visibility and less manual work.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss School ERP</a></section>
```

### Title: CRM Software

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>CRM Software for Lead, Customer and Follow-Up Management</h1><p>Indian Servers CRM gives sales, support and service teams a structured way to manage enquiries, customers, tasks, communication and conversion visibility.</p></section>
<section class="iscp-manual-grid"><article><h2>Lead Pipeline</h2><p>Track enquiry source, owner, stage, follow-up date and next action.</p></article><article><h2>Customer History</h2><p>Maintain calls, emails, notes, requirements and service context.</p></article><article><h2>Team Tasks</h2><p>Assign ownership, reminders and escalations for better follow-through.</p></article><article><h2>Sales Reports</h2><p>View conversion, pending follow-ups and team performance.</p></article></section>
<section class="iscp-manual-cta"><h2>Never lose a serious enquiry again.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Request CRM Walkthrough</a></section>
```

### Title: Inventory Management Software

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>Inventory Management Software for Stock, Purchase, Sales and Warehouse Control</h1><p>Manage item movement, vendor workflows, branch stock, reorder levels and business reports in one organized system.</p></section>
<section class="iscp-manual-grid"><article><h2>Stock Ledger</h2><p>Track item inward, outward, adjustment and transfer history.</p></article><article><h2>Purchase Control</h2><p>Vendor, purchase order, receiving and pricing visibility.</p></article><article><h2>Sales and Billing</h2><p>Connect stock availability with sales and invoicing workflows.</p></article><article><h2>Warehouse Reports</h2><p>Monitor reorder, dead stock, branch stock and fast-moving items.</p></article></section>
<section class="iscp-manual-cta"><h2>Bring clarity to stock movement and purchasing decisions.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Plan Inventory System</a></section>
```

### Title: Restaurant POS Software

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>Restaurant POS Software for Billing, KOT, Tables and Branch Reporting</h1><p>Indian Servers Restaurant POS supports dining, takeaway, delivery, kitchen order tickets, menu control and daily sales reporting.</p></section>
<section class="iscp-manual-grid"><article><h2>Fast Billing</h2><p>Table, counter, takeaway and delivery billing workflows.</p></article><article><h2>KOT Control</h2><p>Kitchen order tickets, preparation flow and menu mapping.</p></article><article><h2>Inventory Link</h2><p>Purchase, item usage and wastage control readiness.</p></article><article><h2>Daily Reports</h2><p>Sales, taxes, branch performance and operational summaries.</p></article></section>
<section class="iscp-manual-cta"><h2>Serve faster, bill cleaner and manage branches with confidence.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss Restaurant POS</a></section>
```

### Title: Vyapara ERP

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>Vyapara ERP for Growing SMEs and Operational Teams</h1><p>A modular ERP for businesses that need purchase, sales, stock, accounts-ready data, staff workflows and management dashboards.</p></section>
<section class="iscp-manual-grid"><article><h2>Modular ERP</h2><p>Start with essential modules and expand as operations mature.</p></article><article><h2>Business Workflows</h2><p>Purchase, sales, inventory, approvals and branch-level activity.</p></article><article><h2>Dashboards</h2><p>Practical decision views for owners and managers.</p></article><article><h2>Integration Ready</h2><p>Prepared for accounting, SMS, WhatsApp and custom APIs.</p></article></section>
<section class="iscp-manual-cta"><h2>Move from scattered spreadsheets to organized ERP control.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Explore Vyapara ERP</a></section>
```

### Title: Learning Management System

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>Learning Management System for Courses, Tests and Certificates</h1><p>Deliver structured online learning with course content, batches, assignments, quizzes, certificates and learner progress dashboards.</p></section>
<section class="iscp-manual-grid"><article><h2>Course Builder</h2><p>Organize lessons, videos, documents and assignments.</p></article><article><h2>Assessments</h2><p>Quizzes, tests, marks and completion rules.</p></article><article><h2>Certificates</h2><p>Issue certificates after course completion or assessment results.</p></article><article><h2>Trainer Dashboard</h2><p>Track learner progress and batch performance.</p></article></section>
<section class="iscp-manual-cta"><h2>Launch a serious digital learning platform with Indian Servers.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Plan LMS</a></section>
```

### Title: Project Management Software

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">SaaS Product</p><h1>Project Management Software for Tasks, Milestones and Delivery Visibility</h1><p>Plan projects, assign ownership, monitor timelines, manage approvals and keep clients and teams aligned.</p></section>
<section class="iscp-manual-grid"><article><h2>Task Ownership</h2><p>Assign work, due dates, priority and status clearly.</p></article><article><h2>Milestones</h2><p>Track project phases, delivery checkpoints and approvals.</p></article><article><h2>Team Visibility</h2><p>Dashboards for managers, clients and contributors.</p></article><article><h2>Reports</h2><p>Delivery health, open tasks, overdue work and performance views.</p></article></section>
<section class="iscp-manual-cta"><h2>Bring discipline and visibility to project delivery.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss Project Software</a></section>
```

### Title: AI Business Assistant

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">AI Product</p><h1>AI Business Assistant for Knowledge, Documents and Workflow Automation</h1><p>Indian Servers builds AI assistants that can search internal knowledge, summarize documents, support staff, guide customers and connect with business systems.</p></section>
<section class="iscp-manual-grid"><article><h2>Private Knowledge AI</h2><p>Use internal documents, FAQs, policies and process data safely.</p></article><article><h2>Document Intelligence</h2><p>Summaries, extraction, classification and search workflows.</p></article><article><h2>Business Integrations</h2><p>Connect AI with CRM, ERP, websites and support systems.</p></article><article><h2>Human Handoff</h2><p>Keep important decisions reviewable and accountable.</p></article></section>
<section class="iscp-manual-cta"><h2>Add practical AI to real business work.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Build AI Assistant</a></section>
```

### Title: Cloud Hosting Platform

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Cloud Product</p><h1>Cloud Hosting Platform for Websites, Apps and Business-Critical Systems</h1><p>Managed hosting, VPS, cloud deployment, SSL, backups, monitoring and support for WordPress, PHP, .NET and custom applications.</p></section>
<section class="iscp-manual-grid"><article><h2>Managed Servers</h2><p>VPS and cloud setup for reliable application hosting.</p></article><article><h2>Security Basics</h2><p>SSL, hardening, access control and update readiness.</p></article><article><h2>Backups</h2><p>Backup planning and recovery confidence for business systems.</p></article><article><h2>Monitoring</h2><p>Uptime, performance and support visibility.</p></article></section>
<section class="iscp-manual-cta"><h2>Host with a team that understands software too.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss Cloud Hosting</a></section>
```

---

## Service Page Content

### Title: Custom Software Development

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Engineering Service</p><h1>Custom Software Development for Serious Business Workflows</h1><p>Indian Servers builds tailored software using .NET, PHP, Python, Node.js, databases, APIs and cloud deployment practices.</p></section>
<section class="iscp-manual-grid"><article><h2>Requirement Study</h2><p>We map workflows, users, roles, data and business outcomes before development.</p></article><article><h2>Architecture</h2><p>Clean modules, secure access, scalable database design and integration readiness.</p></article><article><h2>Development</h2><p>Practical dashboards, workflows, reports, APIs and user-friendly interfaces.</p></article><article><h2>Support</h2><p>Maintenance, improvements, deployment, monitoring and long-term ownership.</p></article></section>
<section class="iscp-manual-cta"><h2>Build software around your business, not the other way around.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Start Custom Software Project</a></section>
```

### Title: Web Application Development

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Web Apps</p><h1>Secure Web Application Development for Portals, SaaS and Dashboards</h1><p>We build customer portals, admin panels, SaaS platforms and internal applications that are usable, secure and deployment-ready.</p></section>
<section class="iscp-manual-grid"><article><h2>Admin Panels</h2><p>Role-based dashboards for operations and management.</p></article><article><h2>Customer Portals</h2><p>Self-service, tracking, support and account workflows.</p></article><article><h2>SaaS Platforms</h2><p>Subscription-ready, multi-user and scalable product systems.</p></article><article><h2>Performance</h2><p>Optimized frontend, APIs and hosting readiness.</p></article></section>
<section class="iscp-manual-cta"><h2>Create a web application customers and teams can rely on.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Plan Web App</a></section>
```

### Title: Mobile App Development

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Mobile Apps</p><h1>Mobile App Development for Customers, Staff and Field Operations</h1><p>Indian Servers builds Android and cross-platform mobile applications connected to business dashboards, APIs and cloud systems.</p></section>
<section class="iscp-manual-grid"><article><h2>Customer Apps</h2><p>Bookings, ordering, service requests, notifications and account access.</p></article><article><h2>Staff Apps</h2><p>Attendance, field reporting, task updates and internal workflows.</p></article><article><h2>API Connected</h2><p>Secure backend integration with CRM, ERP, LMS or custom systems.</p></article><article><h2>Launch Support</h2><p>Testing, deployment assistance and post-launch improvements.</p></article></section>
<section class="iscp-manual-cta"><h2>Put business workflows into the hands of users.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss Mobile App</a></section>
```

### Title: AI Development

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">AI Development</p><h1>AI Development for Automation, Assistants and Document Intelligence</h1><p>We add practical AI to business workflows where it improves speed, clarity, customer experience and operational decision-making.</p></section>
<section class="iscp-manual-grid"><article><h2>AI Assistants</h2><p>Website, internal, support and knowledge-base assistants.</p></article><article><h2>Document AI</h2><p>Extraction, search, classification and summary workflows.</p></article><article><h2>Automation</h2><p>Reduce repetitive work with guided, reviewable AI steps.</p></article><article><h2>Integration</h2><p>Connect AI with CRM, ERP, email, WhatsApp and dashboards.</p></article></section>
<section class="iscp-manual-cta"><h2>Use AI where it creates measurable business value.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Start AI Discussion</a></section>
```

### Title: AR/VR Development

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Immersive Technology</p><h1>AR/VR Development for Training, Visualization and Product Experiences</h1><p>Indian Servers creates immersive experiences for education, training, demonstrations, simulations and brand engagement.</p></section>
<section class="iscp-manual-grid"><article><h2>Training Simulations</h2><p>Interactive learning environments for better understanding and retention.</p></article><article><h2>Product Visualization</h2><p>Demonstrate products, spaces and systems with richer context.</p></article><article><h2>Education Experiences</h2><p>Immersive modules for institutions and learning platforms.</p></article><article><h2>Web and Device Ready</h2><p>Plan AR/VR for practical access and maintainability.</p></article></section>
<section class="iscp-manual-cta"><h2>Create experiences people remember.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Explore AR/VR</a></section>
```

### Title: Cloud Hosting

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Managed Cloud</p><h1>Cloud Hosting for Websites, Apps, VPS and Business Systems</h1><p>Indian Servers provides cloud hosting, VPS, migrations, SSL, backups, monitoring and deployment support.</p></section>
<section class="iscp-manual-grid"><article><h2>VPS and Cloud</h2><p>Server setup for WordPress, PHP, .NET and custom apps.</p></article><article><h2>Migration</h2><p>Move websites and applications with planning and care.</p></article><article><h2>Backups and SSL</h2><p>Essential infrastructure practices for business continuity.</p></article><article><h2>Monitoring</h2><p>Uptime, performance and maintenance visibility.</p></article></section>
<section class="iscp-manual-cta"><h2>Host important systems with experienced software people.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Get Hosting Support</a></section>
```

### Title: Cyber Security & VAPT

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Cyber Security</p><h1>Cyber Security and VAPT for Safer Digital Systems</h1><p>We help identify vulnerabilities, review application risks, harden deployments and improve security confidence before and after launch.</p></section>
<section class="iscp-manual-grid"><article><h2>Vulnerability Assessment</h2><p>Find known weaknesses across applications and infrastructure.</p></article><article><h2>Penetration Testing</h2><p>Simulate real attack paths and document risks clearly.</p></article><article><h2>Hardening</h2><p>Improve server, application, access and deployment security.</p></article><article><h2>Reporting</h2><p>Actionable findings for management and technical teams.</p></article></section>
<section class="iscp-manual-cta"><h2>Security should be built into the system, not added after trouble.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss VAPT</a></section>
```

### Title: Dedicated Development Teams

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Dedicated Teams</p><h1>Dedicated Development Teams for Long-Term Product Delivery</h1><p>Hire dedicated developers, designers, testers and support engineers through Indian Servers for ongoing software and product work.</p></section>
<section class="iscp-manual-grid"><article><h2>Developers</h2><p>.NET, PHP, Python, WordPress, frontend, backend and API skills.</p></article><article><h2>Design and QA</h2><p>UI/UX, testing, usability and release confidence.</p></article><article><h2>Managed Delivery</h2><p>Team coordination, reporting and milestone tracking.</p></article><article><h2>Flexible Scaling</h2><p>Add skills as the product roadmap grows.</p></article></section>
<section class="iscp-manual-cta"><h2>Extend your team with reliable engineering capacity.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Build Dedicated Team</a></section>
```

### Title: WordPress Development

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">WordPress</p><h1>WordPress Development for Corporate Websites and Custom Platforms</h1><p>Indian Servers builds WordPress websites, custom themes, plugins, performance improvements, security updates and managed WordPress hosting.</p></section>
<section class="iscp-manual-grid"><article><h2>Corporate Websites</h2><p>Professional pages, navigation, content structure and conversion paths.</p></article><article><h2>Custom Themes</h2><p>Brand-aligned themes built for speed and maintainability.</p></article><article><h2>Plugins and Integrations</h2><p>Forms, CRM, payment, WhatsApp and business workflow connections.</p></article><article><h2>Care Plans</h2><p>Updates, backups, security checks and performance tuning.</p></article></section>
<section class="iscp-manual-cta"><h2>Create a WordPress website that feels like a serious business asset.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Start WordPress Project</a></section>
```

### Title: Ecommerce Development

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Ecommerce</p><h1>Ecommerce Development for Stores, Catalogues and Order Workflows</h1><p>We build ecommerce systems with product catalogues, payment flows, order dashboards, inventory readiness and customer communication.</p></section>
<section class="iscp-manual-grid"><article><h2>Storefront</h2><p>Clean product presentation, cart and checkout experience.</p></article><article><h2>Payments</h2><p>Payment gateway integration and order confirmation workflows.</p></article><article><h2>Inventory Link</h2><p>Stock, catalogue and operations integration readiness.</p></article><article><h2>Reports</h2><p>Orders, customers, revenue and fulfillment visibility.</p></article></section>
<section class="iscp-manual-cta"><h2>Launch ecommerce with the operational backbone it deserves.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss Ecommerce</a></section>
```

### Title: API & Integration Services

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Integrations</p><h1>API and Integration Services for Connected Business Systems</h1><p>Indian Servers connects payment gateways, SMS, WhatsApp, accounting, CRM, ERP, ecommerce and third-party platforms.</p></section>
<section class="iscp-manual-grid"><article><h2>Payment APIs</h2><p>Gateways, transaction status and order confirmation flows.</p></article><article><h2>Communication APIs</h2><p>SMS, email, WhatsApp and notification workflows.</p></article><article><h2>Business Systems</h2><p>CRM, ERP, accounting and operational data exchange.</p></article><article><h2>Secure Architecture</h2><p>Authentication, logs, retries and error handling.</p></article></section>
<section class="iscp-manual-cta"><h2>Make your systems talk to each other cleanly.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Plan Integration</a></section>
```

### Title: UI/UX Design

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Product Design</p><h1>UI/UX Design for Dashboards, Portals and Business Applications</h1><p>We design practical interfaces for real users, repeated workflows, data-heavy screens and professional product experiences.</p></section>
<section class="iscp-manual-grid"><article><h2>User Journeys</h2><p>Map actions, decisions and friction points before interface design.</p></article><article><h2>Dashboard Design</h2><p>Organize reports, controls and status views for fast scanning.</p></article><article><h2>Design Systems</h2><p>Reusable components for consistency and faster development.</p></article><article><h2>Prototype Review</h2><p>Validate the experience before engineering begins.</p></article></section>
<section class="iscp-manual-cta"><h2>Design software people can actually use every day.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Discuss UI/UX</a></section>
```

### Title: DevOps & Monitoring

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">DevOps</p><h1>DevOps and Monitoring for Reliable Software Operations</h1><p>Indian Servers supports CI/CD, server setup, uptime monitoring, backups, logs, deployments and ongoing maintenance operations.</p></section>
<section class="iscp-manual-grid"><article><h2>Deployment Pipelines</h2><p>Controlled releases for websites, APIs and applications.</p></article><article><h2>Monitoring</h2><p>Track uptime, performance, errors and server health.</p></article><article><h2>Backup Planning</h2><p>Recovery-ready systems for business continuity.</p></article><article><h2>Maintenance</h2><p>Updates, patches, logs and operational improvements.</p></article></section>
<section class="iscp-manual-cta"><h2>Keep software stable after launch.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Improve Operations</a></section>
```

### Title: Software Maintenance

```html
<section class="iscp-manual-hero"><p class="iscp-eyebrow">Support</p><h1>Software Maintenance for Fixes, Upgrades, Security and Long-Term Reliability</h1><p>We maintain existing software through bug fixing, performance tuning, upgrades, security patches, monitoring and planned improvements.</p></section>
<section class="iscp-manual-grid"><article><h2>Bug Fixing</h2><p>Investigate issues, stabilize workflows and reduce operational friction.</p></article><article><h2>Upgrades</h2><p>Modernize frameworks, plugins, libraries, servers and integrations.</p></article><article><h2>Performance</h2><p>Improve page speed, query behavior, API response and server readiness.</p></article><article><h2>Security</h2><p>Patch vulnerabilities, review access and strengthen deployments.</p></article></section>
<section class="iscp-manual-cta"><h2>Give existing software the care it needs to keep serving the business.</h2><a class="iscp-btn iscp-btn-gold" href="/contact/">Request Maintenance Support</a></section>
```

