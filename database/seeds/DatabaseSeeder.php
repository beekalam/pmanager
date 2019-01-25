<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
class RolesTableSeeder extends Seeder{
    public function run(){
        Role::truncate();
        foreach(['Admin','moderators','user'] as $name){
            $r = new Role();
            $r->name = $name;
            $r->save();
        }
    }
}

class UsersTableSeeder extends Seeder{
    public function run(){
       User::truncate();

       $u = new User();
       $u->name = 'moh';
       $u->email = 'laravel@localhost.com';
       $u->password = bcrypt(123456); 
       $u->role_id = Role::where('name','Admin')->first()->id;
       $u->save();


       $um = new User();
       $um->name='mod';
       $um->email = 'mod@localhost.com';
       $um->password = bcrypt(123456); 
       $um->role_id = Role::where('name','moderators')->first()->id;
       $um->save();

       $uu = new User();
       $uu->name='user';
       $uu->email = 'user@localhost.com';
       $uu->password = bcrypt(123456); 
       $uu->role_id = Role::where('name','user')->first()->id;
       $uu->save();
    }
}
