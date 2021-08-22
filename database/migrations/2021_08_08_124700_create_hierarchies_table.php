<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHierarchiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hierarchies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('child_id');
            
            $table->foreign('parent_id')->references('id')->on('items');    
            $table->foreign('child_id')->references('id')->on('items');
        });

        $default = array(   ['parent_id' => 1,  'child_id' => 3],
                            ['parent_id' => 2,  'child_id' => 4],
                            ['parent_id' => 4,  'child_id' => 5],
                            ['parent_id' => 4,  'child_id' => 6]
                        );

        foreach ($default as $value){
            DB::table('hierarchies')->insert([
                'parent_id' => $value['parent_id'],
                'child_id' => $value['child_id'],
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
        Schema::dropIfExists('hierarchies');
    }
}
