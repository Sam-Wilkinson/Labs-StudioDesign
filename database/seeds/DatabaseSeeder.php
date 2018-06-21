<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        /**
         * The Users Table Seeder generates the admins as well as 3 users, 1-3 Blogs for each user and links the blogs to tags. The Blog Factory generates the categories.
         */
        $this->call(UsersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        /**
         * The Clients Table Seeder generates the Clients as well as 1-2 Testimonials for each client.
         */
        $this->call(ClientsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(NewsEmailsTableSeeder::class);
        $this->call(TextsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

    }
}
