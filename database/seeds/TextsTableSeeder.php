<?php

use Illuminate\Database\Seeder;

class TextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('texts')->insert([
            [
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.',
                'page' => 'home',
                'number' => 1,
            ],
            [
                'content' => 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.',
                'page' => 'home',
                'number' => 2,
            ],
            [
                'content' => 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.',
                'page' => 'contact',
                'number' => '1'
            ],
            [
                'content' => 'Main Office',
                'page' => 'contact',
                'number' => '2'
            ],
            [
                'content' => 'C/ Libertad, 34',
                'page' => 'contact',
                'number' => '3'
            ],
            [
                'content' => '05200 Arévalo',
                'page' => 'contact',
                'number' => '4'
            ],
            [
                'content' => '0034 37483 2445 322',
                'page' => 'contact',
                'number' => '5'
            ],
            [
                'content' => 'hello@company.com',
                'page' => 'contact',
                'number' => '6'
            ],
        ]);
    }
}
