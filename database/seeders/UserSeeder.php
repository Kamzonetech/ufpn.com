<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'surname' => 'Isiaq',
            'othernames' => 'Kamaldeen',
            'email' => 'kamal@test.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Admin',
            'status' => "Active",
        ]);

        $user1 = User::create([
            'surname' => 'MUSTAPHA',
            'othernames' => 'HUSSAIN .O. (MBA, ACA, ACTI)',
            'email' => 'test1@gmail.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Admin',
            'status' => "Active",
        ]);
            Team::create([
                'surname' => $user1->surname,
                'othernames' => $user1->othernames,
                'email' => $user1->email,
                'phone' => '',
                'role' => 'Managing Director',
                'bio' => <<<EOT
                <p>He is the Principal partner and lead consultant of Khahus Consulting Solutions Ltd. He is a fellow of the Institute o1 Chartered Accountants of Nigeria (ICAN) and Chartered Institute of Taxation of Nigeria (CITN) as well as a Masters Degree holder in Business Administration.
                </p>
                <p>He has over Ten (10) years' experience and has special interest in Banking and Financial Advisory Consultancy.</p>
                EOT,
                'member_status' => 'current',
                'photo' => 'user.png',
                'linkedin' => '',
                'twitter' => '',
                'instagram' => '',
                'facebook' => '',
                'user_id' => $user1->id,
            ]);

        $user2 = User::create([
            'surname' => 'AM1NU',
            'othernames' => 'NASIRU DANEII. MBA, M.Sc., CPN, CMD)',
            'email' => 'test2@gmail.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Staff',
            'status' => "Active",
        ]);
            Team::create([
                'surname' => $user2->surname,
                'othernames' => $user2->othernames,
                'email' => $user2->email,
                'phone' => '',
                'role' => 'Project Coordinator',
                'bio' => <<<EOT
                <p>Aminu has wealth of experience in the field or Information Technology. He specializes in IP communications and basic technology, lT security, Software Engineering and Payment som tions. His experience includes Information Security Management, IT Risk Management, Network Configuration and Management, Vulnerability assessments and Penetration testing, Configuration Reviews,</p>
                <p>Performance Monitoring and Assessment, Software Engineering and Payment Systems integration</p>
                <p>He has a background in Information Systems Management, and he is a member of various professional bodies inclu ding. Some of his professional certifications include Certified Centre for Management Development (CMD), Certified Information Systems Auditor (CISA), Cisco
 
                    Certified Network Professional (CC NP), Cisco Certified Network Associate (CC NA), ITll Foundation, and Introduction to Clos d Computing.
                </p>
                EOT,
                'member_status' => 'current',
                'photo' => 'user.png',
                'linkedin' => '',
                'twitter' => '',
                'instagram' => '',
                'facebook' => '',
                'user_id' => $user2->id,
            ]);

        $user3 = User::create([
            'surname' => 'ELETTA',
            'othernames' => 'A OLUWABUNMI ENIOLA  (B.Sc. CPN)',
            'email' => 'test3@gmail.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Staff',
            'status' => "Active",
        ]);
        Team::create([
            'surname' => $user3->surname,
            'othernames' => $user3->othernames,
            'email' => $user3->email,
            'phone' => '',
            'role' => 'ICT/Computer Specialist',
            'bio' => <<< EOT
            <p>Olubunmi has over five years industry experience in the field o1 Information Technology and Payment Systems Integration, and he currently heads the team of software development for the organization.</p>
            <p>she has 20 years experience as a Strong Professional experience with general Information Technology sole tions She has a vast background in computer network solutions design and implementation. She is an experienced project manager with track records in solutions integrations for financial institutions, schools, and Human resources and payroll implementations for state governments.</p>
            <p>She is a member of several professional bodies Computer Professional of Nigeria (CPN)</p>
            EOT,
            'member_status' => 'current',
            'photo' => 'user.png',
            'linkedin' => '',
            'twitter' => '',
            'instagram' => '',
            'facebook' => '',
            'user_id' => $user3->id,
        ]);

        $user4 = User::create([
            'surname' => 'AMEEN',
            'othernames' => 'AJADI RAFIU (ACA)',
            'email' => 'test4@gamil.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Staff',
            'status' => "Active",
        ]);
        Team::create([
            'surname' => $user4->surname,
            'othernames' => $user4->othernames,
            'email' => $user4->email,
            'phone' => '',
            'role' => 'Consultant Business Analyst',
            'bio' => <<< EOT
            <p>He is an associate member o1 Institute of The Chartered Accountants of Nigeria (ACA). He had his Articleship with Ubada Abah & Co. Chartered Accountants and Mu’Allahyidi & Co. Chartered Accountants, both in Kaduna, in the capacities of Senior Audit/Consultancy Staff and Engagement Partner. During the period he participated in and led several Audits, Tax and other Consultancy Services, both in Private and Public Sectors. Thereafter he joined the employment of Intercontinental Bank Plc as senior manager. He has vast experience in the area of foreign operations, internal control and Bank branch audit.</p>
            <p>He is currently a Technical Partner of Khahus Consulting Solutions Ltd with over Ten (10) years of experience.</p>

            EOT,
            'member_status' => 'current',
            'photo' => 'user.png',
            'linkedin' => '',
            'twitter' => '',
            'instagram' => '',
            'facebook' => '',
            'user_id' => $user4->id,
        ]);

        $user5 = User::create([
            'surname' => 'Khadijah',
            'othernames' => 'Abdulhamid M.Sc., BSc.',
            'email' => 'khadijah@test.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Staff',
            'status' => "Active",
        ]);
        Team::create([
            'surname' => $user5->surname,
            'othernames' => $user5->othernames,
            'email' => $user5->email,
            'phone' => '',
            'role' => 'Finance & Admin',
            'bio' => <<< EOT
            EOT,
            'member_status' => 'current',
            'photo' => 'user.png',
            'linkedin' => '',
            'twitter' => '',
            'instagram' => '',
            'facebook' => '',
            'user_id' => $user5->id,
        ]);

        $user6 = User::create([
            'surname' => 'Abdulrasaq ',
            'othernames' => 'Mustapha M.Sc., B.Sc, ACA',
            'email' => 'Abdulrasaq@test.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Staff',
            'status' => "Active",
        ]);
        Team::create([
            'surname' => $user6->surname,
            'othernames' => $user6->othernames,
            'email' => $user6->email,
            'phone' => '',
            'role' => 'Technical Partner/Assistant Project Manager',
            'bio' => <<< EOT
            EOT,
            'member_status' => 'current',
            'photo' => 'user.png',
            'linkedin' => '',
            'twitter' => '',
            'instagram' => '',
            'facebook' => '',
            'user_id' => $user6->id,
        ]);

        $user7 = User::create([
            'surname' => 'Mohammed',
            'othernames' => 'Ahmed Taiye PhD., M.Sc., B.Sc.',
            'email' => 'Mohammed@test.com',
            'password' => Hash::make('Staff123'),
            'user_type' => 'Staff',
            'status' => "Active",
        ]);
        Team::create([
            'surname' => $user7->surname,
            'othernames' => $user7->othernames,
            'email' => $user7->email,
            'phone' => '',
            'role' => 'Project Manager',
            'bio' => <<< EOT
            EOT,
            'member_status' => 'current',
            'photo' => 'user.png',
            'linkedin' => '',
            'twitter' => '',
            'instagram' => '',
            'facebook' => '',
            'user_id' => $user7->id,
        ]);
    }
}
