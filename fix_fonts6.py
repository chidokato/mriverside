with open('frontend/css/booking-popup.css', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace("font-family:'High Spirited',cursive;", "font-family:var(--title-fontface);")

with open('frontend/css/booking-popup.css', 'w', encoding='utf-8') as f:
    f.write(content)
print('Replaced font families in booking-popup.css')
