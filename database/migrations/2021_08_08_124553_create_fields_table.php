<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('header');
            $table->string('icon')->nullable();
            $table->string('component');
            $table->boolean('options');
        });

        $default = array(   ['name' => 'releaseYear',   'header' => 'Erscheinungsjahr',     'component' => "text",      'options' => true],
                            ['name' => 'status',        'header' => 'Status',               'component' => "select",    'options' => false]
                        );

        foreach ($default as $value){
            DB::table('fields')->insert([
                'name' => $value['name'],
                'header' => $value['header'],
                'component' => $value['component'],
                'options' => $value['options'],
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
