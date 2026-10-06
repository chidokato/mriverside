import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace('ChÆ°a cáºp nháºt áº£nh', 'Đang cập nhật ảnh')

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
