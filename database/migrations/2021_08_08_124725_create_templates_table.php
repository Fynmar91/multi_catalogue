<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('align');
            $table->integer('order');
            $table->boolean('filterable');
            $table->boolean('active');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('field_id');
            
            $table->foreign('item_id')->references('id')->on('items');    
            $table->foreign('field_id')->references('id')->on('fields');
        });

        $default = array(   ['align' => 'start',   'order' => '0',  'filterable' => true,       'active' => true,  'item_id' => 2,  'field_id' => 1],
                            ['align' => 'start',   'order' => '1',  'filterable' => false,      'active' => true,  'item_id' => 2,  'field_id' => 2]);

        foreach ($default as $value){
            DB::table('templates')->insert([
                'align' => $value['align'],
                'order' => $value['order'],
                'filterable' => $value['filterable'],
                'active' => $value['active'],
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
        Schema::dropIfExists('templates');
    }
}
