<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocLookupValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_lookup_value', function (Blueprint $table) {
            $table->integer('doc_control_id')->unsigned();
			$table->integer('lookup_value_id')->unsigned();
			$table->integer('sort_order_number')->nullable();
			$table->integer('created_by')->unsigned();
			$table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });
		
		Schema::table('doc_lookup_value', function (Blueprint $table) {
            $table->foreign('doc_control_id')->references('doc_control_id')->on('doc_control');
        });
		
		Schema::table('doc_lookup_value', function (Blueprint $table) {
            $table->foreign('lookup_value_id')->references('lookup_value_id')->on('lookup_value');
        });
		

		//Inserting record for documentation-male relation
        DB::table('doc_lookup_value')->insert(
            array(
                'doc_control_id' => 1,
                'lookup_value_id' => 1,
                'sort_order_number' => 1,
                'created_by' => 1
                )
            );
			
		//Inserting record for female
        DB::table('doc_lookup_value')->insert(
            array(
                'doc_control_id' => 1,
                'lookup_value_id' => 2,
                'sort_order_number' => 2,
                'created_by' => 1
                )
            );		
				
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_lookup_value');
    }
}
