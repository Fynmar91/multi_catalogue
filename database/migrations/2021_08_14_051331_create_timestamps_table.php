<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateTimestampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timestamps', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('type')->nullable();
            $table->unsignedBigInteger('item_id');

            $table->foreign('item_id')->references('id')->on('items'); 
        });

        $default = array(   ['date' => '2021-01-6',   'type' => '1',  'item_id' => 5],
                            ['date' => '2021-01-7',   'type' => '1',  'item_id' => 6],
                            ['date' => '2021-08-14',   'type' => '1',  'item_id' => 5],
                            ['date' => '2021-08-15',   'type' => '1',  'item_id' => 6],);

        foreach ($default as $value){
            DB::table('timestamps')->insert([
                'date' => Carbon::parse($value['date']),
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
        Schema::dropIfExists('timestamps');
    }
}
