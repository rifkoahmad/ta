<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTempatPKLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_tempat_pkl')->insert([
            ['nama_role' => 'FrontEnd Developer'],
            ['nama_role' => 'BackEnd Developer'],
            ['nama_role' => 'FullStack Developer'],
            ['nama_role' => 'Mobile Developer'],
            ['nama_role' => 'Android Developer'],
            ['nama_role' => 'iOS Developer'],
            ['nama_role' => 'Web Developer'],
            ['nama_role' => 'Game Developer'],
            ['nama_role' => 'Software Engineer'],
            ['nama_role' => 'Embedded Systems Engineer'],
            ['nama_role' => 'API Developer'],
            ['nama_role' => 'Data Scientist'],
            ['nama_role' => 'Data Analyst'],
            ['nama_role' => 'Data Engineer'],
            ['nama_role' => 'Business Intelligence Analyst'],
            ['nama_role' => 'Machine Learning Engineer'],
            ['nama_role' => 'AI Researcher'],
            ['nama_role' => 'Big Data Engineer'],
            ['nama_role' => 'DevOps Engineer'],
            ['nama_role' => 'Site Reliability Engineer (SRE)'],
            ['nama_role' => 'System Administrator'],
            ['nama_role' => 'Cloud Engineer'],
            ['nama_role' => 'Network Engineer'],
            ['nama_role' => 'Cybersecurity Specialist'],
            ['nama_role' => 'Database Administrator (DBA)'],
            ['nama_role' => 'IT Support Specialist'],
            ['nama_role' => 'UX Designer'],
            ['nama_role' => 'UI Designer'],
            ['nama_role' => 'Product Designer'],
            ['nama_role' => 'Graphic Designer'],
            ['nama_role' => 'Motion Graphics Designer'],
            ['nama_role' => 'Game Designer'],
            ['nama_role' => 'IT Project Manager'],
            ['nama_role' => 'Scrum Master'],
            ['nama_role' => 'Product Manager'],
            ['nama_role' => 'Technical Program Manager'],
            ['nama_role' => 'IT Manager'],
            ['nama_role' => 'Chief Technology Officer (CTO)'],
            ['nama_role' => 'Quality Assurance Engineer'],
            ['nama_role' => 'Automation Test Engineer'],
            ['nama_role' => 'Performance Tester'],
            ['nama_role' => 'Penetration Tester'],
            ['nama_role' => 'Blockchain Developer'],
            ['nama_role' => 'Quantum Computing Scientist'],
            ['nama_role' => 'AR/VR Developer'],
            ['nama_role' => 'IoT Engineer'],
            ['nama_role' => 'Robotics Engineer'],
            ['nama_role' => 'Technical Writer'],
            ['nama_role' => 'Ethical Hacker'],
            ['nama_role' => 'Sales Engineer'],
            ['nama_role' => 'IT Trainer'],
            ['nama_role' => 'Research Scientist']
        ]);
    }
}
