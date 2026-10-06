<?php
$file = 'routes/web.php';
$content = file_get_contents($file);

$overview = <<<PHP
        'overviewSection' => HomepageSection::query()
            ->where('locale', \$locale)
            ->where('key', 'tongquan')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\$query) => \$query->where('is_active', true)->with('images')])
            ->first(),
        'locationSection' => HomepageSection::query()
            ->where('locale', \$locale)
            ->where('key', 'vitri')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\$query) => \$query->where('is_active', true)->with('images')])
            ->first(),
        'potentialSection' => HomepageSection::query()
            ->where('locale', \$locale)
            ->where('key', 'tiemnang')
PHP;

$content = preg_replace("/'aboutSection'\s*=>\s*HomepageSection::query\(\)\s*->where\('locale',\s*\\\$locale\)\s*->where\('key',\s*'about'\)/", $overview, $content);

$content = preg_replace("/'amenitiesSection'\s*=>\s*HomepageSection::query\(\)\s*->where\('locale',\s*\\\$locale\)\s*->where\('key',\s*'amenities'\)/", "'amenitiesSection' => HomepageSection::query()\n            ->where('locale', \$locale)\n            ->where('key', 'tienich')", $content);

file_put_contents($file, $content);
echo "Fixed routes!";
?>
