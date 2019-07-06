<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (config('acl.roles') as $role) {
            $roleObj = \Spatie\Permission\Models\Role::create([
                'name' => $role,
            ]);

            foreach (config('acl.permissions') as $permission => $permittedRoles) {
                $permissionObj = \Spatie\Permission\Models\Permission::findOrCreate($permission);

                if (in_array($role, $permittedRoles)) {
                    $roleObj->givePermissionTo($permissionObj);
                }
            }
        }


        // Default Users
        $roles = config('acl.roles');

        foreach ($roles as $role){

            $user = \App\Models\User::create([
                'first_name' => ucfirst($role),
                'email' => $role.'@example.com',
                'password' => bcrypt('secret')
            ]);

            $photo = \App\Models\Media::create([
                'name' => $user->name,
                'src' => 'http://www.swisspartners.com/app/uploads/2019/04/portrait_platzhalter-1.png'
            ]);

            $user->update([
                'image_id' => $photo->id
            ]);

            $user->assignRole($role);

        }

    }
}
