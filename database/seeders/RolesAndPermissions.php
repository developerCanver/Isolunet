<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		
		 // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

		// create permissions user 
        Permission::create(['name' => 'editar usuario']);
        Permission::create(['name' => 'crear usuario']);
        Permission::create(['name' => 'publicar usuario']);
        Permission::create(['name' => 'eliminar usuario']);

        // create permissions rol 
        Permission::create(['name' => 'editar rol']);
        Permission::create(['name' => 'crear rol']);
        Permission::create(['name' => 'publicar rol']);
        Permission::create(['name' => 'eliminar rol']);

        // create permissions  
        Permission::create(['name' => 'editar permiso']);
        Permission::create(['name' => 'crear permiso']);
        Permission::create(['name' => 'publicar permiso']);
        Permission::create(['name' => 'eliminar permiso']);



        // this can be done as separate statements
        /*$role = Role::create(['name' => 'usuario']);
        $role->givePermissionTo('edit articles');*/

        // or may be done by chaining
   /*     $role = Role::create(['name' => 'administrador'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);*/

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
	}
}
