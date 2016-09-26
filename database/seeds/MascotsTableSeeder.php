<?php

use Illuminate\Database\Seeder;

class MascotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        DB::table('mascots')->insert([
            'name' => 'Tony the Tiger',
            'image_url' => 'https://s3.amazonaws.com/mascots.stevil.co/tony-the-tiger.jpg',
            'domain' => 'cereal',
            'description' => 'Tony the Tiger is the friendly and loveable feline, who acts as the mascot for Kellogg\'s Frosted Flakes. He first appeared in commercials for Frosted Flakes in 1952 and has been going strong ever since. But Tony the Tiger does much more than just talk about the great taste of Frosted Flakes. He also loves reading, riding around in the Tonymobile, exercising and playing sports.',
            'popularity' => 10,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('mascots')->insert([
            'name' => 'Benny the Bull',
            'image_url' => 'https://s3.amazonaws.com/mascots.stevil.co/benny-the-bull.jpg',
            'domain' => 'basketball',
            'description' => 'Benny has bright red fur with large eyes, a tan snout, horns with red tips, a black and furry uni brow, orange and pink hair, a long red tail and black gloves with red fur on the back. Benny wears an authentic uniform (road red/black and home whites) and team-appointed athletic shoes. His jersey bore the name "Benny" above the number "1" on the back.',
            'popularity' => 6,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('mascots')->insert([
            'name' => 'Willie the Wildcat',
            'image_url' => 'https://s3.amazonaws.com/mascots.stevil.co/willie-the-wildcat.jpg',
            'domain' => 'college.basketball',
            'description' => 'He\'s a wild cat!',
            'popularity' => 5,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('mascots')->insert([
            'name' => 'Dig\'em Frog',
            'image_url' => 'https://s3.amazonaws.com/mascots.stevil.co/dig-em-frog.jpg',
            'domain' => 'cereal',
            'description' => 'He\'s a frog!',
            'popularity' => 7,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
