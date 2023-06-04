<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admins
        $this->seedUser(
            "Jack Black", "jackblack@eis.edu",
            "admin@1234", "ADMIN"
        );

        $this->seedUser(
            "Mary Smith", "marysmith@eis.edu",
            "admin@1234", "ADMIN"
        );

        // Students
        $this->seedUser(
            "John Green", "johngreen@eis.edu",
            "student@1234", "Student"
        );

        $this->seedUser(
            "Jennifer Williams", "jenniferwilliams@eis.edu",
            "student@1234", "Student"
        );

        $this->seedUser(
            "Charles Brown", "charlesbrown@eis.edu",
            "student@1234", "Student"
        );

        $this->seedUser(
            "Elizabeth Johnson", "elizabethjohnson@eis.edu",
            "student@1234", "Student"
        );

        $this->seedUser(
            "Douglas Jones", "douglasjones@eis.edu",
            "student@1234", "Student"
        );

        $this->seedUser(
            "Barbara Lee", "barbaralee@eis.edu",
            "student@1234", "Student"
        );

        $this->seedUser(
            "Thomas Moore", "thomasmoore@eis.edu",
            "student@1234", "Student"
        );

        $this->seedUser(
            "Regina Miller", "reginamiller@eis.edu",
            "student@1234", "Student"
        );

        // Teachers
        $this->seedUser(
            "Richard Hendrickson", "richardhendrickson@eis.edu",
            "teacher@1234", "Teacher"
        );

        $this->seedUser(
            "Sarah Martin", "sarahmartin@eis.edu",
            "teacher@1234", "Teacher"
        );

        $this->seedUser(
            "William Perez", "williamperez@eis.edu",
            "teacher@1234", "Teacher"
        );

        $this->seedUser(
            "Patricia White", "patriciawhite@eis.edu",
            "teacher@1234", "Teacher"
        );

        $this->seedUser(
            "Daniel Robinson", "danielrobinson@eis.edu",
            "teacher@1234", "Teacher"
        );

        $this->seedUser(
            "Nancy Allen", "nancyallen@eis.edu",
            "teacher@1234", "Teacher"
        );

        $this->seedUser(
            "Steven Adams", "stevenadams@eis.edu",
            "teacher@1234", "Teacher"
        );

        $this->seedUser(
            "Ashley Baker", "ashleybaker@eis.edu",
            "teacher@1234", "Teacher"
        );
    }

    public function seedUser($name, $email, $password, $role): void
    {
        DB::table('users')->insert([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password),
            "role" => $role,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
