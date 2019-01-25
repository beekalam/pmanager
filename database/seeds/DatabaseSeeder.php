<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder{
    public function run(){
       $u = new User();
       $u->name = 'moh';
       $u->email = 'laravel@localhost.com';
       $u->password = bcrypt(123456); 
       $u->role_id = 1;
       $u->save();
    }
}
