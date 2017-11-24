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
        

        DB::table('time_names')->insert([
            ['name'=>'เช้า'],
            ['name'=>'กลางวัน'],
            ['name'=>'บ่าย'],
            ['name'=>'เย็น'],
            ['name'=>'กลางคืน'],
    
         
            
        ]);

        DB::table('gender_names')->insert([
            ['name' => 'ชาย'],
            ['name' => 'หญิง'],
            ['name' => 'ทั้งหมด'],
        ]);

        DB::table('users')->insert([
            ['name' => 'user1',
            'sub_name' => 'user1',
            'email' => 'user1@user1.com',
            'password' => bcrypt('123456789'),
            'tel' => '0888888881',
            'gender' => 'ชาย',
            'latitude' => '17.8116210397149',
            'longitude' => '98.678570779',
            'avatar' => 'avatar',
            'rating' => '5'],
            ['name' => 'user2',
            'sub_name' => 'user2',
            'email' => 'user2@user2.com',
            'password' => bcrypt('123456789'),
            'tel' => '0888888882',
            'gender' => 'หญิง',
            'latitude' => '18.6574210397149',
            'longitude' => '99.9514970779',
            'avatar' => 'avatar',
            'rating' => '5'],
            ['name' => 'user3',
            'sub_name' => 'user3',
            'email' => 'user3@user3.com',
            'gender' => 'ชาย',
            'password' => bcrypt('123456789'),
            'tel' => '0888888883',
            'latitude' => '19.8795410397149',
            'longitude' => '97.9514970779',
            'avatar' => 'avatar',
            'rating' => '5'],
            ['name' => 'user4',
            'gender' => 'หญิง',
            'sub_name' => 'user4',
            'email' => 'user4@user4.com',
            'password' => bcrypt('123456789'),
            'tel' => '0888888884',
            'latitude' => '18.4687150397149',
            'longitude' => '98.8754970779',
            'avatar' => 'avatar',
            'rating' => '5'],
        ]);
        DB::table('sells')->insert([
            ['id_user' => '2',
            'type' => 'เศษเหล็ก',
            'sub_type' => 'ลวด',
            'gender_trade' => 'ทั้งหมด',
            'morning' => '3',
            'noon' => '1',
            'afternoon' => '0',
            'evening' => '0',
            'night' => '0',
            'volume' => '12',
            'price' => '1',
            'image' => 'gfdsgfsdg',
            'name_product' => 'name_product_01',
            'desc' => 'fdsafdasfs',
        ],
            ['id_user' => '3',
            'type' => 'เศษเหล็ก',
            'sub_type' => 'ลวด',
            'gender_trade' => 'ชาย',
            'morning' => '0',
            'noon' => '0',
            'afternoon' => '1',
            'evening' => '3',
            'night' => '1',
            'volume' => '4',
            'price' => '1',
            'image' => 'gfdsgfdsgdf',
            'name_product' => 'name_product_02',
            'desc' => 'gfdgfdsgds',
    ],
        ['id_user' => '3',
        'type' => 'เศษเหล็ก',
        'sub_type' => 'ลวด',
        'gender_trade' => 'หญิง',
        'morning' => '0',
        'noon' => '0',
        'afternoon' => '1',
        'evening' => '3',
        'night' => '1',
        'volume' => '4',
        'price' => '1',
        'image' => 'gfdsgfdsgdf',
        'name_product' => 'name_product_03',
        'desc' => 'gfdgfdsgds',
    ],
    
            ['id_user' => '4',
            'type' => 'เศษเหล็ก',
            'sub_type' => 'ลวด',
            'gender_trade' => 'ชาย',
            'morning' => '1',
            'noon' => '3',
            'afternoon' => '1',
            'evening' => '0',
            'night' => '0',
            'volume' => '2',
            'price' => '1',
            'image' => 'fdsfsda',
            'name_product' => 'name_product_04',
            'desc' => 'gfdsgfdsgf',
            ]
        ]);
    }
}
