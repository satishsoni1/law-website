<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Faculty;
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
                'eligibility' => 'Any graduate (BA/B.Com/B.Sc) with minimum 45% marks (40% for reserved categories) from a recognized university.',
                'medium'      => 'Marathi & English',
                'affiliation' => 'University of Mumbai',
                'is_active'   => true,
                'order'       => 1,
                'meta_title'  => 'LL.B. 3 Year Course | KTSPM Law College Khopoli',
            ]
        );

        // Sample Faculty
        $facultyList = [
            ['name' => 'Dr. Rajesh Kumar Sharma', 'designation' => 'Principal', 'qualification' => 'LL.M., Ph.D.', 'specialization' => 'Constitutional Law', 'category' => 'permanent', 'experience' => 20],
            ['name' => 'Prof. Sunita Patil', 'designation' => 'Associate Professor', 'qualification' => 'LL.M.', 'specialization' => 'Criminal Law', 'category' => 'permanent', 'experience' => 15],
            ['name' => 'Adv. Vijay Deshmukh', 'designation' => 'Visiting Faculty', 'qualification' => 'LL.B.', 'specialization' => 'Civil Practice', 'category' => 'visiting', 'experience' => 10],
        ];

        foreach ($facultyList as $i => $f) {
            Faculty::firstOrCreate(['name' => $f['name']], array_merge($f, ['order' => $i + 1, 'is_active' => true]));
        }

        // Sample Notices
        foreach ([
            ['title' => 'Admission Notification ' . date('Y') . '-' . (date('Y') + 1), 'is_pinned' => true],
            ['title' => 'Examination Schedule — Semester I', 'is_pinned' => false],
            ['title' => 'Guest Lecture on Cyber Law', 'is_pinned' => false],
        ] as $n) {
            Notice::firstOrCreate(['title' => $n['title']], array_merge($n, ['publish_date' => now(), 'is_active' => true]));
        }
    }
}
