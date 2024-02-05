<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionGroups=[
            [
                'name'=>'country'
            ],
            [
                'name'=>'state'
            ],
        ];
        echo "--------------------------------------------------------------"."\n";
        echo "------------------Permission Group seeding--------------------"."\n";
        foreach($permissionGroups as $key=>$value){
            $permissionGroup = new PermissionGroup;
            $permissionGroup->name =$value['name'];
            $permissionGroup->save();
            echo "------------------Permission Group name $permissionGroup->name--------------------"."\n";
        }
        echo "------------------Permission Group seeding completed--------------------"."\n";
    }
}
