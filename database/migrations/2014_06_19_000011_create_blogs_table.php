<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'blogs';

    /**
     * Run the migrations.
     * @table blogs
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->boolean('validated')->nullable();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('categories_id');

            $table->index(["users_id"], 'fk_blogs_Users1_idx');

            $table->index(["categories_id"], 'fk_blogs_Categories1_idx');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('users_id', 'fk_blogs_Users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('categories_id', 'fk_blogs_Categories1_idx')
                ->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
