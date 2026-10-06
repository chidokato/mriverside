import re

with open('routes/web.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Add floorPlanSection right before salesPolicySection
pattern = r"(\s*'salesPolicySection' => HomepageSection::query\(\))"
replacement = r"""
        'floorPlanSection' => HomepageSection::query()
            ->where('locale', $locale)
            ->where('is_active', true)
            ->where('key', 'matbang')
            ->with('images')
            ->first(),\1"""

new_content = re.sub(pattern, replacement, content)

with open('routes/web.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Updated routes for floorPlanSection")
