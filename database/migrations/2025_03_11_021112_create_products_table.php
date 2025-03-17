<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_type');
            $table->text('description')->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->decimal('promotion_price', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->string('unit')->nullable();
            $table->boolean('new')->default(0);
            $table->timestamps();

            // Thiết lập khóa ngoại
            $table->foreign('id_type')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
