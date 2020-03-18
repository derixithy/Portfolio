<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('parent', 25);
            $table->string('title', 100);
            $table->string('image', 100);
            $table->text('description');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DONE', 'DRAFT', 'DELETED'])->nullable(false)->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
}
