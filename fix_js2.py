import re
path='frontend/js/booking-popup.js'
c = open(path, encoding='utf-8').read()
c = re.sub(r'status\.textContent = ''Vui lòng kiểm tra.*?tổ chức.*?'';', 'status.textContent = \'Vui lòng kiểm tra họ tên, email và số điện thoại.\';', c)
open(path, 'w', encoding='utf-8').write(c)
