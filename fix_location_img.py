with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace(
    '<div class=\"swiper-slide h-100\"><img src=\"{{ asset(->path) }}\" alt=\"\" style=\"width: 100%; height: 100%; object-fit: cover; display: block;\"></div>',
    '<div class=\"swiper-slide\"><img src=\"{{ asset(->path) }}\" alt=\"\" style=\"width: 100%; height: auto; display: block;\"></div>'
)
content = content.replace(
    '<div class=\"swiper-slide h-100\"><img src=\"{{ asset(->image_path) }}\" alt=\"\" style=\"width: 100%; height: 100%; object-fit: cover; display: block;\"></div>',
    '<div class=\"swiper-slide\"><img src=\"{{ asset(->image_path) }}\" alt=\"\" style=\"width: 100%; height: auto; display: block;\"></div>'
)
content = content.replace('<div class=\"venue-slider w-100 h-100\"', '<div class=\"venue-slider w-100\"')
content = content.replace('<div class=\"swiper h-100\">', '<div class=\"swiper\">')
content = content.replace('<div class=\"swiper-wrapper h-100\">', '<div class=\"swiper-wrapper\">')

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
print("Removed h-100 from image to prevent collapse")
