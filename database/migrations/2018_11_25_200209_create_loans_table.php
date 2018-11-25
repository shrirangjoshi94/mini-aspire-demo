<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->decimal('approved_amount', 11, 2);
            $table->string('currency');
            $table->tinyInteger('loan_tenor');
            $table->string('repayment_frequency')->default('Monthly');
            $table->decimal('origination_fee_percentage', 3, 2);
            $table->decimal('interest_rate', 3, 2);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('loans');
    }

}
