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
        $admin->password = bcrypt('123456');
        $admin->name = 'Usman Akram';
        $admin->save();

        $admin = new User();
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('admin');
        $admin->name = 'Admin';
        $admin->save();
    }
}
