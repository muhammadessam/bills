<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsPhoneToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_sms')->nullable()->default(null);
            $table->boolean('is_whatsapp')->nullable()->default(null);
            $table->boolean('is_email')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_sms');
            $table->dropColumn('is_whatsapp');
            $table->dropColumn('is_email');
        });
    }
}
