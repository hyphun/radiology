<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('banner_image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->json('meta_seo')->nullable(); // SEO fields
            $table->timestamps();

            $table->index('status');
            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
