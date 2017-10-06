<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_control', function (Blueprint $table) {
            $table->increments('doc_control_id');
            $table->integer('navigation_id')->unsigned();
			$table->string('label');
			$table->integer('doc_control_type_id')->unsigned();
			$table->integer('freetext_value_type_id')->unsigned()->nullable();
			$table->integer('freetext_minval_number')->nullable();
			$table->integer('freetext_maxval_number')->nullable();
			$table->date('freetext_minval_date')->nullable();
			$table->date('freetext_maxval_date')->nullable();
			$table->integer('freetext_minval_length')->nullable();
			$table->integer('freetext_maxval_length')->nullable();
            $table->boolean('archived')->default(0);
			$table->integer('created_by')->unsigned();
			$table->integer('updated_by')->unsigned()->nullable();
//            $table->rememberToken();
            $table->timestamps();
        });

/*Commented out since navigation table is not in github yet		
        //Adding foreign key constraint with navigation table
        Schema::table('doc_control', function (Blueprint $table) {
            $table->foreign('navigation_id')->references('navigation_id')->on('navigation');
        });
*/
        //Adding foreign key constraint with doc_control_type table
        Schema::table('doc_control', function (Blueprint $table) {
            $table->foreign('doc_control_type_id')->references('doc_control_type_id')->on('doc_control_type');
        });

        //Adding foreign key constraint with freetext_value_type table
        Schema::table('doc_control', function (Blueprint $table) {
            $table->foreign('freetext_value_type_id')->references('freetext_value_type_id')->on('freetext_value_type');
        });

		//Inserting record for demographic-gender
        DB::table('doc_control')->insert(
            array(
                'navigation_id' => 1,
                'label' => 'sex',
                'doc_control_type_id' => 1,
                'created_by' => 1
                )
            );
			
		//Inserting record for demographic-age
        DB::table('doc_control')->insert(
            array(
                'navigation_id' => 1,
                'label' => 'age',
                'doc_control_type_id' => 3,
                'freetext_value_type_id' => 1,
                'created_by' => 1
                )
            );
			
		//Inserting record for demographic-height
        DB::table('doc_control')->insert(
            array(
                'navigation_id' => 1,
                'label' => 'height',
                'doc_control_type_id' => 3,
                'freetext_value_type_id' => 3,
                'created_by' => 1
                )
            );
			
		//Inserting record for demographic-weight
        DB::table('doc_control')->insert(
            array(
                'navigation_id' => 1,
                'label' => 'weight',
                'doc_control_type_id' => 3,
                'freetext_value_type_id' => 3,
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
        Schema::dropIfExists('doc_control');
    }
}
