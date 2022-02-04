<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlusFielsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            //$table->string('first_name',255);
            //$table->string('last_name',255);
            $table->string('phone',12);
            $table->string('mobile',12);
            $table->integer('privileg')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            //$table->dropColumn('first_name');
            //$table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('mobile');
            $table->dropColumn('privileg');
        });
    }
}
