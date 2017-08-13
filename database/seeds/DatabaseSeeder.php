<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PrivilegeTableSeeder::class);
        $this->call(RolePrivilegeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CityBrandTableSeeder::class);
        $this->call(BrandCategoryTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(FiltersTableSeeder::class);
        $this->call(CategoryFilterTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(ActionTagTableSeeder::class);
    }
}
