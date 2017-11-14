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
        DB::table('type_names')->insert([
            ['name' => 'เศษลวด'],
            ['name' => 'เศษกระดาษ'],
            ['name' => 'ขวดแก้ว'],
            ['name' => 'พลาสติก'],
            ['name' => 'โลหะ'],
            ['name' => 'เครื่องใช้สำนักงานและเครื่องใช้ไฟฟ้า'],
            ['name' => 'อิ่นๆ'],
        ]);

        DB::table('sub_type_names')->insert([
            ['name'=> 'ลวด'],
            ['name'=> 'กระป๋อง'],
            ['name'=> 'สังกะสี'],
            ['name'=> 'กระดาษลัง'],
            ['name'=> 'กระดาษหนังสือพิมพ์'],
            ['name'=> 'กระดาษย่อย'],
            ['name'=> 'กระดาษหนังสือ'],
            ['name'=> 'ขวดเบียร์'],
            ['name'=> 'ขวดสุรา'],
            ['name'=> 'ขวดสุราขาว'],
            ['name'=> 'ขวดเครื่องดื่มขูกำลัง'],
            ['name'=> 'เศษแก้ว'],
            ['name'=> 'ขวด PET'],
            ['name'=> 'ขวดน้ำขาว-ขุ่น'],
            ['name'=> 'ท่อPVC'],
            ['name'=> 'โฟม'],
            ['name'=> 'อลูมิเนียม'],
            ['name'=> 'กระป๋องเครื่องดื่ม'],
            ['name'=> 'ทองแดง'],
            ['name'=> 'ทองเหลือง'],
            ['name'=> 'อุปกรณ์คอมพิวเตอร์'],
            ['name'=> 'เครื่องใช้ไฟฟ้า'],
            ['name'=> 'แผงวงจร'],
            ['name'=> 'แอร์คอนดิชั่น'],
            ['name'=> 'น้ำมันพืชเก่า'],
            ['name'=> 'ยางรถยนต์/มอเตอร์ไซต์'],
        ]);

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
            'type' => 'เศษลวด',
            'sub_type' => 'ลวด',
            'gender_trade' => 'ทั้งหมด',
            'morning' => '10',
            'noon' => '0',
            'afternoon' => '0',
            'evening' => '0',
            'night' => '0',
            'volume' => '12',
            'price' => '1',
            'image' => 'gfdsgfsdg',
            'name' => 'sgfdsad',
            'desc' => 'fdsafdasfs',
        ],
            ['id_user' => '3',
            'type' => 'เศษลวด',
            'sub_type' => 'ลวด',
            'gender_trade' => 'ชาย',
            'morning' => '0',
            'noon' => '0',
            'afternoon' => '0',
            'evening' => '10',
            'night' => '0',
            'volume' => '4',
            'price' => '1',
            'image' => 'gfdsgfdsgdf',
            'name' => 'sfgdsgfdsgfd',
            'desc' => 'gfdgfdsgds',
    ],
            ['id_user' => '4',
            'type' => 'เศษลวด',
            'sub_type' => 'ลวด',
            'gender_trade' => 'ชาย',
            'morning' => '0',
            'noon' => '10',
            'afternoon' => '0',
            'evening' => '0',
            'night' => '0',
            'volume' => '',
            'price' => '1',
            'image' => 'fdsfsda',
            'name' => 'fdsafsf',
            'desc' => 'gfdsgfdsgf',
            ]
        ]);
    }
}
