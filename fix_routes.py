import re

with open('routes/web.php', 'r', encoding='utf-8') as f:
    content = f.read()

pattern = r'\$query->where\(\'key\', \'support\'\)->orWhere\(\'title\', \'HỖ TRỢ TƯ VẤN\'\)'
replacement = r"$query->whereIn('key', ['support', 'dangky'])->orWhereIn('title', ['HỖ TRỢ TƯ VẤN', 'ĐĂNG KÝ'])"

new_content = re.sub(pattern, replacement, content)

with open('routes/web.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Updated routes to map dangky to supportSection")
