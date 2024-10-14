<?php

namespace Database\Seeders;

use App\Models\NewFriend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewFriend::create([
            'name' => 'Ronniel Timbal',
            'introduction_content' => 'Hi, I am Ronniel! I’m excited to be here and connect with everyone in our community. I believe that every moment spent together in faith strengthens our bond. I enjoy sharing my thoughts on spirituality and helping others grow in their journey. Let’s support one another as we walk in faith and make meaningful memories together!',
            'grade_level' => 'Highschool - 1st Year College',
            'friend_avatar' => 'friend_avatars/ronniel.jpg'
        ]);

        NewFriend::create([
            'name' => 'Ronald Timbal',
            'introduction_content' => 'Hi, I am Ronald! It’s a joy to be part of this wonderful church family. I love getting to know new faces and building friendships centered around our faith. Together, we can explore the teachings that inspire us and encourage each other in our spiritual journeys. I’m looking forward to making great memories with all of you!',
            'grade_level' => 'Highschool - 1st Year College',
            'friend_avatar' => 'friend_avatars/ronald.jpg'
        ]);

        NewFriend::create([
            'name' => 'Joshua Echano',
            'introduction_content' => 'Hi, I am Joshua! I’m thrilled to be here with all of you. My heart is full of excitement for the fellowship we can create as we grow together in faith. I believe that sharing our stories and experiences can uplift us and bring us closer to God. I can’t wait to get to know everyone and share in this journey of faith together!',
            'grade_level' => '2nd Year College - 3rd Year College',
            'friend_avatar' => 'friend_avatars/joshua.jpg'
        ]);
    }
}
