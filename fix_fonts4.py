with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace("font-wasted-vindey", "")
content = content.replace('class=""', '')

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
print('Removed font classes from HTML')
