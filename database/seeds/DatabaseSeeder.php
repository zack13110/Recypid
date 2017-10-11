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
            ['type_id' => '1', 'sub_type_id' => '1', 'sub_type_name'=> 'ลวด'],
            ['type_id' => '1', 'sub_type_id' => '3', 'sub_type_name'=> 'กระป๋อง'],
            ['type_id' => '1', 'sub_type_id' => '5', 'sub_type_name'=> 'สังกะสี'],
            ['type_id' => '2', 'sub_type_id' => '1', 'sub_type_name'=> 'กระดาษลัง'],
            ['type_id' => '2', 'sub_type_id' => '3', 'sub_type_name'=> 'กระดาษหนังสือพิมพ์'],
            ['type_id' => '2', 'sub_type_id' => '5', 'sub_type_name'=> 'กระดาษย่อย'],
            ['type_id' => '2', 'sub_type_id' => '7', 'sub_type_name'=> 'กระดาษหนังสือ'],
            ['type_id' => '3', 'sub_type_id' => '1', 'sub_type_name'=> 'ขวดเบียร์'],
            ['type_id' => '3', 'sub_type_id' => '3', 'sub_type_name'=> 'ขวดสุรา'],
            ['type_id' => '3', 'sub_type_id' => '5', 'sub_type_name'=> 'ขวดสุราขาว'],
            ['type_id' => '3', 'sub_type_id' => '7', 'sub_type_name'=> 'ขวดเครื่องดื่มขูกำลัง'],
            ['type_id' => '3', 'sub_type_id' => '9', 'sub_type_name'=> 'เศษแก้ว'],
            ['type_id' => '4', 'sub_type_id' => '1', 'sub_type_name'=> 'ขวด PET'],
            ['type_id' => '4', 'sub_type_id' => '3', 'sub_type_name'=> 'ขวดน้ำขาว-ขุ่น'],
            ['type_id' => '4', 'sub_type_id' => '5', 'sub_type_name'=> 'ท่อPVC'],
            ['type_id' => '4', 'sub_type_id' => '7', 'sub_type_name'=> 'โฟม'],
            ['type_id' => '5', 'sub_type_id' => '1', 'sub_type_name'=> 'อลูมิเนียม'],
            ['type_id' => '5', 'sub_type_id' => '3', 'sub_type_name'=> 'กระป๋องเครื่องดื่ม'],
            ['type_id' => '5', 'sub_type_id' => '5', 'sub_type_name'=> 'ทองแดง'],
            ['type_id' => '5', 'sub_type_id' => '7', 'sub_type_name'=> 'ทองเหลือง'],
            ['type_id' => '6', 'sub_type_id' => '1', 'sub_type_name'=> 'อื่นๆ'],
            ['type_id' => '7', 'sub_type_id' => '1', 'sub_type_name'=> 'น้ำมันพืชเก่า'],
            ['type_id' => '7', 'sub_type_id' => '3', 'sub_type_name'=> 'ยางรถยนต์/มอเตอร์ไซต์'],
        ]);

        DB::table('time_names')->insert([
            ['name'=>'06.00-09.00'],
            ['name'=>'09.00-12.00'],
            ['name'=>'12.00-15.00'],
            ['name'=>'15.00-18.00'],
            ['name'=>'18.00-21.00'],
            ['name'=>'21.00-24.00'],
            ['name'=>'24.00-03.00'],
            ['name'=>'03.00.06.00'],
        ]);

        DB::table('gender_names')->insert([
            ['id_gender' => '1', 'name' => 'ชาย'],
            ['id_gender' => '5', 'name' => 'หญิง'],
        ]);
    }
}
