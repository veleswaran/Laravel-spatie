<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "--------------------------------------------------------------"."\n";
        echo "------------------role  seeding--------------------"."\n";
        $role=new Role;
        $role->name="Super Admin";
        $role->save(); 
        echo "------------------role  name $role->name--------------------"."\n";
        echo "------------------Assign all Permission to -------------------"."\n";

        $permissions =Permission::get();

        foreach($permissions as $key=>$value){
            $role->givePermissionTo($value->name);
            echo "------------------Assign Permission  name $value->name--------------------"."\n";
        }

        echo "------------------role Group seeding completed--------------------"."\n";
        echo "--------------------------------------------------------------"."\n";
    }
}
