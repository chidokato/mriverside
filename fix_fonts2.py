with open('frontend/css/index.css', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace("font-family:Georgia, serif;", "")
content = content.replace("font-family:'Wasted Vindey', Georgia, serif;", "")

with open('frontend/css/index.css', 'w', encoding='utf-8') as f:
    f.write(content)
print('Replaced font families in index.css')
