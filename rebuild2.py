with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()
print('Start:', content.find('<!------------------- EBC BENEFITS ------------------->'))
print('End:', content.find('@if(\)'))
