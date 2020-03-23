<?php

use Laravast\User;
use Laravast\Lesson;
use Laravast\Series;
use Illuminate\Database\Seeder;

class LaravastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'mat@mat.com',
        ]);

        factory(Series::class, 5)
                ->create()
                ->each(function($series) {
                    factory(Lesson::class, 10)->create([
                        'series_id' => $series->id
                    ]);
                });
    }
}
