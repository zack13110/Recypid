<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        

        DB::table('users')->insert([
            ['name' => 'Edward',
            'sub_name' => 'Vaughan',
            'email' => 'user1@hotmail.com',
            'password' => bcrypt('123456789'),
            'tel' => '0888888881',
            'gender' => 'ชาย',
            'latitude' => '18.13194845',
            'longitude' => '98.16718936',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'Andrew',
            'sub_name' => 'Holmes',
            'email' => 'user2@hotmail.com',
            'password' => bcrypt('123456789'),
            'tel' => '0888888882',
            'gender' => 'หญิง',
            'latitude' => '19.15229604',
            'longitude' => '98.853534',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'Frank',
            'sub_name' => 'Whitaker',
            'email' => 'user3@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.31021954',
            'longitude' => '98.81336926',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'Jeffrey',
            'gender' => 'ชาย',
            'sub_name' => 'Zhang',
            'email' => 'user4@hotmail.com',
            'password' => bcrypt('123456789'),
            'tel' => '0888888884',
            'latitude' => '18.32130653',
            'longitude' => '98.94711616',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'Donald',
            'sub_name' => 'Jefferson',
            'email' => 'user5@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.78783862',
            'longitude' => '97.52894706',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user6',
            'sub_name' => 'user6',
            'email' => 'user6@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.65382426',
            'longitude' => '98.76099447',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user7',
            'sub_name' => 'user7',
            'email' => 'user7@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.53354291',
            'longitude' => '97.81624321',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user8',
            'sub_name' => 'user8',
            'email' => 'user8@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.78247869',
            'longitude' => '98.95823185',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user9',
            'sub_name' => 'user9',
            'email' => 'user9@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.09370579',
            'longitude' => '98.62547579',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user10',
            'sub_name' => 'user10',
            'email' => 'user10@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.23210529',
            'longitude' => '98.92052635',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user11',
            'sub_name' => 'user11',
            'email' => 'user11@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.83653054',
            'longitude' => '98.0408822',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user12',
            'sub_name' => 'user12',
            'email' => 'user12@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.26750809',
            'longitude' => '97.96162109',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user13',
            'sub_name' => 'user13',
            'email' => 'user13@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.90615977',
            'longitude' => '98.04842204',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user14',
            'sub_name' => 'user14',
            'email' => 'user14@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.59167193',
            'longitude' => '98.35363896',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user15',
            'sub_name' => 'user15',
            'email' => 'user15@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.97021696',
            'longitude' => '97.59569589',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user16',
            'sub_name' => 'user16',
            'email' => 'user16@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.54391858',
            'longitude' => '97.84546576',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user17',
            'sub_name' => 'user17',
            'email' => 'user17@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.63976562',
            'longitude' => '97.60427213',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user18',
            'sub_name' => 'user18',
            'email' => 'user18@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.22690095',
            'longitude' => '98.27649861',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user19',
            'sub_name' => 'user19',
            'email' => 'user19@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.63500188',
            'longitude' => '98.75370427',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user20',
            'sub_name' => 'user20',
            'email' => 'user20@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.71274855',
            'longitude' => '98.38831552',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user21',
            'sub_name' => 'user21',
            'email' => 'user21@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.66058911',
            'longitude' => '98.58597616',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user22',
            'sub_name' => 'user22',
            'email' => 'user22@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.22931215',
            'longitude' => '97.54135281',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user23',
            'sub_name' => 'user23',
            'email' => 'user23@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.45522926',
            'longitude' => '98.64649089',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user24',
            'sub_name' => 'user24',
            'email' => 'user24@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.49129529',
            'longitude' => '98.1117228',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user25',
            'sub_name' => 'user25',
            'email' => 'user25@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.21262657',
            'longitude' => '97.81629321',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user26',
            'sub_name' => 'user26',
            'email' => 'user26@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.82159785',
            'longitude' => '98.39395145',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user27',
            'sub_name' => 'user27',
            'email' => 'user27@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.82083369',
            'longitude' => '98.93536985',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user28',
            'sub_name' => 'user28',
            'email' => 'user28@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.89251092',
            'longitude' => '97.64387069',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user29',
            'sub_name' => 'user29',
            'email' => 'user29@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.82522973',
            'longitude' => '98.79483932',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user30',
            'sub_name' => 'user30',
            'email' => 'user30@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.64323488',
            'longitude' => '97.62741941',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user31',
            'sub_name' => 'user31',
            'email' => 'user31@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.3481612',
            'longitude' => '98.69932194',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user32',
            'sub_name' => 'user32',
            'email' => 'user32@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.12295487',
            'longitude' => '98.80789726',
            'avatar' => 'avatar',
            'rating' => '5'],
            
            ['name' => 'user33',
            'sub_name' => 'user33',
            'email' => 'user33@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.08790814',
            'longitude' => '98.81157778',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user34',
            'sub_name' => 'user34',
            'email' => 'user34@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.91231727',
            'longitude' => '97.66959409',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user35',
            'sub_name' => 'user35',
            'email' => 'user35@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.86235844',
            'longitude' => '98.23038955',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user36',
            'sub_name' => 'user36',
            'email' => 'user36@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.6486577',
            'longitude' => '98.40261451',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user37',
            'sub_name' => 'user37',
            'email' => 'user37@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.54851896',
            'longitude' => '98.5601392',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user38',
            'sub_name' => 'user38',
            'email' => 'user38@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.52739512',
            'longitude' => '98.54116121',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user39',
            'sub_name' => 'user39',
            'email' => 'user39@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.7970318',
            'longitude' => '98.40109806',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user40',
            'sub_name' => 'user40',
            'email' => 'user40@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.23748746',
            'longitude' => '97.67907482',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user41',
            'sub_name' => 'user41',
            'email' => 'user41@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.03100273',
            'longitude' => '98.18358753',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user42',
            'sub_name' => 'user42',
            'email' => 'user42@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.56365332',
            'longitude' => '98.65297746',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user43',
            'sub_name' => 'user43',
            'email' => 'user43@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.67142159',
            'longitude' => '97.670538',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user44',
            'sub_name' => 'user44',
            'email' => 'user44@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.95279495',
            'longitude' => '97.77449364',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user45',
            'sub_name' => 'user45',
            'email' => 'user45@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.34012572',
            'longitude' => '97.88144195',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user46',
            'sub_name' => 'user46',
            'email' => 'user46@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.11795585',
            'longitude' => '97.99567996',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user47',
            'sub_name' => 'user47',
            'email' => 'user47@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.68739044',
            'longitude' => '97.82388529',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user48',
            'sub_name' => 'user48',
            'email' => 'user48@hotmail.com',
            'gender' => 'หญิง',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.94658004',
            'longitude' => '98.81842726',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user49',
            'sub_name' => 'user49',
            'email' => 'user49@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.65208553',
            'longitude' => '98.05698747',
            'avatar' => 'avatar',
            'rating' => '5'],

            ['name' => 'user50',
            'sub_name' => 'user50',
            'email' => 'user50@hotmail.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '18.90091874',
            'longitude' => '98.78520311',
            'avatar' => 'avatar',
            'rating' => '5'],
        ]);
    }
}
