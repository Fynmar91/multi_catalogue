<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('type');
            $table->unsignedBigInteger('item_id');

            $table->foreign('item_id')->references('id')->on('items'); 
        });

        $default = array(   ['name' => 'Crime',         'type' => '1',  'item_id' => 3],
                            ['name' => 'DC',            'type' => '2',  'item_id' => 3],
                            ['name' => 'Crime',         'type' => '1',  'item_id' => 4],
                            ['name' => 'Thriller',      'type' => '1',  'item_id' => 4],
                            ['name' => 'Drama',         'type' => '1',  'item_id' => 4],
                        );

        foreach ($default as $value){
            DB::table('tags')->insert([
                'name' => $value['name'],
                'type' => $value['type'],
                'item_id' => $value['item_id'],
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
        Schema::dropIfExists('tags');
    }
}
