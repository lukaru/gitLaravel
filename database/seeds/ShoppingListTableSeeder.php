<?php

use Illuminate\Database\Seeder;

class ShoppingListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list1 = new \App\ShoppingList;
        $list1->helped_id = 3;
        $list1->helper_id = 1;
        $list1->due_date = "2020-06-18 19:00";
        $list1->comment_helped = "";
        $list1->comment_helper = "";


        $helped = \App\User::all()->first();
        $list1->helped()->associate($helped);
        $list1->save();

        $helper = \App\User::all()->first();
        $list1->helper()->associate($helper);
        $list1->save();



        $list2 = new \App\ShoppingList;
        $list2->helped_id = 4;
        $list2->helper_id = 2;
        $list2->due_date = "2020-06-22 16:00";
        $list2->comment_helped = "";
        $list2->comment_helper = "";


        $helped = \App\User::all()->first();
        $list2->helped()->associate($helped);
        $list2->save();

        $helper = \App\User::all()->first();
        $list2->helper()->associate($helper);
        $list2->save();

        $list3 = new \App\ShoppingList;
        $list3->helped_id = 3;
        $list3->due_date = "2020-05-19 8:00";
        $list3->comment_helped = "";
        $list3->comment_helper = "";


        $helped = \App\User::all()->first();
        $list3->helped()->associate($helped);
        $list3->save();



        $image1 = new \App\Reciept;
        $image1->title = "Reciept for List 1";
        $image1->url = "https://www.uscannenbergmedia.com/resizer/taswORwKGsNgkkVadOGwZnf7gpY=/1200x0/filters:quality(100)/arc-anglerfish-arc2-prod-uscannenberg.s3.amazonaws.com/public/IL7HNRX6FVALLILJ2YYASTC57M.png";
        $image1->shoppingList()->associate($list1);
        $image1->save();

        $item1 = new \App\ListItem();
        $item1->item_name = "Mango";
        $item1->quantity = 4;
        $item1->max_price = 10.20;
        $item1->shoppingList()->associate($list1);
        $item1->save();

        $image2 = new \App\Reciept;
        $image2->title = "Reciept for List 2";
        $image2->url = "https://upload.wikimedia.org/wikipedia/commons/0/0b/ReceiptSwiss.jpg";
        $image2->shoppingList()->associate($list2);
        $image2->save();

        $item2 = new \App\ListItem();
        $item2->item_name = "Eier";
        $item2->quantity = 8;
        $item2->max_price = 3.50;
        $item2->shoppingList()->associate($list2);
        $item2->save();

        $item3 = new \App\ListItem();
        $item3->item_name = "Pizza";
        $item3->quantity = 2;
        $item3->max_price = 12.50;
        $item3->shoppingList()->associate($list3);
        $item3->save();
    }
}
