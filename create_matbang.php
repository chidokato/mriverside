<?php use App\Models\HomepageSection;
use Illuminate\Support\Str;

$group = (string) Str::uuid();

$parent = HomepageSection::create([
    'locale' => 'vi',
    'translation_group' => $group,
    'key' => 'matbang',
    'title' => 'MẶT BẰNG TẦNG ĐIỂN HÌNH',
    'content' => '<p>Thiết kế thông minh, tối ưu hóa không gian sống và công năng sử dụng, mang lại trải nghiệm sống đẳng cấp và tiện nghi cho mọi gia đình.</p>',
    'sort_order' => 5,
    'is_active' => true,
]);

echo 'Created Mat Bang section in DB with ID: ' . $parent->id;
