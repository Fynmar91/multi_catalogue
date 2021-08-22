<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('value')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('field_id');
            
            $table->foreign('item_id')->references('id')->on('items');    
            $table->foreign('field_id')->references('id')->on('fields');
        });

        $default = array(   ['value' => '2012',         'item_id' => 3,   'field_id' => 1],
                            ['value' => 'Fertig',       'item_id' => 3,   'field_id' => 2],
                            ['value' => '2008',         'item_id' => 4,   'field_id' => 1],
                            ['value' => 'Angefangen',   'item_id' => 4,   'field_id' => 2]
                        );

        foreach ($default as $value){
            DB::table('values')->insert([
                'value' => $value['value'],
                'item_id' => $value['item_id'],
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
        Schema::dropIfExists('values');
    }
}
