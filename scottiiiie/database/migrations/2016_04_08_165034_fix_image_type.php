<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixImageType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function ($table) {
            $sql = 'ALTER TABLE `images` DROP `image_data`';
            DB::connection()->getPdo()->exec($sql);
            $sql = 'ALTER TABLE `images` ADD `image_data` LONGBLOB';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
