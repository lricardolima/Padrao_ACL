<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

       $permissions = [

           'Cadastrar Ramal',

           'Editar Ramal',

           'Excluir Ramal',

           'Cadastrar Refeicao',

           'Editar Refeicao',

           'Cadastrar Noticia',

           'Editar Noticia',

           'Informatica'

        ];

        foreach ($permissions as $permission) {

             Permission::create(['name' => $permission]);

        }

    }

}


//Comando para criar seeder
//php artisan make:seeder CreateAdminUserSeeder
//usar o comando abaixo para gerar as permissões
////php artisan db:seed --class=PermissionTableSeeder
