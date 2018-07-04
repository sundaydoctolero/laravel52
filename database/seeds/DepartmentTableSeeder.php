<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dept = new Department();
        $dept->dept_name = 'Default';
        $dept->dept_code = 'Default';
        $dept->dept_description = 'Default';
        $dept->save();

        $dept = new Department();
        $dept->dept_name = 'Human Resources';
        $dept->dept_code = 'HR';
        $dept->dept_description = 'Human Resources Department';
        $dept->save();

        $dept = new Department();
        $dept->dept_name = 'Production';
        $dept->dept_code = 'Prod';
        $dept->dept_description = 'Production Department';
        $dept->save();

        $dept = new Department();
        $dept->dept_name = 'Information Technology';
        $dept->dept_code = 'IT';
        $dept->dept_description = 'IT Department';
        $dept->save();

        $dept = new Department();
        $dept->dept_name = 'Accounting';
        $dept->dept_code = 'ACC';
        $dept->dept_description = 'Accounting Department';
        $dept->save();

        $dept = new Department();
        $dept->dept_name = 'Admin';
        $dept->dept_code = 'Admin';
        $dept->dept_description = 'Administration Department';
        $dept->save();
    }
}
