import re
path = 'resources/views/emails/booking-request.blade.php'
c = open(path, encoding='utf-8').read()
c = c.replace('Yêu cầu đặt lịch - Ưu đãi 50%', 'Yêu cầu tải dữ liệu báo giá dự án')
c = c.replace('Elite Business Center', 'M Riverside DaNang')
c = c.replace('xác nhận lịch', 'xác nhận')
open(path, 'w', encoding='utf-8').write(c)
