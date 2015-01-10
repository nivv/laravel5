<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Page;

class PageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('pages')->delete();

        Page::create(
            array(
                'title' => 'A page title',
                'slug' => str_slug('A page title'),
                'body' => 'Lorem ipsum dolor sit amet.',

            )
        );
    }

}