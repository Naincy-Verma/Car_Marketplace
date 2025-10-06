<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listing_medias', function (Blueprint $table) {
            $table->id();
              $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['image', 'video']);   // differentiate
            $table->string('file_path');    // for photos (stored as file path)
            $table->string('video_url');    // for videos (YouTube/Vimeo/self-hosted)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_medias');
    }
};
