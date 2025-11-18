<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // public function up(): void
    // {
    //     Schema::create('deposit_transactions', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('user_id');
    //         $table->string('order_code', 50)->unique();
    //         $table->decimal('amount', 15, 2);
    //         $table->string('method', 50);
    //         $table->enum('status', ['pending', 'processing', 'success', 'failed', 'cancelled'])->default('pending');
    //         $table->string('transaction_ref', 100)->nullable();
    //         $table->text('note')->nullable();
    //         $table->string('ip_address', 45)->nullable();
    //         $table->timestamp('confirmed_at')->nullable();
    //         $table->timestamps();

    //         $table->index('user_id');
    //         $table->index('status');

    //         // Nếu có bảng users
    //         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    //     });
    // }

    // public function down(): void
    // {
    //     Schema::dropIfExists('deposit_transactions');
    // }

    public function up()
    {
        Schema::table('deposit_transactions', function (Blueprint $table) {
            $table->string('proof_image_path')->nullable()->after('note');
        });
    }
    public function down()
    {
        Schema::table('deposit_transactions', function (Blueprint $table) {
            $table->dropColumn('proof_image_path');
        });
    }

};
