<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker; // richiamo il faker
use App\Category; // richiamo le category

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // generate 5 categories
        for ($i=0; $i < 5; $i++) {
            $new_category = new Category(); // new istance

            $new_category -> name = $faker -> words(2, true);

            // new slug
            $base_slug = Str::slug($new_category -> name, '-');
            $slug = $base_slug;

            // sentinel var
            $already_slug = Category::where('slug', $slug) -> first();
            $m = 1; // contatore

            if ($already_slug) {
                $slug = $base_slug . '-' . $m; // new slug
                $already_slug = Category::where('slug', $slug) -> first(); // re-search
                $m++;
            }

            $new_category -> slug = $slug; // slug assignment

            $new_category -> save();
        }
    }
}
