<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {
        $mail = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        $user = User::create([

        	'name' => 'Administrador',

        	'email' => $mail,

            'password' => bcrypt($password)


        ]);

        $role = Role::create(['name' => 'Administrador']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }

}

// Comando para criar o seeder
// php artisan make:seeder PermissionTableSeeder
//usar o comando abaixo para gerar o usuário administrador
//php artisan db:seed --class=CreateAdminUserSeeder
