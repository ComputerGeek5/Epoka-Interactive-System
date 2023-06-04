<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedAdmin(
            1, "Jack Black", "jackblack@eis.edu"
        );

        $this->seedAdmin(
            2, "Mary Smith", "marysmith@eis.edu"
        );
    }

    public function seedAdmin($id, $name, $email): void
    {
        DB::table('admins')->insert([
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "image" => "default_profile_picture.jpg",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
