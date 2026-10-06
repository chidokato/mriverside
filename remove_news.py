import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

pattern = r'@if\(\$newsArticles->isNotEmpty\(\)\).*?<section class="sec-latest-news" id="news">.*?</section>\s*@endif'
content = re.sub(pattern, '', content, flags=re.DOTALL)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
print("Removed news section")
