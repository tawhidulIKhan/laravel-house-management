<?php

use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\House::class, 20)->create()->each(function ($house){
            $photo = \App\Models\Media::create([
                'name' => $house->name,
                'src' => 'https://placeimg.com/640/480/arch'
            ]);

            $house->update([
                'image_id' => $photo->id
            ]);
        });
    }
}
