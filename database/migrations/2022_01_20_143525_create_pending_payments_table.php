<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable(); 
            $table->string('transaction_id')->nullable();
            $table->string('label')->nullable(); 
            $table->string('payment_id')->nullable(); 
            $table->string('product_id')->nullable(); 
            $table->string('description')->nullable(); 
            $table->string('amount')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending_payments');
    }
}
