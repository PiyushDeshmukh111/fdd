    <?php
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Faker\Factory as Faker;
    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            $faker = Faker::create();
            foreach (range(1,10) as $index) {
              DB::table('product')->insert([
                  'name'=> $faker->name,
                   'price'=> $faker->numberBetween($min = 1500, $max = 6000),
                  'color'=> $faker->name,
                  'image'=>$faker->imageUrl($width = 200, $height = 200),

              ]);
      }
        }
    }
    ?>