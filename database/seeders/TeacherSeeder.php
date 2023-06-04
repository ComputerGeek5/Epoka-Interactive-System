<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedTeacher(
            11, "Richard Hendrickson", "richardhendrickson@eis.edu", "Professor",
            "Faculty Of Engineering & Architecture"
        );

        $this->seedTeacher(
            12, "Sarah Martin", "sarahmartin@eis.edu", "Assistant Professor",
            "Faculty Of Economy"
        );

        $this->seedTeacher(
            13, "William Perez", "williamperez@eis.edu", "Associate Professor",
            "Faculty Of Foreign Languages"
        );

        $this->seedTeacher(
            14, "Patricia White", "patriciawhite@eis.edu", "Professor",
            "Faculty Of History and Philology"
        );

        $this->seedTeacher(
            15, "Daniel Robinson", "danielrobinson@eis.edu", "Instructor",
            "Faculty Of Law & Social Sciences"
        );

        $this->seedTeacher(
            16, "Nancy Allen", "nancyallen@eis.edu", "Assistant Professor",
            "Faculty Of Engineering & Architecture"
        );

        $this->seedTeacher(
            17, "Steven Adams", "stevenadams@eis.edu", "Instructor",
            "Faculty Of Economy"
        );

        $this->seedTeacher(
            18, "Ashley Baker", "ashleybaker@eis.edu", "Associate Professor",
            "Faculty Of Foreign Languages"
        );
    }

    public function seedTeacher(
        $id, $name, $email, $title,
        $faculty
    ): void
    {
        DB::table('teachers')->insert([
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "title" => $title,
            "faculty" => $faculty,
            "about" => "",
            "image" => "default_profile_picture.jpg",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
