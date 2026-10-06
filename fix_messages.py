import re
import sys

# 1. Update BookingRequestController
path1 = 'app/Http/Controllers/BookingRequestController.php'
c1 = open(path1, encoding='utf-8').read()
c1 = c1.replace('Đã gửi yêu cầu đặt lịch. Elite Business Center sẽ liên hệ với bạn để xác nhận.', 'Đã gửi yêu cầu tải dữ liệu báo giá dự án. M Riverside DaNang sẽ liên hệ với bạn để xác nhận.')
c1 = c1.replace('Elite Business Center', 'M Riverside DaNang')
open(path1, 'w', encoding='utf-8').write(c1)

# 2. Update ContactRequestController
path2 = 'app/Http/Controllers/ContactRequestController.php'
c2 = open(path2, encoding='utf-8').read()
c2 = c2.replace('Elite Business Center', 'M Riverside DaNang')
open(path2, 'w', encoding='utf-8').write(c2)
