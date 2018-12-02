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
            "前景や背景に水草を植え込んだり、流木を一緒に配置したりすることで奥行きを感じさせる景観を作り出すことができます。",
            "2000",
            "M"
        ]);
        DB::insert("INSERT into items (name,img1,img2,img3,description,price,size) VALUES (?,?,?,?,?,?,?)",[
            "昇龍石",
            "https://i.imgur.com/1vBEytJ.jpg",
            "https://i.imgur.com/vCMPllp.jpg",
            "",
            "小さくてもこのスケール感!この力強さ!!水景を雄大に彩るディティール豊かなアクアアクセサリーです。",
            "3000",
            "M"
        ]);
        DB::insert("INSERT into items (name,img1,img2,img3,description,price,size) VALUES (?,?,?,?,?,?,?)",[
            "融白石",
            "https://i.imgur.com/zXXltBk.jpg",
            "https://i.imgur.com/doqfSlR.jpg",
            "",
            "墨色の石に淡い灰色の石が融合したような風合いをもつレイアウト用の石です。",
            "2000",
            "L"
        ]);
        DB::insert("INSERT into items (name,img1,img2,img3,description,price,size) VALUES (?,?,?,?,?,?,?)",[
            "木化石",
            "https://i.imgur.com/wvEmGPw.jpg",
            "https://i.imgur.com/vBC1Zzv.png",
            "",
            "しっかり硬質化した頑丈な石ですが、木の繊維質はそのまま、情感のある風合いが特徴的です。",
            "1000",
            "S"
        ]);
        DB::insert("INSERT into items (name,img1,img2,img3,description,price,size) VALUES (?,?,?,?,?,?,?)",[
            "輝板石",
            "https://i.imgur.com/stGg7H8.jpg",
            "https://i.imgur.com/6Vd9pcY.jpg",
            "",
            "積み重ねて使用することで迫力のあるレイアウトを実現できます。",
            "1000",
            "S"
        ]);
    }
}




