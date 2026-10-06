<?php $p = App\Models\HomepageSection::where('key', 'canho')->first();
echo $p->children()->orderBy('sort_order')->get()->map(fn($c) => $c->id . ' | ' . $c->title . ' | img: ' . ($c->image_path ?: 'null'))->toJson(JSON_PRETTY_PRINT);
