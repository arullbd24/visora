<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // auto increment
            $table->uuid('user_id'); // UUID sebagai foreign key
            $table->string('service_name');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('nama_pemesan');
            $table->date('tanggal_acara')->nullable();
            $table->text('catatan')->nullable();
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->timestamps();

            // Foreign key UUID ke users.id
            $table->foreign('user_id')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
