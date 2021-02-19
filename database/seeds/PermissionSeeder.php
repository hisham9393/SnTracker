<?php

use Bitfumes\Multiauth\Model\Permission;
use Faker\Provider\ar_JO\Person;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for - user
        Permission::create([
            'name' => 'CreateUser',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'ReadUser',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'UpdateUser',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'DeleteUser',
            'parent' => 'User',
        ]);


        // //for - Role
        // Permission::create([
        //     'name' => 'CreateRole',
        //     'parent' => 'Role',
        // ]);
        // Permission::create([
        //     'name' => 'ReadRole',
        //     'parent' => 'Role',
        // ]);
        // Permission::create([
        //     'name' => 'UpdateRole',
        //     'parent' => 'Role',
        // ]);
        // Permission::create([
        //     'name' => 'DeleteRole',
        //     'parent' => 'Role',
        // ]);


        //for - Permission
        Permission::create([
            'name' => 'CreatePermission',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'ReadPermission',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'UpdatePermission',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'DeletePermission',
            'parent' => 'Permission',
        ]);


        //for - Product
        Permission::create([
            'name' => 'CreateProduct',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'ReadProduct',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'UpdateProduct',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'DeleteProduct',
            'parent' => 'Product',
        ]);


        //for - Customer
        Permission::create([
            'name' => 'CreateCustomer',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'ReadCustomer',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'UpdateCustomer',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'DeleteCustomer',
            'parent' => 'Customer',
        ]);



        //for - Supplier
        Permission::create([
            'name' => 'CreateSupplier',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'ReadSupplier',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'UpdateSupplier',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'DeleteSupplier',
            'parent' => 'Supplier',
        ]);




        //for - SerialNumber
        Permission::create([
            'name' => 'CreateSerialNumber',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'ReadSerialNumber',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'UpdateSerialNumber',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'DeleteSerialNumber',
            'parent' => 'SerialNumber',
        ]);






        //                 //for - user
        // Permission::create([
        //     'name' => 'Create',
        //     'parent' => '',
        // ]);
        // Permission::create([
        //     'name' => 'Read',
        //     'parent' => '',
        // ]);
        // Permission::create([
        //     'name' => 'Update',
        //     'parent' => '',
        // ]);
        // Permission::create([
        //     'name' => 'Delete',
        //     'parent' => '',
        // ]);
    }
}
