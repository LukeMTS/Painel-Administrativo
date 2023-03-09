<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'situation' => 'Disponível Público',
            ],
            [
                'situation' => 'Disponível Restrito',
            ],
            [
                'situation' => 'Bloqueado',
            ],
            [
                'situation' => 'Excluído',
            ],

        ];
        \App\Models\AlbumsSituation::insert($data);
        \App\Models\UserSituation::insert($data);
        \App\Models\CustomerSituation::insert($data);

        $users = [
            [
                'name' => 'admin',
                'birthdate' => '2022-01-01',
                'phone' => '321',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'situation_id' => 1,
            ]
        ];

        \App\Models\User::insert($users);

        $permissions = [
            [
                'title' => 'Adicionar',
                'permission' => 'add',
            ],
            [
                'title' => 'Editar',
                'permission' => 'edit',
            ],
            [
                'title' => 'Deletar',
                'permission' => 'delete',
            ],
        ];

        \App\Models\Permission::insert($permissions);

        \App\Models\UserPermission::insert(['user_id' => 1, 'permission_id' => 1]);

        \App\Models\ProfileType::insert([
            ['type' => 'Instagram', ],
            ['type' => 'Face', ],
            ['type' => 'Tw', ],
            ['type' => 'T', ],
        ]);
    }
}