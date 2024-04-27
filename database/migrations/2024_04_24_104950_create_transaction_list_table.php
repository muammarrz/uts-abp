<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_list', function (Blueprint $table) {
            $table->string('order_id')->primary(); // Primary key
            $table->dateTime('transaction_time');
            $table->string('transaction_status');
            $table->string('transaction_id');
            $table->string('three_ds_version');
            $table->string('status_message');
            $table->string('status_code');
            $table->string('signature_key');
            $table->string('payment_type');
            $table->string('merchant_id');
            $table->string('masked_card');
            $table->decimal('gross_amount', 10, 2);
            $table->string('fraud_status');
            $table->dateTime('expiry_time');
            $table->string('eci');
            $table->string('currency');
            $table->string('channel_response_message');
            $table->string('channel_response_code');
            $table->string('card_type');
            $table->string('bank');
            $table->string('approval_code');
            $table->json('metadata')->nullable(); // Optional JSON column
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_list');
    }
};
