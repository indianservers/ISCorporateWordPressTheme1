"""Read-only HTTP acceptance checks against the isolated local WordPress site.

Usage: python tests/phase1-http.py http://127.0.0.1:8765
"""
from html.parser import HTMLParser
from urllib.request import urlopen
from urllib.error import HTTPError
from urllib.parse import urlparse
import json
import sys
import xml.etree.ElementTree as ET


class Page(HTMLParser):
    def __init__(self, source):
        super().__init__()
        self.links, self.canonicals, self.schemas, self.ids = [], [], [], []
        self.h1 = self.main = 0
        self.json_text = None
        self.feed(source)

    def handle_starttag(self, tag, attributes):
        a = dict(attributes)
        if tag == 'a' and a.get('href'):
            self.links.append(a['href'])
        if tag == 'link' and a.get('rel') == 'canonical':
            self.canonicals.append(a['href'])
        if a.get('id'):
            self.ids.append(a['id'])
        self.h1 += tag == 'h1'
        self.main += tag == 'main'
        if tag == 'script' and a.get('type') == 'application/ld+json':
            self.json_text = ''

    def handle_data(self, text):
        if self.json_text is not None:
            self.json_text += text

    def handle_endtag(self, tag):
        if tag == 'script' and self.json_text is not None:
            self.schemas.append(json.loads(self.json_text))
            self.json_text = None


base = sys.argv[1].rstrip('/')
if urlparse(base).hostname not in ('127.0.0.1', 'localhost'):
    raise SystemExit('Run only against the isolated localhost test site.')


def get(path):
    try:
        with urlopen(base + path, timeout=30) as response:
            return response.status, response.read().decode('utf-8'), response.url
    except HTTPError as error:
        return error.code, error.read().decode('utf-8'), error.url


checks = 0


def check(condition, message):
    global checks
    assert condition, message
    checks += 1


code, source, _ = get('/software-solutions/')
check(code == 200, 'Hub is not public.')
hub = Page(source)
check('Vijayawada' in source and 'Markapur' in source, 'Service-area copy missing.')
destinations = sorted({url for url in hub.links if url.startswith(base) and any(
    part in url for part in ('/products/', '/services/', '-software/', '-integration/')
)})
check(len(destinations) >= 18, 'Hub is missing offering destinations.')
for url in [base + '/software-solutions/'] + destinations:
    code, source, final = get(url[len(base):])
    page = Page(source)
    check(code == 200 and final == url, 'Broken URL or unexpected redirect: ' + url)
    check(page.h1 == 1, 'Expected one H1: ' + url)
    check(page.main == 1, 'Expected one main landmark: ' + url)
    check(len(page.ids) == len(set(page.ids)), 'Duplicate IDs: ' + url)
    check(page.canonicals == [url], 'Missing or duplicate canonical: ' + url)
    check(len(page.schemas) == 1, 'Missing or duplicate JSON-LD: ' + url)
    graph = page.schemas[0]['@graph']
    organizations = [node for node in graph if node['@type'] == 'Organization']
    check(len(organizations) == 1, 'Organization is duplicated: ' + url)
    check(organizations[0]['telephone'] == '+919618222220', 'Incorrect schema phone: ' + url)
    check('aggregateRating' not in json.dumps(graph), 'Unsupported ratings: ' + url)
    check('tel:+919618222220' in page.links, 'Missing telephone link: ' + url)
    check('Relevant search focus:' not in source and '>Search Focus<' not in source,
          'Visitor-facing SEO instructions: ' + url)

for path in ('/products/not-a-real-product/', '/services/not-a-real-service/', '/blog/page/9999/'):
    check(get(path)[0] == 404, 'Invalid route returned success: ' + path)

for path in ('/products/', '/services/', '/solutions/', '/blog/'):
    code, source, final = get(path)
    check(code == 200, 'Index route unavailable: ' + path)
    check(Page(source).canonicals == [final], 'Index canonical is incorrect: ' + path)

code, source, _ = get('/wp-sitemap.xml')
check(code == 200, 'Native sitemap index unavailable.')
index = ET.fromstring(source)
ns = {'s': 'http://www.sitemaps.org/schemas/sitemap/0.9'}
provider_urls = [node.text for node in index.findall('s:sitemap/s:loc', ns)
                 if 'iscpofferings' in node.text]
check(bool(provider_urls), 'Virtual routes missing from sitemap index.')
for url in provider_urls:
    code, source, _ = get(url[len(base):])
    check(code == 200, 'Virtual sitemap unavailable.')
    ET.fromstring(source)
code, _, destination = get('/sitemap.xml')
check(code == 200 and destination.endswith('/wp-sitemap.xml'), 'Legacy sitemap compatibility failed.')
check(get('/robots.txt')[0] == 200, 'WordPress robots.txt unavailable.')
print(f'PASS: {checks} HTTP assertions across {len(destinations) + 1} offering/hub pages.')
