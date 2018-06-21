<?php

use Illuminate\Database\Seeder;

class NewsEmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Newsemail::class, 30)->create();
    }
}
