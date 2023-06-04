<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedStudent(
            3, "John Green","johngreen@eis.edu", "Software Engineering",
            "2027"
        );

        $this->seedStudent(
            4, "Jennifer Williams","jenniferwilliams@eis.edu", "Economics",
            "2025"
        );

        $this->seedStudent(
            5, "Charles Brown","charlesbrown@eis.edu", "Banking & Finance",
            "2029"
        );

        $this->seedStudent(
            6, "Elizabeth Johnson","elizabethjohnson@eis.edu", "Law",
            "2027"
        );

        $this->seedStudent(
            7, "Douglas Jones","douglasjones@eis.edu", "Computer Engineering",
            "2023"
        );

        $this->seedStudent(
            8, "Barbara Lee","barbaralee@eis.edu", "Psychology",
            "2030"
        );

        $this->seedStudent(
            9, "Thomas Moore","thomasmoore@eis.edu", "History",
            "2024"
        );

        $this->seedStudent(
            10, "Regina Miller","reginamiller@eis.edu", "Italian Language",
            "2032"
        );
    }

    public function seedStudent(
        $id, $name, $email, $program,
        $graduation_year
    ): void
    {
        DB::table('students')->insert([
            "id" => $id,
            "name" => $name,
            "courses" => "[]",
            "email" => $email,
            "program" => $program,
            "graduation_year" => $graduation_year,
            "about" => "",
            "image" => "default_profile_picture.jpg",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
