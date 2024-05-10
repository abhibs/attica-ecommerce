<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('type_delivery', ['Branch_Visit', 'Delivery_Boy'])->after('type_address')->nullable();
            $table->float('delivery_charge')->after('type_delivery')->default(200)->nullable();
            $table->float('sub_total')->after('delivery_charge')->nullable();
            $table->unsignedBigInteger('branch_id')->after('city_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
