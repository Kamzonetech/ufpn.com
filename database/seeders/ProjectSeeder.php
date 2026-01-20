<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Upgrade of Enterprise Budget Software to be Synchronized with IPSAS GP (FS-8 National Communication Commission',
            'slug' => Str::slug('Upgrade of Enterprise Budget Software to be Synchronized with IPSAS GP (FS-8 National Communication Commission'),
            'client' => 'NCC',
            'date' => Carbon::now()->month(10)->year(2023),
            'description' => "
                <ul type='square'>
                    <li>Leads the strategic planning and project management for the upgrade project, ensuri
                    aligns with the broader goals of the National Communication Commission.
                    </li>
                    <li>Oversees contract management, stakeholder engagement, and acts as the main liaison the commission's representatives.</li>
                    <li>Monitors compliance and ensures the consultancy meets the contractual obligation financial standards set by IPSAS GP (FS-8).</li>
                    <li>Plays vital role in the overall project delivery, including achieving key milestone! managing the project budget and schedules</li>
               </ul>
            ",
            'photo' => 'project1.jpg'
        ]);

        Project::create([
            'title' => 'Provision of Short-Term Enrolment Services (Data Capturing) for the National Identity Management Commission',
            'slug' => Str::slug('Provision of Short-Term Enrolment Services (Data Capturing) for the National Identity Management Commission'),
            'client' => 'NIMC',
            'date' => Carbon::now()->month(05)->year(2023),
            'description' => " 
                <ul type='square'>
                    <li>Develops and executes the project's overarching strategy, guaranteeing it is in line wit National Identity Management Commission's specifications</li>
                    <li>Advatages resource allocation. project financing, and ensures a high level of service delivery within the stipulated timeframe.</li>
                    <li>Cultivates and maintains relationships with the National identity Management Commission stakeholders, ensuring clear communication and satisfaction.</li>
               </ul>
            ",
            'photo' => 'project1.jpg'

        ]);

        Project::create([
            'title' => 'Selection of Agent Managers for Nigeria Inter-Bank Settlement System Plc (Oata Capturing)',
            'slug' => Str::slug('Selection of Agent Managers for Nigeria Inter-Bank Settlement System Plc (Oata Capturing)'),
            'client' => 'NIBSS',
            'date' => Carbon::now()->month(05)->year(2023),
            'description' => " 
                <ul type='square'>
                    <li>Provides leadership for the project's strategic direction. ensuring alignment with NIBSS’s mission and objectives</li>
                    <li>Manages the proposal process, strategy, and contract negotiations with the NIBSS</li>
                    <li>Oversees the overall delivery of the project. ensuring that milestones are met</li>
               </ul>
            ",
            'photo' => 'project1.jpg'
        ]);
    }
}
