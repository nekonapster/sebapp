<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateInitialUser extends Command
{
    protected $signature = 'create:initial-user';
    protected $description = 'Crea un usuario inicial en la colección users si no existe';

    public function handle()
    {
        $userExists = DB::connection('mongodb')->collection('users')->where('email', 'usuario@example.com')->exists();

        if (!$userExists) {
            DB::connection('mongodb')->collection('users')->insert([
                'name' => 'nekonapster',
                'email' => 'martin@admin.com',
                'password' => bcrypt('rootroot'),
                'role' => 'admin',
            ]);

            $this->info('Usuario inicial creado.');
        } else {
            $this->info('El usuario inicial ya existe.');
        }
    }
}
