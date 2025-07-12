<?php

// File: database/seeders/GeneralInformationSeeder.php
// Description: Seeds CIS-based content for General Academic Information

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralInformation;

class GeneralInformationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'mission' => 'A university committed to producing leaders by providing a 21st century learning environment through innovations in education, multidisciplinary research, and community and industry partnerships.',
            'vision' => 'A premier national university that develops leaders in the global knowledge economy.',
            'policy' => 'Prompt and regular attendance is required. Total unexcused absences must not exceed 10% of total hours per course per semester. Proper decorum is also expected in all class activities.',
            'exams' => 'Students who miss exams may take special exams for valid reasons, such as medical conditions (with certificate). Other reasons are subject to faculty approval.',
            'dishonesty' => 'Academic dishonesty, including cheating and plagiarism, is a major offense and will be dealt with based on the University’s Student Norms of Conduct.',
            'dropping' => 'Students must officially drop by submitting a form to the Registrar before midterms. Official drops are marked "Dropped"; unofficial drops receive a grade of "5.0".',
            'disability' => 'Students with disabilities are encouraged to disclose their condition so that appropriate academic adjustments can be made. An inclusive, respectful environment is expected.',
            'advising' => 'Consultation hours are provided for academic advising and guidance. Students are encouraged to approach their instructors during official hours for support or clarification.',
        ];

        foreach ($data as $section => $content) {
            GeneralInformation::updateOrCreate(
                ['section' => $section],
                ['content' => $content]
            );
        }
    }
}


