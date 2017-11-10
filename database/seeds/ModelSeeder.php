<?php

use App\Domain\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear the permissions cache
        app()['cache']->forget('spatie.permission.cache');

        // resource models
        factory(App\Domain\Category::class, 10)->create();
        factory(App\Domain\Peleton::class, 10)->create();
        factory(App\Domain\Vehicle::class, 10)->create();
        factory(App\Domain\Group::class, 10)->create();
        factory(App\Domain\Education::class, 10)->create();
        factory(App\Domain\User::class, 10)->create();

        // categories
        $educationCategory = Category::create(['name' => 'Opleidingen',    'type' => 'permission_category']);
        $groupCategory = Category::create(['name' => 'Groepen',        'type' => 'permission_category']);
        $peletonCategory = Category::create(['name' => 'Peletons',       'type' => 'permission_category']);
        $vehicleCategory = Category::create(['name' => 'Voertuigen',     'type' => 'permission_category']);
        $dashboardCategory = Category::create(['name' => 'Dashboard',     'type' => 'permission_category']);
        $permissionCategory = Category::create(['name' => 'Permissies',     'type' => 'permission_category']);
        $roleCategory = Category::create(['name' => 'Roles', 'type' => 'permission_category']);
        $userCategory = Category::create(['name' => 'Gebruikers', 'type' => 'permission_category']);

        // permissions
        Permission::create([
            'name'           => 'show-education',
            'description'    => 'Opleiding tonen',
            'category_id'    => $educationCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-education',
            'description'    => 'Opleiding aanmaken',
            'category_id'    => $educationCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-education',
            'description'    => 'Opleiding bewerken',
            'category_id'    => $educationCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-education',
            'description'    => 'Opleiding verwijderen',
            'category_id'    => $educationCategory->id,
        ]);

        Permission::create([
            'name'           => 'show-group',
            'description'    => 'Groep tonen',
            'category_id'    => $groupCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-group',
            'description'    => 'Groep aanmaken',
            'category_id'    => $groupCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-group',
            'description'    => 'Groep bewerken',
            'category_id'    => $groupCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-group',
            'description'    => 'Groep verwijderen',
            'category_id'    => $groupCategory->id,
        ]);

        Permission::create([
            'name'           => 'show-peleton',
            'description'    => 'Peleton tonen',
            'category_id'    => $peletonCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-peleton',
            'description'    => 'Peleton aanmaken',
            'category_id'    => $peletonCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-peleton',
            'description'    => 'Peleton bewerken',
            'category_id'    => $peletonCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-peleton',
            'description'    => 'Peleton verwijderen',
            'category_id'    => $peletonCategory->id,
        ]);

        Permission::create([
            'name'           => 'show-vehicle',
            'description'    => 'Toon voertuigen',
            'category_id'    => $vehicleCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-vehicle',
            'description'    => 'Voertuig aanmaken',
            'category_id'    => $vehicleCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-vehicle',
            'description'    => 'Voertuig bewerken',
            'category_id'    => $vehicleCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-vehicle',
            'description'    => 'Voertuig verwijderen',
            'category_id'    => $vehicleCategory->id,
        ]);

        Permission::create([
            'name'           => 'show-dashboard',
            'description'    => 'Dashboard tonen',
            'category_id'    => $dashboardCategory->id,
        ]);

        Permission::create([
            'name'           => 'edit-permission-settings',
            'description'    => 'Permissies bewerken',
            'category_id'    => $permissionCategory->id,
        ]);

        Permission::create([
            'name' => 'roles',
            'description' => 'Toon/bewerk/verwijder roles',
            'category_id' => $roleCategory->id,
        ]);

        Permission::create([
            'name' => 'create-user',
            'description' => 'Gebruiker aanmaken',
            'category_id' => $userCategory->id,
        ]);

        // roles => permissions
        $role = Role::create(['name' => 'Super-admin']);

        $role->givePermissionTo('show-education');
        $role->givePermissionTo('create-education');
        $role->givePermissionTo('edit-education');
        $role->givePermissionTo('delete-education');

        $role->givePermissionTo('show-group');
        $role->givePermissionTo('create-group');
        $role->givePermissionTo('edit-group');
        $role->givePermissionTo('delete-group');

        $role->givePermissionTo('show-peleton');
        $role->givePermissionTo('create-peleton');
        $role->givePermissionTo('edit-peleton');
        $role->givePermissionTo('delete-peleton');

        $role->givePermissionTo('show-vehicle');
        $role->givePermissionTo('create-vehicle');
        $role->givePermissionTo('edit-vehicle');
        $role->givePermissionTo('delete-vehicle');

        $role->givePermissionTo('show-dashboard');

        $role->givePermissionTo('edit-permission-settings');

        // edit first user
        $user = App\Domain\User::first();
        $user->name = 'Sander';
        $user->last_name = 'van Hooff';
        $user->email = 's.vanhooff@hotmail.com';
        $user->password = bcrypt('123');
        $user->assignRole('Super-admin');
        $user->save();

        // edit first user
        $user = App\Domain\User::all()->get(1);
        $user->name = 'Lars';
        $user->last_name = 'Janssen';
        $user->email = 'larsjanssen@hotmail.com';
        $user->password = bcrypt('123');
        $user->assignRole('Super-admin');
        $user->save();
    }
}
