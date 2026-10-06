import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace the apt-card interior
pattern = r'(<article class="apt-card h-100 d-flex flex-column">).*?(</article>)'

replacement = r'''\1
                    @php($img = $apt->images->first()?->path ?: $apt->image_path)
                    @if($img)
                        <img src="{{ asset($img) }}" alt="{{ $apt->title }}" style="width: 100%; height: auto; display: block;">
                    @else
                        <div style="aspect-ratio: 4/3; background: #f8f9fa; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="var(--main-color)" viewBox="0 0 16 16" style="opacity: 0.3; margin-bottom: 12px;">
                                <path d="M14 14V4.5L8 0 2 4.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 1 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4.5h2A1.5 1.5 0 0 1 6.5 3h3z"/>
                            </svg>
                            <span style="color: var(--main-color); opacity: 0.6; font-size: 14px;">Chưa cập nhật ảnh</span>
                        </div>
                    @endif
                \2'''

new_content = re.sub(pattern, replacement, content, flags=re.DOTALL)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Updated apartment card")
