<?php use App\Models\HomepageSection;
use Illuminate\Support\Str;

$parent = HomepageSection::create([
    'locale' => 'vi',
    'translation_group' => (string) Str::uuid(),
    'key' => 'canho',
    'title' => 'CÁC LOẠI CĂN HỘ ĐIỂN HÌNH',
    'content' => '<p>Mỗi căn hộ tại M Riverside Danang là một kiệt tác thiết kế, tận dụng tối đa ánh sáng tự nhiên và tầm nhìn panorama tuyệt đẹp ra sông Hàn và biển Mỹ Khê.</p>',
    'sort_order' => 6,
    'is_active' => true,
]);

$apartments = [
    ['title' => 'Căn Hộ 1 Phòng Ngủ', 'sub' => 'Diện tích: 45m2 - 50m2'],
    ['title' => 'Căn Hộ 2 Phòng Ngủ', 'sub' => 'Diện tích: 65m2 - 75m2'],
    ['title' => 'Căn Hộ 3 Phòng Ngủ', 'sub' => 'Diện tích: 95m2 - 110m2'],
];

foreach ($apartments as $index => $apt) {
    HomepageSection::create([
        'locale' => 'vi',
        'translation_group' => (string) Str::uuid(),
        'parent_id' => $parent->id,
        'title' => $apt['title'],
        'sub_title' => $apt['sub'],
        'sort_order' => $index + 1,
        'is_active' => true,
    ]);
}
echo 'Created Can Ho section in DB with ID: ' . $parent->id;
