<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMedicDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table){
            $table->increments('id');
            $table->string('name', 45);
            $table->string('account', 10)->unique();
            $table->string('address');
            $table->string('phone', 15);
            $table->string('email');
            $table->string('owner_name', 45);
            $table->string('certificate_id')->nullable();
            $table->timestamps();
        });

        Schema::create('sub_pharmacies', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('pharmacy_id');
            $table->string('address');
            $table->string('phone', 15);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table){
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description')->nullable();
        });

        Schema::create('product_defaults', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('category_id');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('pharmacy_id');
            $table->unsignedInteger('creator_id');
            $table->timestamps();
        });

        Schema::create('bill_imports', function (Blueprint $table){
            $table->increments('id');
            $table->string('code', 10);
            $table->unsignedBigInteger('total_amount');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('sub_pharmacy_id');
            $table->timestamps();
        });

        Schema::create('shipments', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('bill_import_id');
            $table->timestamp('manufactured_date')->nullable();
            $table->timestamp('expire_date')->nullable();
            $table->unsignedBigInteger('input_price');
            $table->string('input_unit', 10);
            $table->unsignedBigInteger('sale_price');
            $table->string('sale_unit', 10);
            $table->unsignedInteger('conversion_value')->default(1);
            $table->unsignedInteger('input_quantity');
            $table->unsignedInteger('quantity');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('bill_exports', function (Blueprint $table){
            $table->increments('id');
            $table->string('code', 10);
            $table->unsignedInteger('sub_pharmacy_id');
            $table->unsignedInteger('creator_id');
            $table->unsignedBigInteger('total_amount');
            $table->string('customer_name')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('bill_export_shipment', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('bill_export_id');
            $table->unsignedInteger('shipment_id');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('total_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_export_details');
        Schema::dropIfExists('bill_exports');
        Schema::dropIfExists('shipments');
        Schema::dropIfExists('bill_imports');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_defaults');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('sub_pharmacies');
        Schema::dropIfExists('pharmacies');
    }
}
