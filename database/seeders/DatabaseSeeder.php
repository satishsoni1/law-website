<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Download;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin User
        User::firstOrCreate(
            ['email' => 'admin@ktspmlawcollege.edu.in'],
            [
                'name'      => 'Super Admin',
                'password'  => Hash::make('Admin@123'),
                'user_type' => 'super_admin',
                'is_active' => true,
            ]
        );

        // Default Settings
        $defaults = [
            'college_name'    => "K.T.S.P.M's Law College, Khopoli",
            'college_tagline' => 'Affiliated to University of Mumbai | Approved by Bar Council of India',
            'address'         => 'Khopoli, Raigad, Maharashtra - 410203',
            'phone'           => '+91 02192 282828',
            'email'           => 'info@ktspmlawcollege.edu.in',
            'whatsapp_number' => '9876543210',
            'about_short'     => 'Affiliated to University of Mumbai, offering LL.B. (3 Years) program. Approved by Bar Council of India.',
            'footer_text'     => '&copy; ' . date('Y') . " K.T.S.P.M's Law College, Khopoli. All rights reserved.",
            'admission_open'  => '1',
        ];

        foreach ($defaults as $key => $value) {
            Setting::set($key, $value);
        }

        // Sample Course
        Course::firstOrCreate(
            ['slug' => 'llb-3-year'],
            [
                'name'        => 'Bachelor of Laws (LL.B.)',
                'short_name'  => 'LL.B. (3 Years)',
                'slug'        => 'llb-3-year',
                'description' => 'The Bachelor of Laws (LL.B.) is a three-year degree program affiliated to the University of Mumbai and approved by the Bar Council of India. The course provides a comprehensive foundation in legal principles, constitutional law, criminal law, civil law, and practical legal skills required to practice as an advocate.',
                'duration'    => '3 Years (6 Semesters)',
                'intake'      => 120,
                'fees'        => '₹15,000 per year',
                'eligibility' => 'Any graduate with minimum 45% marks (Open), 42% (OBC/NT), 40% (SC) from a recognized university. Admission through CET conducted by State Common Entrance Test Cell, Maharashtra.',
                'medium'      => 'Marathi & English',
                'affiliation' => 'University of Mumbai',
                'is_active'   => true,
                'order'       => 1,
                'meta_title'  => 'LL.B. 3 Year Course | KTSPM Law College Khopoli',
            ]
        );

        // Faculty — actual college faculty
        $facultyList = [
            [
                'name'           => 'Adv. Varsha Ghare',
                'designation'    => 'I/C Principal',
                'qualification'  => 'B.com, CIA, LLM',
                'specialization' => 'Law',
                'category'       => 'permanent',
                'experience'     => null,
                'order'          => 1,
            ],
            [
                'name'           => 'Meghana Polekar',
                'designation'    => 'Assistant Professor',
                'qualification'  => 'LL.M.',
                'specialization' => 'Law',
                'category'       => 'permanent',
                'experience'     => null,
                'order'          => 2,
            ],
        ];

        foreach ($facultyList as $f) {
            Faculty::firstOrCreate(
                ['name' => $f['name']],
                array_merge($f, ['is_active' => true])
            );
        }

        // Sample Notices
        foreach ([
            ['title' => 'Admission Notification ' . date('Y') . '-' . (date('Y') + 1), 'is_pinned' => true],
            ['title' => 'Examination Schedule — Semester I', 'is_pinned' => false],
            ['title' => 'Guest Lecture on Cyber Law', 'is_pinned' => false],
        ] as $n) {
            Notice::firstOrCreate(['title' => $n['title']], array_merge($n, ['publish_date' => now(), 'is_active' => true]));
        }

        // Syllabus download
        Download::firstOrCreate(
            ['title' => 'Syllabus of 3 Years Law Course (LL.B.)'],
            [
                'description'    => 'Complete syllabus of the Three-Year LL.B. programme affiliated to University of Mumbai.',
                'file'           => 'syllabus of 3 years law course.docx',
                'file_type'      => 'docx',
                'category'       => 'syllabus',
                'is_active'      => true,
                'download_count' => 0,
                'order'          => 1,
            ]
        );

        // Gallery — college events
        $events = [
            [
                'title'       => 'RTI Seminar',
                'slug'        => 'rti-seminar',
                'description' => 'Seminar on Right to Information (RTI) organised by K.T.S.P.M\'s Law College. Legal awareness was created among students and community members about RTI provisions.',
                'order'       => 1,
            ],
            [
                'title'       => 'Essay Writing Competition',
                'slug'        => 'essay-writing-competition',
                'description' => 'Essay Writing Competition organised by K.T.S.P.M\'s Law College to encourage students to express their views on legal and social issues.',
                'order'       => 2,
            ],
            [
                'title'       => 'Inauguration Function – 14 October 2024',
                'slug'        => 'inauguration-function-2024',
                'description' => 'Inauguration function held on 14th October 2024 at K.T.S.P.M\'s Law College, Khopoli.',
                'order'       => 3,
            ],
        ];

        foreach ($events as $event) {
            Gallery::firstOrCreate(
                ['slug' => $event['slug']],
                array_merge($event, ['type' => 'photo', 'is_active' => true])
            );
        }
    }
}
