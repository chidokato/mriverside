import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

html = """
@if($floorPlanSection)
<section class="sec-floor-plan" id="matbang" style="padding: 80px 0; background-color: #fcfaf8;">
    <div class="container" style="max-width: var(--ebc-container-width);">
        <div class="floor-plan-heading text-center mx-auto" style="max-width: 900px; margin-bottom: 40px;">
            <h2 style="color: var(--main-color); font-size: clamp(28px, 4vw, 36px); font-weight: bold; margin-bottom: 20px; text-transform: uppercase;">{{ $floorPlanSection->title }}</h2>
            <div class="overview-content" style="font-size: 16px; color: #555; line-height: 1.6;">
                {!! $floorPlanSection->content !!}
            </div>
        </div>

        <div class="floor-plan-image mx-auto" style="max-width: 1100px; background: #fff; border-radius: 16px; padding: 10px; box-shadow: 0 15px 40px rgba(0,0,0,0.06);">
            @php($matBangImg = $floorPlanSection->images->first()?->path ?: $floorPlanSection->image_path)
            @if($matBangImg)
                <img src="{{ asset($matBangImg) }}" alt="{{ $floorPlanSection->title }}" style="width: 100%; height: auto; border-radius: 10px; display: block;">
            @else
                <div style="width: 100%; aspect-ratio: 16/9; background: linear-gradient(135deg, #fdfbf8, #f4e8d3); border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #e2bd7a;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="var(--main-color)" viewBox="0 0 16 16" style="opacity: 0.4; margin-bottom: 16px;">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    <span style="color: var(--main-color); font-weight: bold; opacity: 0.6; font-size: 18px;">Ảnh mặt bằng (vui lòng upload trong Quản trị)</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endif
"""

pattern = r'(\s*@if\(\$salesPolicySection\))'
replacement = html + r'\1'

new_content = re.sub(pattern, replacement, content, count=1)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Added floor plan section HTML")
