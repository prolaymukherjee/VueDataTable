<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datatables')->insert([
            [
                'name' =>'Rumi',
                'email' => 'rumi@gmail.com',
                'phone' =>'01700000',
                'address'=>'dhaka',
                'total'=>'120.00',
            ],

            [
                'name' =>'shakib',
                'email' => 'shakib@gmail.com',
                'phone' =>'0170000',
                'address'=>'dhaka',
                'total'=>'125.20',
            ],
            [
                'name' =>'rakib',
                'email' => 'rakib@gmail.com',
                'phone' =>'01700000',
                'address'=>'dhaka',
                'total'=>'155.20',
            ],
            [
                'name' =>'sadman',
                'email' => 'sadman@gmail.com',
                'phone' =>'0175100000',
                'address'=>'Khulna',
                'total'=>'145.20',
            ],
            [
                'name' =>'Rahim',
                'email' => 'rahim@gmail.com',
                'phone' =>'017000000',
                'address'=>'barisal',
                'total'=>'752.10',
            ],
            [
                'name' =>'karim',
                'email' => 'karim@gmail.com',
                'phone' =>'0175100000',
                'address'=>'khustia',
                'total'=>'125.00',
            ],
            [
                'name' =>'emon',
                'email' => 'emon@gmail.com',
                'phone' =>'0170000000',
                'address'=>'Dhaka',
                'total'=>'1253.01',
            ],
            [
                'name' =>'Roni',
                'email' => 'roni@gmail.com',
                'phone' =>'0174100000',
                'address'=>'dhaka',
                'total'=>'145.00',
            ],
            [
                'name' =>'Ruman',
                'email' => 'ruman@gmail.com',
                'phone' =>'015240000',
                'address'=>'Khulna',
                'total'=>'145.36',
            ],
            [
                'name' =>'sadia',
                'email' => 'sadia@gmail.com',
                'phone' =>'015230000',
                'address'=>'Khulna',
                'total'=>'145.36',
            ],
            [
                'name' =>'rafiq',
                'email' => 'rafiq@gmail.com',
                'phone' =>'015120000',
                'address'=>'Khulna',
                'total'=>'145.36',
            ],
            [
                'name' =>'Anis',
                'email' => 'anis@gmail.com',
                'phone' =>'015120000',
                'address'=>'Khulna',
                'total'=>'145.36',
            ],
            [
                'name' =>'Arik',
                'email' => 'arik@gmail.com',
                'phone' =>'0151201000',
                'address'=>'Khulna',
                'total'=>'145.36',
            ],
        ]);
    }
}
