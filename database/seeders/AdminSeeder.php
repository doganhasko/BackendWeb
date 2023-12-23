<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default admin user
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
            'avatar' => 'adminehb.jpg',
            'address' => 'Campus Kaai',
            'aboutme' => 'I\'m the admin',
            'birthdate' => Carbon::parse('1990-01-01'), // Update with the actual birthdate
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'dogan',
            'email' => 'doganhasko@gmail.com',
            'password' => Hash::make('123456789'),
            'is_admin' => false,
            'avatar' => 'dogan.jpg',
            'address' => 'Campus Kaai',
            'aboutme' => 'Im a random user',
            'birthdate' => Carbon::parse('1995-01-01'), // Update with the actual birthdate
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'kevin',
            'email' => 'kevin@gmail.com',
            'password' => Hash::make('123456789'),
            'is_admin' => false,
            'avatar' => '1696977640.png',
            'address' => 'Campus Kaai',
            'aboutme' => 'Im a random user2',
            'birthdate' => Carbon::parse('1995-01-01'), // Update with the actual birthdate
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'jolien',
            'email' => 'jolien@gmail.com',
            'password' => Hash::make('123456789'),
            'is_admin' => false,
            'avatar' => '1696977640.jpg',
            'address' => 'Campus Kaai',
            'aboutme' => 'Im a random user3',
            'birthdate' => Carbon::parse('1995-01-01'), // Update with the actual birthdate
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //posts
        DB::table('posts')->insert([
            'title' => 'Sample Post 1',
            'message' => 'This is the content of the first post.',
            'user_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
            'postphoto' => 'images/Hb0pwEYEEncdEODVLiPP0fZO0leevA0xP5Y0TcNF.jpg',
        ]);

        DB::table('posts')->insert([
            'title' => 'Sample Post 2',
            'message' => 'This is the content of the second post.',
            'user_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
            'postphoto' => 'images/n7RiuSAOrBQ5mUIn6s7HbsYlO3xOO1PYuFbc5LGS.webp',
        ]);
        DB::table('posts')->insert([
            'title' => 'Sample Post 3',
            'message' => 'This is the content of the third post.',
            'user_id' => 3, 
            'created_at' => now(),
            'updated_at' => now(),
            'postphoto' => 'images/n7RiuSAOrBQ5mUIn6s7HbsYlO3xOO1PYuFbc5LGS.webp',
        ]);



        // Create Admin User
        $user = DB::table('admin_users')->insert([
            'username' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'name' => 'Admin',
            'avatar' => '',
            'remember_token' => 'str_random(60)',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Get Admin Role
         DB::table('admin_roles')->insert([
            'name' => 'Administrator',
            'slug' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $adminRole = DB::table('admin_roles')->where('name', 'Administrator')->first();
        // Get All Permissions
        $allPermissions = DB::table('admin_permissions')->get();
        
        // Assign Permissions to Role
        foreach ($allPermissions as $permission) {
            DB::table('admin_role_permissions')->insert([
                'permission_id' => $permission->id,
                'role_id' => $adminRole->id
            ]);
        }

        // Assign Role to User
        DB::table('admin_role_users')->insert([
            'user_id' => $user,
            'role_id' => $adminRole->id
        ]);

        $numberOfRecords = 5;

        for ($i = 1; $i <= $numberOfRecords; $i++) {
            DB::table('faq')->insert([
                'question' => "Question $i",
                'answer' => "Answer to Question $i",
                'category' => "Category $i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
