<?php
\ = file_get_contents("routes/web.php");
\ = <<<PHP
        'overviewSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'tongquan')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'locationSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'vitri')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'potentialSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'tiemnang')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
PHP;
\ = str_replace("'aboutSection' => HomepageSection::query()", \ . "\n        'aboutSection' => HomepageSection::query()", \);
\ = str_replace("'key', 'amenities'", "'key', 'tienich'", \);
file_put_contents("routes/web.php", \);
?>
