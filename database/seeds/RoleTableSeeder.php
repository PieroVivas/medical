<?php
use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $role = new Role();
        $role->name = 'administrador';
        $role->description = 'ADMINISTRADOR';
        $role->save();

        $role = new Role();
        $role->name = 'recepcion';
        $role->description = 'RECEPCIONISTA';
        $role->save();

        $role = new Role();
        $role->name = 'innova';
        $role->description = 'INNOVA';
        $role->save();

       


    }
}
