<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrencyIndexToLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lot', function (Blueprint $table) {
            $table->integer('currency_id')->unsigned()->default(0);
            $table->foreign('currency_id')->references('id')->on('currencies')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lot', function (Blueprint $table) {
            $table->dropForeign('currency_id');
            $table->dropColumn('currency_id');
        });
    }
}
