<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('about')->nullable();
            $table->string('banner')->nullable();
            $table->string('profile')->nullable();
            $table->string('display_preview_class')->nullable();
            $table->string('display_preview_bg')->nullable();
            $table->string('display_btn_prop')->nullable();
            $table->string('display_btn_style')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customizations');
    }
}
