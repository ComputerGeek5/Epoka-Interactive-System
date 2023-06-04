<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedCourse(
            "Object-Oriented Programming", 11, "CEN107", 7,
            "Compulsory",
            "This course introduces advanced programming skills and focuses on the core concepts of object-oriented programming and design using a high-level language, either Python or Java. Object-oriented programming represents the integration of software components into a large-scale software architecture. Software development in this way represents the next logical step after learning coding fundamentals, allowing for the creation of sprawling programs. The course focuses on the understanding and practical mastery of object-oriented concepts such as classes, objects, data abstraction, methods, method overloading, inheritance and polymorphism. Practical applications in the domain of data science and as seen in stacks, queues, lists, and trees will be examined."
        );

        $this->seedCourse(
            "Web Programming", 11, "WEB304", 5,
            "Elective",
            "Introduction to Web Programming (formerly titled XHTML Programming). HTML is the programming language used to develop home pages on the Internet. This course covers the most current tools available for developing HTML documents and posting pages on the World Wide Web. This course covers the basics of HTML5."
        );

        $this->seedCourse(
            "Turkish", 18, "TUR607", 4,
            "Elective",
            "One of the most beautiful languages spoken in the world today is the Turkish language. This language is spoken by over 80 million people in Turkey and by about 1.5 million people in Germany. It is also intelligible with other languages in countries such as Azerbaijan, Turkmenistan, Kazakhstan, Uzbekistan etc. This means if you can speak Turkish, you can conquer eastern Europe, central Asia and some parts of Germany with the language."
        );

        $this->seedCourse(
            "Economy", 12, "ECO501", 6,
            "Compulsory",
            "Economics is the study of how people make decisions and how these decisions apply to real-world problems. Economics can help us understand income inequality within and across countries, the quality of the environment, unemployment, poverty, crime, health care, financial crises, technological change, inflation and many more issues. This course introduces the basic tools that economists use to explore these topics and will cover fundamental economic concepts like scarcity, supply and demand, costs and benefits, trade-offs, and incentives."
        );

        $this->seedCourse(
            "Ancient History", 14, "ANC321", 7,
            "Compulsory",
            "This course provides students with opportunities to develop and apply their understanding of methods and issues involved in the investigation of the ancient past. Through archaeological and written sources, students study of a range of features, people, places, events and developments of the ancient world."
        );

        $this->seedCourse(
            "Geomorphology", 14, "GEO780", 5,
            "Elective",
            "Geomorphology is the study of the surface of the Earth. What makes geomorphology different from the other earth science fields is that it is primarily rooted in the explanation of present landforms, though these surfaces may be ancient, and secondarily in active processes, processes that can be, at least theoretically, observed as they occur. From the perspective developed by studying the present, geomorphologists may seek to interpret the importance of past events on present landforms."
        );

        $this->seedCourse(
            "Data Structures & Algorithms", 18, "DAS444", 7,
            "Compulsory",
            "In this course, we will explore several fundamental algorithms and data structures in computer science, and learn to implement them in C. Some of the data structures we will encounter include linked lists, stacks, queues, trees, heaps, hash tables, and graphs. We will study and analyze algorithms for searching, traversing trees, hashing, manipulating priority queues, sorting, finding shortest paths in graphs, and much more. The basic idea of this course is to help you understand many of the fundamental data structures of computer science. With an appreciation for data structures and algorithms and practical experience in implementing them you can be a much more effective designer, developer, or customer for new applications. Elegant algorithms are also a nice counterpoint to the crufty code and weird features we encounter in daily work."
        );

        $this->seedCourse(
            "Geopolitics", 15, "GPL866", 5,
            "Compulsory",
            "This course of study examines the history of political, tactical and strategic developments and concepts regarding geopolitical concerns regarding political and military planning and execution from the mid-20th Century through the modern era. The comparative analysis of these concepts from the applicable secondary literature will provide a stepping stone to understanding the nature of modern combined arms and joint forces warfare."
        );
    }

    public function seedCourse(
        $name, $teacher_id, $code, $ects,
        $type, $description
    ): void
    {
        DB::table('courses')->insert([
            "name" => $name,
            "teacher_id" => $teacher_id,
            "code" => $code,
            "ects" => $ects,
            "type" => $type,
            "description" => $description,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
