path='resources/views/emails/booking-request.blade.php'
lines = open(path, encoding='utf-8').readlines()
lines[3] = '<p><strong>Email:</strong> {{ $booking[\'email\'] }}</p>\n'
open(path, 'w', encoding='utf-8').writelines(lines)
