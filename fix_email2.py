path='resources/views/emails/booking-request.blade.php'
c = open(path, encoding='utf-8').read()
c = c.replace('<p><strong>Số lượng khách mời:</strong> {{ [\'guests\'] }}</p>\n<p><strong>Ngày dự kiến tổ chức:</strong> {{ \Carbon\Carbon::parse([\'date\'])->format(\'d/m/Y\') }}</p>', '<p><strong>Email:</strong> {{ [\'email\'] }}</p>')
open(path, 'w', encoding='utf-8').write(c)
