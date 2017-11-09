<?php

use App\Domain\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed resource test data
        factory(App\Domain\Category::class, 10)->create();
        factory(App\Domain\Peleton::class, 10)->create();
        factory(App\Domain\Vehicle::class, 10)->create();
        factory(App\Domain\Group::class, 10)->create();
        factory(App\Domain\Education::class, 10)->create();
        factory(App\Domain\User::class, 10)->create();

        // settings categories
        $settingsEducationCategory = Category::create([ 'name' => 'Opleidingen',    'type' => 'permission_category']);
        $settingsGroupCategory = Category::create([     'name' => 'Groepen',        'type' => 'permission_category']);
        $settingsPeletonCategory = Category::create([   'name' => 'Peletons',       'type' => 'permission_category' ]);
        $settingsVehicleCategory = Category::create([   'name' => 'Voertuigen',     'type' => 'permission_category']);
        $settingsPermissions = Category::create([       'name' => 'Permissies',     'type' => 'permission_category']);

        // create permissions
        Permission::create([
            'name'           => 'show-education',
            'description'    => 'Opleiding tonen',
            'category_id'    => $settingsEducationCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-education',
            'description'    => 'Opleiding aanmaken',
            'category_id'    => $settingsEducationCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-education',
            'description'    => 'Opleiding bewerken',
            'category_id'    => $settingsEducationCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-education',
            'description'    => 'Opleiding verwijderen',
            'category_id'    => $settingsEducationCategory->id,
        ]);

        Permission::create([
            'name'           => 'show-group',
            'description'    => 'Groep tonen',
            'category_id'    => $settingsGroupCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-group',
            'description'    => 'Groep aanmaken',
            'category_id'    => $settingsGroupCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-group',
            'description'    => 'Groep bewerken',
            'category_id'    => $settingsGroupCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-group',
            'description'    => 'Groep verwijderen',
            'category_id'    => $settingsGroupCategory->id,
        ]);

        Permission::create([
            'name'           => 'show-peleton',
            'description'    => 'Peleton tonen',
            'category_id'    => $settingsPeletonCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-peleton',
            'description'    => 'Peleton aanmaken',
            'category_id'    => $settingsPeletonCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-peleton',
            'description'    => 'Peleton bewerken',
            'category_id'    => $settingsPeletonCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-peleton',
            'description'    => 'Peleton verwijderen',
            'category_id'    => $settingsPeletonCategory->id,
        ]);

        Permission::create([
            'name'           => 'show-vehicle',
            'description'    => 'Toon voertuigen',
            'category_id'    => $settingsVehicleCategory->id,
        ]);
        Permission::create([
            'name'           => 'create-vehicle',
            'description'    => 'Voertuig aanmaken',
            'category_id'    => $settingsVehicleCategory->id,
        ]);
        Permission::create([
            'name'           => 'edit-vehicle',
            'description'    => 'Voertuig bewerken',
            'category_id'    => $settingsVehicleCategory->id,
        ]);
        Permission::create([
            'name'           => 'delete-vehicle',
            'description'    => 'Voertuig verwijderen',
            'category_id'    => $settingsVehicleCategory->id,
        ]);

        Permission::create([
            'name'           => 'edit-permission-settings',
            'description'    => 'Bewerk permissies',
            'category_id'    => $settingsPermissions->id,
        ]);

        /*
        * Generate the role(s).
        */
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

        $role->givePermissionTo('edit-permission-settings');

        // edit first user
        $user = App\Domain\User::first();
        $user->name = 'Sander';
        $user->last_name = 'van Hooff';
        $user->email = 's.vanhooff@hotmail.com';
        $user->password = bcrypt('123');
        $user->assignRole('Super-admin');
        $user->save();
    }
}
