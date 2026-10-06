import re
path = 'app/Mail/BookingRequestMail.php'
c = open(path, encoding='utf-8').read()
c = re.sub(r'EBC - Yêu cầu đặt lịch ưu đãi 50%', 'M Riverside DaNang - Yêu cầu tải dữ liệu báo giá dự án', c)
open(path, 'w', encoding='utf-8').write(c)
