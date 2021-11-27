<?php

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

class UpdateColumnsToSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->integer('NIS')->unsigned()->nullable()->change();
            $table->string('NamaSiswa')->change();
            $table->bigInteger('NoTelp')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn('NIS');
            $table->dropColumn('NamaSiswa');
            $table->dropColumn('JenisKelamin');
            $table->dropColumn('NoTelp');
        });
    }
}
