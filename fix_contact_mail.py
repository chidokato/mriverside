import re
path = 'app/Mail/ContactRequestMail.php'
c = open(path, encoding='utf-8').read()
c = c.replace('EBC - Yêu cầu liên hệ', 'M Riverside DaNang - Yêu cầu liên hệ')
open(path, 'w', encoding='utf-8').write(c)
