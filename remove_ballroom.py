with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

import re
pattern = r'@if\(\$ballroomSection\).*?<!------------------- BALLROOM FROM DATABASE ------------------->.*?</section>\s*@endif'
new_content = re.sub(pattern, '', content, flags=re.DOTALL)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Removed ballroom section")
