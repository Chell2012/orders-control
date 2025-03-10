<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Запуск миграции.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable(false);
            $table->timestamp('created_at')->useCurrent();
            $table->enum('status', ['new', 'completed'])->default('new');
            $table->integer('amount')->nullable(false);
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');

            $table->text('comment')->nullable();
        });
    }

    /**
     * Откат миграции.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
