<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->email = 'musmanakram@ciitlahore.edu.pk';
        $admin->password = bcrypt('cscomsats');
        $admin->name = 'Usman Akram';
        $admin->save();
    }
}
