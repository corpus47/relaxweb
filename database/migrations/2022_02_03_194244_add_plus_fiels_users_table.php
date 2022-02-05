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
            $table->string('phone',12);
            $table->string('mobile',12);
            $table->string('zipcode',4);
            $table->string('city',255);
            $table->string('address',255);
            $table->string('account_number',24);
            $table->integer('privileg')->nullable()->default(0); //0->super,1->administrator,2->customer
            $table->integer('active')->nullable()->default(0);//0->inactive,1->active
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
            $table->dropColumn('phone');
            $table->dropColumn('mobile');
            $table->dropColumn('zipcode');
            $table->dropColumn('city');
            $table->dropColumn('address');
            $table->dropColumn('account_number');
            $table->dropColumn('privileg');
            $table->dropColumn('active');
        });
    }
}
