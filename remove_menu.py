import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

pattern1 = r'@if\(\$servicesSection\).*?<!------------------- SERVICE EXPERIENCE FROM DATABASE ------------------->.*?</section>\s*@endif'
content = re.sub(pattern1, '', content, flags=re.DOTALL)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
print("Removed menu section")
