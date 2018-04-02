<?php
use Migrations\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 18; $i++) {
            $data[] = [
                'name'      => $faker->userName,
                'member_id' => $faker->randomNumber,
                'profession' => $faker->jobTitle,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'nid' => $faker->randomNumber,
                'blood_id' => $faker->1,
                'member_category' => $faker->1,
                'image' => imageUrl($width = 329, $height = 486),
                'password'      => sha1($faker->password),
                'email'         => $faker->email,
                'created'       => date('Y-m-d H:i:s'),
            ];
        }
        $this->insert('users', $data);
        for ($i = 0; $i < 18; $i++) {
            $data2[] = [
                'name'      => $faker->userName,
                'member_id' => $faker->randomNumber,
                'profession' => $faker->jobTitle,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'nid' => $faker->randomNumber,
                'blood_id' => $faker->2,
                'member_category' => $faker->2,
                'image' => imageUrl($width = 329, $height = 486),
                'password'      => sha1($faker->password),
                'email'         => $faker->email,
                'created'       => date('Y-m-d H:i:s'),
            ];
        }
        $this->insert('users', $data2);
        for ($i = 0; $i < 18; $i++) {
            $data3[] = [
                'name'      => $faker->userName,
                'member_id' => $faker->randomNumber,
                'profession' => $faker->jobTitle,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'nid' => $faker->randomNumber,
                'blood_id' => $faker->3,
                'member_category' => $faker->3,
                'image' => imageUrl($width = 329, $height = 486),
                'password'      => sha1($faker->password),
                'email'         => $faker->email,
                'created'       => date('Y-m-d H:i:s'),
            ];
        }
        $this->insert('users', $data3);
    }
}
