<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class addDepartmentData extends Migration
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
                'department_name' => 'TKJ',
                'created_at' => new \DateTime
            ],
            [
                'department_name' => 'RPL',
                'created_at' => new \DateTime
            ],
            [
                'department_name' => 'Multimedia',
                'created_at' => new \DateTime
            ],
            [
                'department_name' => 'TGB',
                'created_at' => new \DateTime
            ]
        ];
        DB::table('departments')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('departments')->truncate();
    }
}
