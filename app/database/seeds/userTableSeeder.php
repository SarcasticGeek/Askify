<<?php
class userTableSeeder extends Seeder{
    public function run()
    {
        $faker = Faker\Factory::create();
        User::truncate();
        for($i=0;$i<10;$i++)
        {

            $user = User::create(array(
               'username'=>$faker->userName,
                'email'=>$faker->email,
                'password'=>$faker->password

            ));
        }
    }
}