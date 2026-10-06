import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Remove sec-service-experience id="menu"
pattern1 = r'@if\(\$servicesSection\).*?<!------------------- MENU FROM DATABASE ------------------->.*?</section>\s*@endif'
content = re.sub(pattern1, '', content, flags=re.DOTALL)

# Remove sec-services-amenities
pattern2 = r'<!------------------- SERVICES & AMENITIES FROM DATABASE ------------------->\s*<section class="sec-services-amenities">.*?</section>'
content = re.sub(pattern2, '', content, flags=re.DOTALL)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
print("Removed old sections")
