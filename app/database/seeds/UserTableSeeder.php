<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
       // $admin = Sentry::findGroupByName('Admin');

        // Create the super user
        Sentry::createUser(array(
            'email' => 'super@mail.com',
            'first_name' => 'Super Administrator',
            'password' => 'pass',
            'activated' => 1,
            'permissions' => array('superuser' => 1)
        ));

        $user = Sentry::createUser(array(
            'email' => 'admin@mail.com',
            'first_name' => 'Administrator',
            'password' => 'pass',
            'activated' => 1,
            'permissions' => array()
        ));
         //$user->addGroup($admin);
    }

}
