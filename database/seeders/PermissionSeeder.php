<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'Role', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'User', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Laravel', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'UI/UX', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Django', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Flask', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Frontend', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'MERN', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Flutter', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Data Engg', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Cyber Security', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'C# .NET', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Data Science', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'NLP', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'AWS', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Machine Learning/Deep Learning', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'DevOps', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Product Management', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Game Dev', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'SEO', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'React/Next', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Android(Kotlin)', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Project Management', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Azure', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'iOS Dev', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Blockchain', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Personal & Profession Dev', 'guard_name' => 'web', 'created_at' => now()],
        ]);


        // Create owner role
        $superAdminRole = Role::create([
            'name' => 'SuperAdmin',
            'guard_name' => 'web',
        ]);

        // Create admin role
        $managerRole = Role::create([
            'name' => 'Manager',
            'guard_name' => 'web',
        ]);

        $laravel = Role::create([
            'name' => 'Laravel',
            'guard_name' => 'web',
        ]);
        $laravel->givePermissionTo('Laravel');

        $uiux = Role::create([
            'name' => 'UI/UX',
            'guard_name' => 'web',
        ]);
        $uiux->givePermissionTo('UI/UX');
        

        $django = Role::create([
            'name' => 'Django',
            'guard_name' => 'web',
        ]);
        $django->givePermissionTo('Django');

        $flask = Role::create([
            'name' => 'Flask',
            'guard_name' => 'web',
        ]);
        $flask->givePermissionTo('Flask');

        $frontend = Role::create([
            'name' => 'Frontend',
            'guard_name' => 'web',
        ]);
        $frontend->givePermissionTo('Frontend');

        $mern = Role::create([
            'name' => 'MERN',
            'guard_name' => 'web',
        ]);
        $mern->givePermissionTo('MERN');

        $flutter = Role::create([
            'name' => 'Flutter',
            'guard_name' => 'web',
        ]);

        $flutter->givePermissionTo('Flutter');

        $dataEngg = Role::create([
            'name' => 'Data Engg',
            'guard_name' => 'web',
        ]);
        $dataEngg->givePermissionTo('Data Engg');

        $cyberSecurity = Role::create([
            'name' => 'Cyber Security',
            'guard_name' => 'web',
        ]);

        $cyberSecurity->givePermissionTo('Cyber Security');

        $csharp = Role::create([
            'name' => 'C# .NET',
            'guard_name' => 'web',
        ]);

        $csharp->givePermissionTo('C# .NET');

        $dataScience = Role::create([
            'name' => 'Data Science',
            'guard_name' => 'web',
        ]);

        $dataScience->givePermissionTo('Data Science');



        $nlp = Role::create([
            'name' => 'NLP',
            'guard_name' => 'web',
        ]);

        $nlp->givePermissionTo('NLP');

        $aws = Role::create([
            'name' => 'AWS',
            'guard_name' => 'web',
        ]);

        $aws->givePermissionTo('AWS');

        $ml = Role::create([
            'name' => 'Machine Learning/Deep Learning',
            'guard_name' => 'web',
        ]);

        $ml->givePermissionTo('Machine Learning/Deep Learning');

        $devOps = Role::create([
            'name' => 'DevOps',
            'guard_name' => 'web',
        ]);

        $devOps->givePermissionTo('DevOps');

        $productManagement = Role::create([
            'name' => 'Product Management',
            'guard_name' => 'web',
        ]);

        $productManagement->givePermissionTo('Product Management');

        $gameDev = Role::create([
            'name' => 'Game Dev',
            'guard_name' => 'web',
        ]);

        $gameDev->givePermissionTo('Game Dev');

        $seo = Role::create([
            'name' => 'SEO',
            'guard_name' => 'web',
        ]);

        $seo->givePermissionTo('SEO');

        $react = Role::create([
            'name' => 'React/Next',
            'guard_name' => 'web',
        ]);

        $react->givePermissionTo('React/Next');

        $android = Role::create([
            'name' => 'Android(Kotlin)',
            'guard_name' => 'web',
        ]);

        $android->givePermissionTo('Android(Kotlin)');

        $projectManagement = Role::create([
            'name' => 'Project Management',
            'guard_name' => 'web',
        ]);

        $projectManagement->givePermissionTo('Project Management');

        $azure = Role::create([
            'name' => 'Azure',
            'guard_name' => 'web',
        ]);

        $azure->givePermissionTo('Azure');

        $iosDev = Role::create([
            'name' => 'iOS Dev',
            'guard_name' => 'web',
        ]);

        $iosDev->givePermissionTo('iOS Dev');

        $blockchain = Role::create([
            'name' => 'Blockchain',
            'guard_name' => 'web',
        ]);

        $blockchain->givePermissionTo('Blockchain');

        $personal = Role::create([
            'name' => 'Personal & Profession Dev',
            'guard_name' => 'web',
        ]);

        $personal->givePermissionTo('Personal & Profession Dev');

        // Assign all permissions to owner role


        $permissions = Permission::all();
        $superAdminRole->syncPermissions($permissions);
        $managerRole->syncPermissions($permissions);

        $superadmin = User::create([
            'name' => 'Usman Khan',
            'email' => 'usman@bytewise.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);

        $manager = User::create([
            'name' => 'Umer Hasan Khan',
            'email' => 'uhk@bytewise.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        
        //assign role to superadmin
        $superadmin->assignRole($superAdminRole);
        //assign role to manager
        $manager->assignRole($managerRole);
    }
}
