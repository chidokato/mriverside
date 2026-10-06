with open('app/Http/Controllers/ContactRequestController.php', 'r', encoding='utf-8') as f:
    content = f.read()

import re
pattern = r'\ = \->validate\(\[.*?\]\);'
replacement = ''' = ->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email:filter', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[+0-9 ().-]{8,20}$/'],
        ], [], [
            'name' => 'họ và tên',
            'email' => 'email', 'phone' => 'số điện thoại',
        ]);'''

new_content = re.sub(pattern, replacement, content, flags=re.DOTALL)

with open('app/Http/Controllers/ContactRequestController.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Updated controller validation")
