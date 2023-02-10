<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Banco;
use File;

class ConfigadminrolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles del sistema
        $admin = Role::create(['name' => 'Administrador']); //Administrador del Sistema
        $user = Role::create(['name' => 'Usuario']); //Usuario
        $clie = Role::create(['name' => 'Cliente']); //Cliente

        //permisos del menu
        Permission::create(['name' => 'menuCategoria'])->syncRoles([$admin]);
        Permission::create(['name' => 'menuEstadistica'])->syncRoles([$admin]);
        Permission::create(['name' => 'menuConfiguraciones'])->syncRoles([$admin]);

        Permission::create(['name' => 'menuProducto'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'menuCliente'])->syncRoles([$admin, $user]);

        Permission::create(['name' => 'menuPanel'])->syncRoles([$admin, $user, $clie]); 

        //usuario
        User::create([
            'name' => 'Oliver Gomez',
            'email' => 'kayserenrique@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Marina Bolet',
            'email' => 'marianaboletmartinez@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Dayana Martinez',
            'email' => 'dmaro006@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Administrador');

        $json = File::get("database/data/bancos.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Banco::create(array(
                'codigo' => $obj->codigo,
                'nombre' => $obj->nombre,
                'rif' => $obj->rif,
            ));
        };
    }
}
