<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama')->nullable();
            $table->string('satuan')->nullable();
            $table->text('keterangan')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->uuid('parent_id')->nullable();
            $table->foreignUuid('opd_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignUuid('wilayah_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elemens');
    }
};
