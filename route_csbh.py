import re

with open('routes/web.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Add salesPolicySection right before supportSection
pattern = r"(\s*'supportSection' => HomepageSection::query\(\))"
replacement = r"""
        'salesPolicySection' => HomepageSection::query()
            ->where('locale', $locale)
            ->where('is_active', true)
            ->where('key', 'giacsbh')
            ->with('children.images')
            ->first(),\1"""

new_content = re.sub(pattern, replacement, content)

with open('routes/web.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Updated routes for salesPolicySection")
