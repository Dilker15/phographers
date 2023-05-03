<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


// use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $user = new User();
        // $user->name('Dilker');
        // $user->email('dilker72@gmail.com');
        // $user->role_id(1);
        // $user->invitado_id(1);
        // $user->tipo_user(1);
        
        $user = User::create([
            'name' => 'Dilker', 
            'email' => 'dilker72@gmail.com',
            'password' => bcrypt('123456789'),
            'role_id' => 1,
            'invitado_id' =>1,
            'tipo_user'=>1
        ]);

        $user2 = User::create([
            'name' => 'dilkerCartagena', 
            'email' => 'dilker82@gmail.com',
            'password' => bcrypt('123456789'),
            'role_id' => 2,
            'invitado_id' =>2,
            'tipo_user'=>2
        ]);

        $role = Role::create(['name' => 'invitado']);
        $role2 = Role::create(['name' => 'fotografo']);


        // $permissions = Permission::pluck('id','id')->all();
        
        $permissions = Permission::create([
            'name'=>'crearEvento',
            'guard_name'=>'web',
        ]);

        $user2->assignRole([$role->name]);

        $role->syncPermissions($permissions);

        $user->assignRole([$role->name]);
        
    }
}
