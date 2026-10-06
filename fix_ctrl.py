import re
path='app/Http/Controllers/BookingRequestController.php'
c = open(path, encoding='utf-8').read()
c = re.sub(r'\'guests\' => \[.*?\],', '', c)
c = re.sub(r'\'date\' => \[.*?\],', r'\'email\' => [\'required\', \'email\', \'max:255\'],', c)
open(path, 'w', encoding='utf-8').write(c)
