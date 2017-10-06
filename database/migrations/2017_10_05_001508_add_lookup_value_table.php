<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLookupValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookup_value', function (Blueprint $table) {
            $table->increments('lookup_value_id');
            $table->string('lookup_value');
            $table->boolean('archived')->default(0);
			$table->integer('created_by')->unsigned();
			$table->integer('updated_by')->unsigned()->nullable();
//            $table->rememberToken();
            $table->timestamps();
        });
		
		//Inserting record for male
        DB::table('lookup_value')->insert(
            array(
                'lookup_value' => 'male',
                'created_by' => 1
                )
            );
			
		//Inserting record for female
        DB::table('lookup_value')->insert(
            array(
                'lookup_value' => 'female',
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
        Schema::dropIfExists('lookup_value');
    }
}
