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
            ['name' => 'เครื่องใช้สำนักงาน'],
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
            ['name'=> 'อื่นๆ'],
            ['name'=> 'น้ำมันพืชเก่า'],
            ['name'=> 'ยางรถยนต์/มอเตอร์ไซต์'],
        ]);

        DB::table('time_names')->insert([
            ['name'=>'24.00'],
            ['name'=>'01.00'],
            ['name'=>'02.00'],
            ['name'=>'03.00'],
            ['name'=>'04.00'],
            ['name'=>'05.00'],
            ['name'=>'06.00'],
            ['name'=>'07.00'],
            ['name'=>'08.00'],
            ['name'=>'09.00'],
            ['name'=>'10.00'],
            ['name'=>'11.00'],
            ['name'=>'12.00'],
            ['name'=>'13.00'],
            ['name'=>'14.00'],
            ['name'=>'15.00'],
            ['name'=>'16.00'],
            ['name'=>'17.00'],
            ['name'=>'18.00'],
            ['name'=>'19.00'],
            ['name'=>'20.00'],
            ['name'=>'21.00'],
            ['name'=>'22.00'],
            ['name'=>'23.00'],
            
        ]);

        DB::table('gender_names')->insert([
            ['name' => 'ชาย'],
            ['name' => 'หญิง'],
            ['name' => 'ทั้งหมด'],
        ]);
    }
}
