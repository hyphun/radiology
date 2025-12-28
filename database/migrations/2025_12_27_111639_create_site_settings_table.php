<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->string('site_domain')->nullable();
            $table->longText('site_logo')->nullable();
            $table->longText('site_logo_dark')->nullable();
            $table->longText('site_logo_mobile')->nullable();
            $table->string('site_name')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('primary_address')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('footer_bio')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->longText('map_embed_code')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
