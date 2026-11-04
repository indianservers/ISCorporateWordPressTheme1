"""Phase 2 read-only checks. Run against localhost after the Phase 1 checks."""
from html.parser import HTMLParser
from urllib.request import urlopen
from urllib.parse import urlparse
import json
import sys
import xml.etree.ElementTree as ET

base = sys.argv[1].rstrip('/')
if urlparse(base).hostname not in ('127.0.0.1', 'localhost'):
    raise SystemExit('Local disposable site only.')


class Page(HTMLParser):
    def __init__(self, source):
        super().__init__()
        self.tags = []
        self.schemas = []
        self.script = None
        self.title = ''
        self.in_title = False
        self.feed(source)

    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        self.tags.append((tag, attrs))
        if tag == 'title':
            self.in_title = True
        if tag == 'script' and attrs.get('type') == 'application/ld+json':
            self.script = ''

    def handle_data(self, data):
        if self.in_title:
            self.title += data
        if self.script is not None:
            self.script += data

    def handle_endtag(self, tag):
        if tag == 'title':
            self.in_title = False
        if tag == 'script' and self.script is not None:
            self.schemas.append(json.loads(self.script))
            self.script = None


checks = 0


def check(value, message):
    global checks
    assert value, message
    checks += 1


def fetch(path):
    with urlopen(base + path, timeout=30) as response:
        check(response.status == 200, path + ' unavailable')
        check(response.url == base + path, 'Unexpected redirect: ' + path)
        return response.read().decode('utf-8')


paths = [
    '/products/school-management-software/', '/college-management-software/',
    '/fee-management-software/', '/marks-management-software/',
    '/student-attendance-management-software/', '/examination-results-management-software/',
    '/products/crm/', '/sales-pos-software/', '/accounts-software/',
    '/products/vyapara-erp/', '/products/project-management-software/',
    '/task-management-software/', '/services/custom-software-development/',
    '/services/web-application-development/', '/products/inventory-management-software/',
    '/whatsapp-api-integration/',
]
titles = []
descriptions = []
for path in paths:
    source = fetch(path)
    page = Page(source)
    titles.append(page.title)
    description = next((a.get('content') for t, a in page.tags if t == 'meta' and a.get('name') == 'description'), '')
    check(bool(description), 'Service description missing')
    descriptions.append(description)
    forms = [a for t, a in page.tags if t == 'form' and 'data-iscp-enquiry-form' in a]
    check(len(forms) == 1, 'Missing/duplicate service composer: ' + path)
    check(forms[0]['method'] == 'post', 'PII could enter URL through GET: ' + path)
    fields = {a.get('name'): a for t, a in page.tags if t in ('input', 'select', 'textarea')}
    for name in ('name', 'phone', 'organization', 'service', 'city', 'message', 'consent'):
        check('required' in fields[name], 'Required field missing: ' + name)
    check('required' not in fields['email'], 'Email unexpectedly mandatory')
    check('No form details are stored' in source, 'Missing data-handling explanation')
    check('not a submitted enquiry' in source, 'False submission confirmation')
    check(any(a.get('src', '').find('service-enquiry.js') >= 0 for t, a in page.tags if t == 'script'), 'Missing service script')
    check(any('data-iscp-interest' in a and a['data-iscp-interest'] == 'quotation' for _, a in page.tags), 'Quotation action missing')
    check('iscp-service-feature-grid' in source, 'Feature cards missing')
    check('/locations/andhra-pradesh/' in source, 'Regional context missing')
    check(len(page.schemas) == 1, 'Duplicate schema')
    crumbs = next(n for n in page.schemas[0]['@graph'] if n['@type'] == 'BreadcrumbList')
    check(crumbs['itemListElement'][1]['name'] == 'Software Solutions', 'Breadcrumb differs from visible service hierarchy')

check(len(titles) == len(set(titles)), 'Duplicate service titles')
check(len(descriptions) == len(set(descriptions)), 'Duplicate service descriptions')

for path in ('/locations/', '/locations/andhra-pradesh/'):
    source = fetch(path)
    page = Page(source)
    check(sum(t == 'h1' for t, _ in page.tags) == 1, 'Location H1 incorrect')
    check(sum(t == 'main' for t, _ in page.tags) == 1, 'Location main landmark incorrect')
    check(len(page.schemas) == 1, 'Location schema duplicated')
    check([a['href'] for t, a in page.tags if t == 'link' and a.get('rel') == 'canonical'] == [base + path], 'Location canonical incorrect')
    if path.endswith('/andhra-pradesh/'):
        check('not a list of Indian Servers offices' in source, 'Location/office distinction missing')
        check('Vijayawada' in source and 'Proddatur' in source, 'Regional markets missing')
        check(any(n['@type'] == 'CollectionPage' for n in page.schemas[0]['@graph']), 'Region collection schema missing')
        check('LocalBusiness' not in json.dumps(page.schemas), 'Unverified office schema')

source = fetch('/')
check('service-enquiry.js' not in source and 'service-experience.css' not in source, 'Phase 2 assets leaked onto homepage')
check('data-iscp-enquiry-composer' not in source, 'Enquiry form leaked onto homepage')

namespace = {'s': 'http://www.sitemaps.org/schemas/sitemap/0.9'}
index = ET.fromstring(fetch('/wp-sitemap.xml'))
page_maps = [n.text for n in index.findall('s:sitemap/s:loc', namespace) if 'posts-page' in n.text]
urls = []
for url in page_maps:
    sitemap = ET.fromstring(fetch(url[len(base):]))
    urls.extend(n.text for n in sitemap.findall('s:url/s:loc', namespace))
check(base + '/locations/andhra-pradesh/' in urls, 'Region absent from native sitemap')
check(len(urls) == len(set(urls)), 'Native page sitemap has duplicate URLs')
print(f'PASS: {checks} Phase 2 HTTP assertions on {len(paths)} enhanced service routes and regional pages.')
