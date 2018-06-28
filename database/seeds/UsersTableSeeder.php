<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Sam Wilkinson',
                'email' => 'samwilkinson96@mail.com',
                'position' => 'admin',
                'password' => bcrypt('123456'),
                'roles_id' => '1'
            ],
            [
                'name' => 'Yassine',
                'email' => 'yassine@molengeek.be',
                'position' => 'CEO',
                'password' => bcrypt('654321'),
                'roles_id' => '1'
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'position' => 'Employee',
                'password' => bcrypt('123456'),
                'roles_id' => '2'
            ]
        ]);
        factory(App\User::class, 5)->create()
        ->each(function($user){
            for($i = 0; $i < rand(2,4); $i++)
            $user->blogs()->save(factory(App\Blog::class)->make());
        });;
        $blogs = App\Blog::all();
        $blogs->each(function($blog){
            $tagsNum = App\Tag::all()->count();
            $blog->tags()->attach(rand(1,$tagsNum/2));
            $blog->tags()->attach(rand(($tagsNum/2)+1,$tagsNum));
        });
    }
}
