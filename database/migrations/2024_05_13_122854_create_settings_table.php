<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable(); // Storing as text to handle multiple keywords
            $table->text('meta_description')->nullable();
            $table->text('featured_image')->nullable();
            $table->text('google_search_console')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('google_tag_manager')->nullable();
            $table->text('pixel_code')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
;
