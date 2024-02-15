<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('news_views', function (Blueprint $table) {
            $table->unsignedBigInteger('news_id')->index();
            $table->unsignedBigInteger('views');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_views');
    }
};
