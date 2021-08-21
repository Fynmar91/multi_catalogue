<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->boolean('active');
            $table->integer('level');
            $table->integer('type')->nullable();
        });

        $default = array(   ['name' => 'Filme',         'icon' => 'mdi-check',  'active' => true,   'level' => 0],
                            ['name' => 'Serien',        'icon' => 'mdi-play',   'active' => true,   'level' => 0],
                            ['name' => 'Joker',         'icon' => NULL,         'active' => true,   'level' => 1],
                            ['name' => 'Breaking Bad',  'icon' => NULL,         'active' => true,   'level' => 1],
                            ['name' => 'Episode 1',     'icon' => NULL,         'active' => true,   'level' => 2],
                            ['name' => 'Episode 2',     'icon' => NULL,         'active' => true,   'level' => 2],);

        foreach ($default as $value){
            DB::table('items')->insert([
                'name' => $value['name'],
                'icon' => $value['icon'],
                'active' => $value['active'],
                'level' => $value['level'],
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
        Schema::dropIfExists('items');
    }
}
