<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission=[
            [
                'name'=>'country create',
                'permission_group_id'=>PermissionGroup::where('name','country')->first()->id,
            ],
            [
                'name'=>'country list',
                'permission_group_id'=>PermissionGroup::where('name','country')->first()->id,
            ],
            [
                'name'=>'country edit',
                'permission_group_id'=>PermissionGroup::where('name','country')->first()->id,
            ],
            [
                'name'=>'country delete',
                'permission_group_id'=>PermissionGroup::where('name','country')->first()->id,
            ],
            [
                'name'=>'state create',
                'permission_group_id'=>PermissionGroup::where('name','state')->first()->id,
            ],
            [
                'name'=>'state list',
                'permission_group_id'=>PermissionGroup::where('name','state')->first()->id,
            ],
            [
                'name'=>'state edit',
                'permission_group_id'=>PermissionGroup::where('name','state')->first()->id,
            ],
            [
                'name'=>'state delete',
                'permission_group_id'=>PermissionGroup::where('name','state')->first()->id,
            ]
           
        ];
        echo "--------------------------------------------------------------"."\n";
        echo "------------------Permission Group seeding--------------------"."\n";
        foreach($permission as $key=>$value){
            $permission = new Permission();
            $permission->name =$value['name'];
            $permission->permission_group_id =$value['permission_group_id'];
            $permission->save();
            echo "------------------Permission Group name $permission->name--------------------"."\n";
        }
        echo "------------------Permission Group seeding completed--------------------"."\n";
    }
}
