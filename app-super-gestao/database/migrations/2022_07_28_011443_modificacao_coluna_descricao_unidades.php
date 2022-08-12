<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificacaoColunaDescricaoUnidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('unidades', function (Blueprint $table) {
            $table->renameColumn('descricao, 30', 'descricao');
        });*/
        Schema::table('unidades', function (Blueprint $table) {
            $table->dropColumn('descricao, 30');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
