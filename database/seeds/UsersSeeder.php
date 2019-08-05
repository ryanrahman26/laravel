<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User1
        $user1 = new User();
        $user1->name = "user1";
        $user1->email = "user1@gmail.com";
        $user1->password = bcrypt("12345678");
        $user1->save();

        // User3
        $user2 = new User();
        $user2->name = "user2";
        $user2->email = "user2@gmail.com";
        $user2->password = bcrypt("12345678");
        $user2->save();

        // User3
        $user3 = new User();
        $user3->name = "user3";
        $user3->email = "user3@gmail.com";
        $user3->password = bcrypt("12345678");
        $user3->save();

        // User4
        $user4 = new User();
        $user4->name = "user4";
        $user4->email = "user4@gmail.com";
        $user4->password = bcrypt("12345678");
        $user4->save();

        // User5
        $user5 = new User();
        $user5->name = "user5";
        $user5->email = "user5@gmail.com";
        $user5->password = bcrypt("12345678");
        $user5->save();

        // User6
        $user6 = new User();
        $user6->name = "user6";
        $user6->email = "user6@gmail.com";
        $user6->password = bcrypt("12345678");
        $user6->save();

        // User7
        $user7 = new User();
        $user7->name = "user7";
        $user7->email = "user7@gmail.com";
        $user7->password = bcrypt("12345678");
        $user7->save();

        // User8
        $user8 = new User();
        $user8->name = "user8";
        $user8->email = "user8@gmail.com";
        $user8->password = bcrypt("12345678");
        $user8->save();

        // User9
        $user9 = new User();
        $user9->name = "user9";
        $user9->email = "user9@gmail.com";
        $user9->password = bcrypt("12345678");
        $user9->save();

        // User10
        $user10 = new User();
        $user10->name = "user10";
        $user10->email = "user10@gmail.com";
        $user10->password = bcrypt("12345678");
        $user10->save();

    }
}
