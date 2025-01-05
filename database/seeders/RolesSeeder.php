<?php

namespace Database\Seeders;

use App\Models\WebUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating roles with the correct guard name
        $provinceRole = Role::firstOrCreate(
            ['name' => 'province', 'guard_name' => 'web'] // Specify 'web' guard
        );
        $districtRole = Role::firstOrCreate(
            ['name' => 'district', 'guard_name' => 'web'] // Specify 'web' guard
        );
        $interviewerRole = Role::firstOrCreate(
            ['name' => 'interviewer', 'guard_name' => 'web'] // Specify 'web' guard
        );
        $invigilatorRole = Role::firstOrCreate(
            ['name' => 'invigilator', 'guard_name' => 'web'] // Specify 'web' guard
        );
        $operationsRole = Role::firstOrCreate(
            ['name' => 'operations', 'guard_name' => 'web'] // Specify 'web' guard
        );

        // List of 36 districts in Punjab, Pakistan
//        $punjabDistricts = [
//            'Attock', 'Bahawalnagar', 'Bahawalpur', 'Bhakkar', 'Chakwal', 'Chiniot',
//            'Dera Ghazi Khan', 'Faisalabad', 'Gujranwala', 'Gujrat', 'Hafizabad',
//            'Jhang', 'Jhelum', 'Kasur', 'Khanewal', 'Khushab', 'Lahore', 'Layyah',
//            'Lodhran', 'Mandi Bahauddin', 'Mianwali', 'Multan', 'Muzaffargarh',
//            'Narowal', 'Nankana Sahib', 'Okara', 'Pakpattan', 'Rahim Yar Khan',
//            'Rajanpur', 'Rawalpindi', 'Sahiwal', 'Sargodha', 'Sheikhupura',
//            'Sialkot', 'Toba Tek Singh', 'Vehari'
//        ];

        // Province users (PMIU, Test, Sectary, Minister, Developer)
//        $provinceUsers = [
//            ['name' => 'PMIU User', 'email' => 'pmiu@example.com', 'password' => Hash::make('pmiu')],
//            ['name' => 'Test User', 'email' => 'test@example.com', 'password' => Hash::make('test')],
//            ['name' => 'Sectary User', 'email' => 'sectary@example.com', 'password' => Hash::make('sectary')],
//            ['name' => 'Minister User', 'email' => 'minister@example.com', 'password' => Hash::make('minister')],
//            ['name' => 'Developer User', 'email' => 'developer@example.com', 'password' => Hash::make('developer')],
//        ];
//
//        // Create province users and assign 'province' role
//        foreach ($provinceUsers as $user) {
//            $userInstance = WebUser::create($user);
//            $userInstance->assignRole('province'); // 'province' role for 'web' guard
//        }

        // Create district users and assign 'district' role
//        foreach ($punjabDistricts as $district) {
//            $district_set = strtolower(str_replace(' ', '_', $district));
//            $email = $district_set . '@punjab.gov.pk'; // Create unique email
//            $password = Hash::make($district_set); // Set the same password for all district users
//
//            $user = WebUser::create([
//                'name' => "District User $district",
//                'email' => $email,
//                'password' => $password,
//                'district' => $district
//            ]);
//
//            $user->assignRole('district'); // 'district' role for 'web' guard
//        }

        $interviewerUsers = [
            ['name' => 'Operations User1','district' => '', 'tehsil' => '', 'role' => 'operations', 'cnic' => '0000000000111', 'email' => '0000000000111', 'password' =>'12345'],
            ['name' => 'Operations User2','district' => '', 'tehsil' => '', 'role' => 'operations', 'cnic' => '0000000000112', 'email' => '0000000000112', 'password' => '12345'],
            ['name' => 'Operations User1','district' => '', 'tehsil' => '', 'role' => 'operations', 'cnic' => '0000000000113', 'email' => '0000000000113', 'password' => '12345'],
            ['name' => 'Operations User2','district' => '', 'tehsil' => '', 'role' => 'operations', 'cnic' => '0000000000114', 'email' => '0000000000114', 'password' => '12345'],
        ];

        // Create interviewer users and assign 'province' role
        foreach ($interviewerUsers as $user) {
            $userInstance = WebUser::create($user);
            $userInstance->assignRole('operations'); // 'province' role for 'web' guard
        }
    }
}
