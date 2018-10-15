<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT into items (name,img,description,price,size) VALUES (?,?,?,?,?)",[
            "トマト",
            "http://placehold.it/200x200&text=tomato",
            "みずみずしいトマトです。",
            "200",
            "M"
        ]);
        DB::insert("INSERT into items (name,img,description,price,size) VALUES (?,?,?,?,?)",[
            "レタス",
            "http://placehold.it/200x200&text=lettuce",
            "しゃきしゃきしたレタスです。",
            "150",
            "L"
        ]);
    }
}
