<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = App\Blog::all();
        $blogs->each(function($blog){
            for($i = 0; $i < rand(0,3); $i++);
            $blog->comments()->save(factory(App\Comment::class)->make());
        });;
    }
}
