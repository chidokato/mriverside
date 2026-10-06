import re
path='frontend/js/booking-popup.js'
c = open(path, encoding='utf-8').read()
c = re.sub(r'const date = form\.elements\.date;.*?padStart\(2, ''0''\)};', '', c, flags=re.DOTALL)
open(path, 'w', encoding='utf-8').write(c)
