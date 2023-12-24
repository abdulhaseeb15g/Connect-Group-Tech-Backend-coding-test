<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('company_group_id')->references('id')->on('company_groups');
        });
        Schema::table('companies', function (Blueprint $table) {
            // Add foreign keys
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('company_group_id')->references('id')->on('company_groups');
        });
        Schema::table('managers', function (Blueprint $table) {
            // Add foreign keys
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
        Schema::create('people', function (Blueprint $table) {
            $table->foreign('emp_id')->references('id')->on('employees');
            $table->foreign('manager_id')->references('id')->on('managers');
        });

        Schema::create('assets', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });
        Schema::table('company_groups', function (Blueprint $table) {
            // Add foreign keys
            $table->foreign('group_head_id')->references('id')->on('employees');
            $table->foreign('parent_group_id')->references('id')->on('company_groups');
        });


        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['company_group_id']);
        });
        // Drop foreign keys from 'companies' table
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropForeign(['asset_id']);
            $table->dropForeign(['company_group_id']);
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropForeign(['asset_id']);
            $table->dropForeign(['company_group_id']);
        });

        // Drop foreign keys from 'managers' table
        Schema::table('managers', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['employee_id']);
        });

        // Drop foreign keys from 'people' table
        Schema::table('people', function (Blueprint $table) {
            $table->dropForeign(['emp_id']);
            $table->dropForeign(['manager_id']);
        });

        // Drop foreign key from 'assets' table
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });

        // Drop foreign keys from 'company_groups' table
        Schema::table('company_groups', function (Blueprint $table) {
            $table->dropForeign(['group_head_id']);
            $table->dropForeign(['parent_group_id']);
        });

    }
};
