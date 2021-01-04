<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddGradeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'grade_name' => 'Kelas 1',
                'created_at' => new \DateTime
            ],
            [
                'grade_name' => 'Kelas 2',
                'created_at' => new \DateTime
            ],
            [
                'grade_name' => 'Kelas 3',
                'created_at' => new \DateTime
            ]
        ];
        DB::table('grades')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('grades')->truncate();
    }
}
