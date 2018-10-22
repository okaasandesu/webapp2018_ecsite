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
        DB::insert("INSERT into items (name,img1,img2,img3,description,price,size) VALUES (?,?,?,?,?,?,?)",[
            "風化石",
            "https://i.imgur.com/GKNrNqT.jpg",
            "",
            "",
            "みずみずしいトマトです。",
            "200",
            "M"
        ]);
        DB::insert("INSERT into items (name,img1,img2,img3,description,price,size) VALUES (?,?,?,?,?,?,?)",[
            "昇龍石",
            "https://i.imgur.com/1vBEytJ.jpg",
            "https://i.imgur.com/vCMPllp.jpg",
            "",
            "小さくてもこのスケール感!この力強さ!!水景を雄大に彩るディティール豊かなアクアアクセサリーです。",
            "150",
            "L"
        ]);
    }
}
