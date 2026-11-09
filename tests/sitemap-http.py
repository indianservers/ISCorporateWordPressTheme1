"""Run against a disposable local WordPress server with SimpleXML disabled.

python tests/sitemap-http.py http://127.0.0.1:8765 [homepage-baseline.html]
"""
from urllib.request import urlopen
from urllib.error import HTTPError
from urllib.parse import urlparse
from pathlib import Path
import html
import sys
import xml.etree.ElementTree as ET

base = sys.argv[1].rstrip('/')
if urlparse(base).hostname not in ('127.0.0.1', 'localhost'):
    raise SystemExit('Disposable localhost test site only.')
checks = 0


def check(condition, message):
    global checks
    assert condition, message
    checks += 1


def xml(path):
    with urlopen(base + path, timeout=30) as response:
        check(response.status == 200, 'Sitemap did not return 200: ' + path)
        check(response.headers['Content-Type'].startswith('application/xml'), 'Wrong sitemap content type')
        body = response.read()
    check(b'SimpleXML' not in body, 'Dependency error leaked into sitemap')
    root = ET.fromstring(body)
    check(root.tag.startswith('{http://www.sitemaps.org/schemas/sitemap/0.9}'), 'Invalid sitemap namespace')
    return root


ns = {'s': 'http://www.sitemaps.org/schemas/sitemap/0.9'}
index = xml('/wp-sitemap.xml')
maps = [node.text for node in index.findall('s:sitemap/s:loc', ns)]
check(bool(maps), 'Empty sitemap index')
check(any('iscpofferings' in url for url in maps), 'Offering provider missing')
for url in maps:
    check(url.startswith(base + '/'), 'Unexpected sitemap destination')
    child = xml(url[len(base):])
    urls = [node.text for node in child.findall('s:url/s:loc', ns)]
    check(bool(urls), 'Empty child sitemap: ' + url)
    check(len(urls) == len(set(urls)), 'Duplicate URL in child sitemap')

with urlopen(base + '/sitemap.xml', timeout=30) as response:
    check(response.status == 200 and response.url == base + '/wp-sitemap.xml', 'Legacy redirect failed')
    ET.fromstring(response.read())
for path in ('/wp-sitemap-posts-page-99999.xml', '/wp-sitemap-notregistered-1.xml'):
    try:
        urlopen(base + path, timeout=30)
        check(False, 'Invalid sitemap returned success: ' + path)
    except HTTPError as error:
        check(error.code == 404, 'Invalid sitemap did not return 404')
for path in ('/wp-sitemap.xsl', '/wp-sitemap-index.xsl'):
    with urlopen(base + path, timeout=30) as response:
        check(response.status == 200, 'Stylesheet unavailable without SimpleXML')
        ET.fromstring(response.read())
with urlopen(base + '/robots.txt', timeout=30) as response:
    check((base + '/wp-sitemap.xml') in response.read().decode(), 'Existing robots sitemap reference lost')
with urlopen(base + '/', timeout=30) as response:
    check(response.status == 200, 'Homepage failed with SimpleXML disabled')
    homepage = response.read().decode()
if len(sys.argv) > 2:
    before = Path(sys.argv[2]).read_text(encoding='utf-8')
    check(html.unescape(before) == html.unescape(homepage), 'Homepage HTML changed with fallback renderer')
print(f'PASS: {checks} HTTP/XML assertions across index, {len(maps)} child sitemaps, stylesheets, redirect and homepage.')
