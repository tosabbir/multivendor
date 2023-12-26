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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id('coupon_id');
            $table->string('coupon_code')->unique();
            $table->string('coupon_discount')->nullable();
            $table->string('coupon_validity')->nullable();
            $table->enum('coupon_status', ['active', 'expired', 'inactive'])->default('active');;
            $table->string('coupon_creator')->nullable();
            $table->string('coupon_editor')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
