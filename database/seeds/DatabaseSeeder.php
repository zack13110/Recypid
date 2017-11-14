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
    }
}
