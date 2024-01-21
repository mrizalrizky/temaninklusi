<?php

namespace Database\Seeders;

use App\Models\EventDisabilityCategory;
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
        // \App\Models\User::factory(10)->create();

        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(MasterStatusSeeder::class);
        $this->call(EventCategorySeeder::class);
        $this->call(EventDetailSeeder::class);
        $this->call(FileSeeder::class);
        // $this->call(MasterCategorySeeder::class);
        $this->call(ArticleCategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(DisabilityCategorySeeder::class);
        $this->call(MasterOrganizerSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(UserCommentSeeder::class);
        $this->call(EventDisabilityCategorySeeder::class);



    }
}
