<?php $c = App\Models\HomepageSection::find(154);
echo $c->images->count() > 0 ? "Has images relation" : "No images relation";
