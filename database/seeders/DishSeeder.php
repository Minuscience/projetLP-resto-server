<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = [
            "https://i2.wp.com/www.eatthis.com/wp-content/uploads/2020/10/red-lobster-rainbow-trout.jpg?resize=1024%2C750&ssl=1",
            "https://i2.wp.com/www.eatthis.com/wp-content/uploads/2017/09/outback-steakhouse-victoria-filet-mignon.jpg?w=1024&ssl=1",
            "https://i1.wp.com/www.eatthis.com/wp-content/uploads/2020/10/applebees-salmon.jpg?resize=1024%2C750&ssl=1",
            "https://i1.wp.com/www.eatthis.com/wp-content/uploads/2019/08/panda-express-beef-and-broccoli.jpg?resize=1024%2C750&ssl=1",
            "https://i1.wp.com/www.eatthis.com/wp-content/uploads/2017/09/pf-changs-buddhas-feast.jpg?resize=1024%2C750&ssl=1",
            "https://i2.wp.com/www.eatthis.com/wp-content/uploads/2019/09/herb-grilled-salmon-olive-garden.jpg?resize=1024%2C750&ssl=1",
            "https://i1.wp.com/www.eatthis.com/wp-content/uploads/2018/06/chickfila-market-salad.jpg?w=1024&ssl=1"
        ];
        $ipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ipsum augue, mollis sed risus at, congue sagittis tellus. Quisque lacinia neque ipsum, eget laoreet nisi condimentum non. Nulla eget tellus rhoncus, feugiat velit et, cursus mi. Ut et maximus odio, vel efficitur velit. Suspendisse commodo convallis ultrices. Fusce sit amet elit felis. Maecenas vel posuere tellus. Sed nunc magna, semper at tortor rutrum, rutrum egestas leo. Phasellus ipsum lacus, pretium ultrices scelerisque in, tincidunt vitae quam. Etiam sit amet nunc vel justo ultrices suscipit. Cras aliquam ullamcorper condimentum. Proin id lacus justo.";
        for ($i = 0; $i <= 6; $i++) {
            DB::table('dish')->insert([
                'name' => Str::random(10),
                'description' => $ipsum,
                'price' => (float)(rand(0, 1000) / 100),
                'calories' => rand(0, 3000),
                'proteins' => rand(0, 5),
                'carbs' => rand(0, 1),
                'imageURL' => $image[$i],
            ]);
        }
    }
}
