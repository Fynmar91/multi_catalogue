<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('value');
            $table->string('icon')->nullable();
            $table->boolean('active');
            $table->unsignedBigInteger('field_id');
            
            $table->foreign('field_id')->references('id')->on('fields'); 
        });

        $default = array(   ['value' => 'Fertig',        'icon' => 'mdi-check',         'active' => true,   'field_id' => 2],
                            ['value' => 'Angefangen',    'icon' => 'mdi-play',          'active' => true,   'field_id' => 2],
                            ['value' => 'Abgebrochen',   'icon' => 'mdi-stop',          'active' => true,   'field_id' => 2],
                            ['value' => 'Warteschlange', 'icon' => 'mdi-list-status',   'active' => true,   'field_id' => 2]
                        );

        foreach ($default as $value){
            DB::table('options')->insert([
                'value' => $value['value'],
                'icon' => $value['icon'],
                'active' => $value['active'],
                'field_id' => $value['field_id'],
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
        Schema::dropIfExists('options');
    }
}
