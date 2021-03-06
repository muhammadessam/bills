<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('number')->unique();
            $table->decimal('amount');
            $table->enum('status', ['open', 'closed']);
            $table->timestamp('released_at')->nullable()->default(now());
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
