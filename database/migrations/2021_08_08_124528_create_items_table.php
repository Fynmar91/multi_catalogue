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
            $table->boolean('active');
            $table->integer('level');
            $table->integer('type')->nullable();
        });

        $default = array(   ['name' => 'Filme',         'active' => true,   'level' => 0],
                            ['name' => 'Breaking Bad',  'active' => true,   'level' => 1]);

        foreach ($default as $value){
            DB::table('items')->insert([
                'name' => $value['name'],
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
