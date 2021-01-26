<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $posts = [
        //     [
        //         'title' => 'primo post',
        //         'author' => 'Mario Bianchi',
        //         'text' => 'Questo è il primo post in assoluto.'
        //     ],
        //     [
        //         'title' => 'cose da mangiare',
        //         'author' => 'Rosa Luxe',
        //         'text' => 'Qui sono elencate le cose da mangiare: pasta, riso. etc.'
        //     ],
        //     [
        //         'title' => 'sport da fare',
        //         'author' => 'Rita Levi',
        //         'text' => 'Si deve correre una volta al giorno. Poi si fa spinnign.'
        //     ],
        // ];

        // foreach ($posts as $post) {
        //     $new_post = new Post(); // new istance
        //
        //     // assign value
        //     $new_post -> title = $post['title'];
        //     $new_post -> author = $post['author'];
        //     $new_post -> text = $post['text'];
        //
        //     $new_post -> save();
        // }

        for ($i=0; $i < 20; $i++) {
            $new_post = new Post(); // new istance

            // assign fake value
            $new_post -> title = $faker -> sentence();
            // $new_post -> author = $faker -> name();
            $new_post -> text = $faker -> text();

            // verify && assign slug (title -> slug)
            // 1) get slug base
            $base_slug = Str::slug($new_post -> title, '-');
            $slug = $base_slug;
            // 2) sentinel var
            $already_slug = Post::where('slug', $slug) -> first(); // return collection if there is, NULL otherwise
            $contatore = 1; // contatore
            // 3) check while there's not same-slug
            while ($already_slug) {
                $slug = $base_slug . '-' . $contatore;
                $contatore++;
                $already_slug = Post::where('slug', $slug) -> first();
            }
            // 4) assign to class
            $new_post -> slug = $slug;

            $new_post -> save();
        }
    }
}
