<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into the employees table
        for ($i = 1; $i <= 10; $i++) {
            DB::table('employees')->insert([
                'name' => "Employee $i",
                'email' => "employee$i@example.com",
                'phone' => '1234567890',
                'company_id' => 1, // Replace with a valid company_id
                'company_group_id' => 1, // Replace with a valid company_group_id
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        // You can also use the factory to generate more records
        // factory(App\Models\Employee::class, 10)->create();
    }
}
