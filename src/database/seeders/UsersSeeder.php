<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{

    protected $path = "/Data/Users.json";

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (file_exists(__DIR__ . $this->path)) {
            $data = json_decode(file_get_contents(__DIR__ . $this->path));
            $newPassword = '12345678';

            foreach ($data as $item) {
                $post = Post::where("name", $item->postName)->first();

                $model = User::updateOrCreate(
                    [
                        'name' => $item->name,
                    ],
                    [
                        'password' => Hash::make($newPassword),
                        'email' => $item->email,
                        'post_id' => $post->id
                    ]
                );

                if ($item->postName == "Водитель") {
                    Driver::updateOrCreate([
                        'user_id' => $model->id,
                    ]);
                }
            }
        }

    }
}
