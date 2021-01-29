<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {
            $new_tag = new Tag();

            $new_tag -> name = $faker -> words(3, true);

            // new slug
            $base_slug = Str::slug($new_tag -> name, '-');
            $slug = $base_slug;

            // sentinel var
            $already_slug = Tag::where('slug', $slug) -> first();
            $m = 1; // contatore

            if ($already_slug) {
                $slug = $base_slug . '-' . $m; // new slug
                $already_slug = Tag::where('slug', $slug) -> first(); // re-search
                $m++;
            }

            $new_tag -> slug = $slug; // slug assignment

            $new_tag -> save();
        }
    }
}
