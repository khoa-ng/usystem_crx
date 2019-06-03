<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomefieldProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('project', function($table) {
            $table->string('sky_id');
            $table->string('contact');
            $table->string('m_name');
            $table->string('email');
            $table->string('pro_des');
            $table->string('pro_url');
            $table->string('skypename');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('skypedatas', function($table) {
            $table->dropColumn('sky_id');
            $table->dropColumn('contact');
            $table->dropColumn('m_name');
            $table->dropColumn('email');
            $table->dropColumn('pro_des');
            $table->dropColumn('pro_url');
            $table->dropColumn('skypename');

        });
    }
}
