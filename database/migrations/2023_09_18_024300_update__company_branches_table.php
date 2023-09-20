<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompanyBranchesTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_branches', function (Blueprint $table) {
            $table->string('tel1', 13)->nullable()->change();
            $table->string('tel2', 13)->nullable()->change();
            $table->string('contact_name', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_branches', function (Blueprint $table) {
            $table->string('tel1', 13)->nullable()->change();
            $table->string('tel2', 13)->nullable()->change();
            $table->string('contact_name', 50)->nullable()->change();
        });
    }
}
