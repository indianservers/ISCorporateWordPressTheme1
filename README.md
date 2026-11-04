# Indian Servers Corp Pro

Indian Servers Corp Pro is the WordPress website theme prepared for Indian Servers Pvt. Ltd. It presents the company as a professional software development, ERP, CRM, cloud hosting, AI automation, cyber security and managed digital solutions provider.

## Installation

1. Upload the `iscp` folder to `wp-content/themes/`.
2. In WordPress admin, go to **Appearance > Themes**.
3. Activate **Indian Servers Corp Pro**.
4. After activating the theme or adding custom post types, go to **Settings > Permalinks** and click **Save Changes** to refresh rewrite rules.

## Recommended Environment

- WordPress 6.0 or newer.
- PHP 7.4 or newer.
- Tested target: WordPress 6.5.

## Menus

Assign menus in **Appearance > Menus** or the Site Editor menu screen:

- Primary Menu
- Utility Menu
- Footer Menu
- Social Menu

## Logo

Set the logo in **Appearance > Customize > Site Identity**. If no logo is configured, the site title is used as a fallback.

## Customizer Concept

Open **Appearance > Customize > ISCP Theme Options** to manage branding, header layouts, CTAs, hero content, colors, system font choices, homepage section visibility, contact details, social links, footer content, schema output, Open Graph output, animation preferences, and frontend footer credit text.

## Demo Import Concept

Open **Appearance > Indian Servers Corp Pro > Demo Import** to import one of the included starter demos. Importing is manual, nonce-secured, permission-checked, and duplicate-protected. Demo content is original placeholder content and does not use copyrighted media.

## CPT Concept

The theme includes native WordPress custom post types for solutions, services, industries, case studies, testimonials, team members, FAQs, and pricing plans. Homepage sections automatically use CPT content when available and fall back to generic demo content when empty.

## Licensing

This theme is intended to follow the GPLv2 or later license model used by WordPress themes.

## Resale-Safe Assets

The base theme uses original PHP, CSS, JavaScript, generic placeholder markup, and system fonts. It does not bundle premium fonts, stock photos, copied screenshots, copied icons, or third-party commercial assets.

## No Page-Builder Dependency

The theme uses clean PHP templates, the WordPress template hierarchy, Gutenberg support, CSS, and vanilla JavaScript. It does not require Elementor, Divi, WPBakery, Bootstrap, Tailwind CDN, or any heavy external framework.

## Recommended Image Sizes

- Hero: 1400x900
- Card: 800x600
- Blog: 1200x675
- Case Study: 1200x800
- Logo: SVG or transparent PNG

## Recommended Plugins

- SEO plugin: Yoast SEO, Rank Math, or All in One SEO.
- Forms: Contact Form 7 or WPForms.
- Caching: LiteSpeed Cache, WP Super Cache, or another reputable caching plugin.
- WooCommerce: Optional, only when ecommerce is required.

The theme does not require these plugins. Built-in schema and Open Graph output automatically stay quiet when a major SEO plugin is active.

## WooCommerce Support

ISCP includes basic WooCommerce theme support and light styling for product archives, single products, buttons, and notices when WooCommerce is active. WooCommerce is optional and not required.

## Theme Update Process

Back up the site before updating. Upload the new `iscp` theme folder or install the packaged theme zip, then check the homepage, menus, Customizer settings, CPT archives, and permalinks. Child-theme customizations should be kept outside the parent theme folder.

## Phase 1 Software Discovery — 1.0.39

On the first dashboard visit by an administrator with permission to publish pages, the theme creates `/software-solutions/` and nine missing software-topic pages. Setup reuses matching pages and common aliases, preserves owner content and drafts, and does not change menus, Reading settings, or the homepage. Review the new pages under **Pages** after updating. Page titles, content and excerpts remain editable; excerpts supply the theme's page descriptions when no supported SEO plugin is active.

The shared internal-page contact profile uses the existing **ISCP Theme Options > Contact** settings. Public business name and description fields are provided there too. The supplied primary contact is **+91 9618222220**.

Public virtual offerings are added to WordPress's native `/wp-sitemap.xml` index. The old `/sitemap.xml` theme endpoint redirects there. Supported SEO plugins retain ownership of their metadata and sitemaps; verify their coverage of virtual routes after deployment. A physical sitemap file at the server root can take precedence and needs a separate hosting check. No robots.txt or model-training permissions are changed.

See [the implementation and deployment report](docs/phase1-implementation.html) for the page map, test results, rollback notes and remaining live checks. Phase 2 is not included.

## Phase 2 Service Pages — 1.0.40

Sixteen existing service destinations now share an internal-page service component, with calls, demonstration/quotation preparation, feature cards and curated related links. Existing URLs, editable page content and the homepage are preserved. Education ERP remains part of the school/college offerings; business management development uses the existing custom software service.

An administrator dashboard visit creates `/locations/` and `/locations/andhra-pradesh/` only when missing. Matching owner content and drafts are preserved. No city pages are generated. Review service coverage and confirm on-site arrangements before making specific delivery promises.

The enquiry composer prepares a message locally after field validation and consent. The visitor must review and send it through the existing WhatsApp/email channel. Preparing a message or opening a channel is **not** a submitted lead. No new lead storage, CRM, REST endpoint, analytics vendor, cookies or tracking database is added. An existing consent-aware analytics integration can listen for the documented privacy-limited `iscp:conversion` browser event.

Use **Appearance > Indian Servers Corp Pro > SEO & Enquiries** for local page inventory and external-measurement status. See [the Phase 2 report](docs/phase2-implementation.html) for deployment, measurement, privacy, verification and rollback details.

## Packaging Checklist

- Zip only the `iscp` folder.
- Exclude `.git`.
- Exclude `node_modules`.
- Exclude raw design files.
- Exclude unlicensed screenshots.
- Include docs and license.
- Replace placeholder support details.
- Replace `screenshot.png` with a real theme screenshot.
- Test on a fresh WordPress install.
- Refresh permalinks after activation.
