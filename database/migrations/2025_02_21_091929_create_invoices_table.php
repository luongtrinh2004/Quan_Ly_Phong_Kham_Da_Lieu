<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['Đã thanh toán', 'Chưa thanh toán'])->default('Chưa thanh toán');

            $table->foreignId('medical_record_id')->constrained('medical_records')->onDelete('cascade'); 

            $table->index('medical_record_id');
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
        Schema::dropIfExists('invoices');
    }
}
