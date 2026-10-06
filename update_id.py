with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace('<section class="sec-consultation" id="consultation"', '<section class="sec-consultation" id="dangky"')

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
print("Updated ID to dangky")
