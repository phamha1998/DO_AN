<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc','address'=>'HN','phone'=>'0399547463','level'=>'1'],
            ['id'=>2,'email'=>'ngoc@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc1','address'=>'HN','phone'=>'0399547463','level'=>'2'],
            ['id'=>3,'email'=>'nguyen@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc2','address'=>'HN','phone'=>'0399547463','level'=>'2'],
            ['id'=>4,'email'=>str::random(4).'@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc3','address'=>'HN','phone'=>'0399547463','level'=>'1'],
            ['id'=>5,'email'=>str::random(4).'@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc3','address'=>'HN','phone'=>'0399547463','level'=>'2'],
            ['id'=>6,'email'=>str::random(4).'@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc3','address'=>'HN','phone'=>'0399547463','level'=>'2'],
            ['id'=>7,'email'=>str::random(4).'@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc3','address'=>'HN','phone'=>'0399547463','level'=>'1'],
            ['id'=>8,'email'=>str::random(4).'@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc3','address'=>'HN','phone'=>'0399547463','level'=>'2'],
            ['id'=>9,'email'=>str::random(4).'@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Như Ngọc3','address'=>'HN','phone'=>'0399547463','level'=>'1']

        ]);
    }
}
