import re
path='resources/views/emails/booking-request.blade.php'
c = open(path, encoding='utf-8').read()
c = re.sub(r'<p><strong>Số lượng khách mời:</strong> \{\{ \\[\'guests\'\] \}\}</p>\s*<p><strong>Ngày dự kiến tổ chức:</strong> \{\{ \\\Carbon\\\Carbon::parse\(\\[\'date\'\]\)->format\(''d/m/Y''\) \}\}</p>', '<p><strong>Email:</strong> {{ [\'email\'] }}</p>', c, flags=re.DOTALL)
open(path, 'w', encoding='utf-8').write(c)
