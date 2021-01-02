<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\{Schema,DB};
use DateTime,DateInterval;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $tablas = ['clientes','autos','clientes','tiposvehiculos','usuarios'];
        Schema::disableForeignKeyConstraints();
        foreach($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        Schema::enableForeignKeyConstraints();

        $clientes = [
            ['nombres'=>'Francisco', 'apellidos'=>'Meneghini','rut'=>'13588889-6','edad'=>'28','email'=>'francisco@gmail.com'],
            ['nombres'=>'Gustavo', 'apellidos'=>'Huerta','rut'=>'13588889-3','edad'=>'25','email'=>'gustavo@gmail.com'],
            ['nombres'=>'Gustavo', 'apellidos'=>'Quinteros','rut'=>'13545589-3','edad'=>'45','email'=>'gustavo_q@gmail.com'],
            ['nombres'=>'Juan José', 'apellidos'=>'Ribera','rut'=>'13546579-6','edad'=>'45','email'=>'juan_r@gmail.com'],
            ['nombres'=>'Martín', 'apellidos'=>'Palermo','rut'=>'1356889-3','edad'=>'45','email'=>'martin@gmail.com'],
            ['nombres'=>'Diego', 'apellidos'=>'Reveco','rut'=>'13546689-3','edad'=>'25','email'=>'diego@gmail.com'],
            ['nombres'=>'Cristian', 'apellidos'=>'Leiva','rut'=>'13546789-5','edad'=>'35','email'=>'cristian@gmail.com'],
            ['nombres'=>'Miguel', 'apellidos'=>'Ponce','rut'=>'13546619-5','edad'=>'25','email'=>'miguel@gmail.com'],
            ['nombres'=>'Javier', 'apellidos'=>'Torrente','rut'=>'13542689-3','edad'=>'28','email'=>'javier@gmail.com'],
            ['nombres'=>'Gustavo', 'apellidos'=>'Florentín','rut'=>'13546709-6','edad'=>'45','email'=>'gustavo_f@gmail.com'],
            ['nombres'=>'Dalcio', 'apellidos'=>'Giovagnoli','rut'=>'13583489-3','edad'=>'45','email'=>'dalcio@gmail.com'],
            ['nombres'=>'José Luis', 'apellidos'=>'Sierra','rut'=>'13546689-5','edad'=>'25','email'=>'jose_s@gmail.com'],
            ['nombres'=>'Miguel', 'apellidos'=>'Ramírez','rut'=>'13546789-3','edad'=>'35','email'=>'miguel_r@gmail.com'],
            ['nombres'=>'Ronald', 'apellidos'=>'Fuentes','rut'=>'13546089-3','edad'=>'35','email'=>'ronald@gmail.com'],
            ['nombres'=>'Juan Pablo', 'apellidos'=>'Vojvoda','rut'=>'1358689-6','edad'=>'35','email'=>'juan_v@gmail.com'],       
            ['nombres'=>'Ariel', 'apellidos'=>'Holan','rut'=>'13546789-6','edad'=>'28','email'=>'ariel@gmail.com'],
            ['nombres'=>'Ronald', 'apellidos'=>'Jeria','rut'=>'13544781-6','edad'=>'28','email'=>'ronal_j@gmail.com'],
            ['nombres'=>'Eduardo', 'apellidos'=>'Acevedo','rut'=>'13544781-3','edad'=>'28','email'=>'eduardo_a@gmail.com'], 
        ];

        foreach($clientes as $cliente){
            DB::table('clientes')->insert([
                'nombres' => $cliente['nombres'],
                'apellidos' => $cliente['apellidos'],
                'rut'=>$cliente['rut'],
                'edad'=>$cliente['edad'],
                'email'=>$cliente['email'],
                'created_at' => new DateTime('NOW')
            ]);
        }

        $tiposvehiculos =[
            ['marca'=>'Daewoo','modelo'=>'Tico','combustible'=>'b','motor'=>'1.8','puertas'=>'5','precio'=>'650000','clase'=>'Compacto'],
            ['marca'=>'BMW','modelo'=>'X2','combustible'=>'h','motor'=>'1.6','puertas'=>'3','precio'=>'350000','clase'=>'Compacto'],
            ['marca'=>'Ford','modelo'=>'Tico','combustible'=>'b','motor'=>'1.3','puertas'=>'4','precio'=>'250000','clase'=>'Compacto'],
            ['marca'=>'Peugeot','modelo'=>'3008','combustible'=>'d','motor'=>'1.5','puertas'=>'3','precio'=>'650000','clase'=>'Compacto'],
            ['marca'=>'Chevrolet','modelo'=>'Cruze','combustible'=>'h','motor'=>'1.9','puertas'=>'4','precio'=>'250000','clase'=>'Compacto'],
            ['marca'=>'Mitsubishi','modelo'=>'Eclipse Cross','combustible'=>'d','motor'=>'1.4','puertas'=>'5','precio'=>'150000','clase'=>'Compacto'],
        ];
        foreach($tiposvehiculos as $tipo){
            DB::table('tiposvehiculos')->insert([
                'marca'=>$tipo['marca'],
                'modelo'=>$tipo['modelo'],
                'combustible'=>$tipo['combustible'],
                'motor'=>$tipo['motor'],
                'puertas'=>$tipo['puertas'],
                'precio'=>$tipo['precio'],
                'clase'=>$tipo['clase'],
                'created_at' => new DateTime('NOW')
            ]);
        }
        
        $usuarios = [
            ['nombre'=>'Gabriel', 'apellido'=>'Fuentes','password'=>Hash::make('1111'),'email'=>'gabriel@gmail.com','rol'=>'1','activo'=>'1'],
            ['nombre'=>'Mario', 'apellido'=>'Mejias','password'=>Hash::make('2222'),'email'=>'mario@gmail.com','rol'=>'0','activo'=>'1'],
            ['nombre'=>'Carlos', 'apellido'=>'Alten','password'=>Hash::make('3333'),'email'=>'carlos@gmail.com','rol'=>'1','activo'=>'0'],
            ['nombre'=>'Claudio', 'apellido'=>'Roman','password'=>Hash::make('4444'),'email'=>'claudio@gmail.com','rol'=>'0','activo'=>'0'],
        ];

        foreach($usuarios as $usuario){
            DB::table('usuarios')->insert([
                'nombre' => $usuario['nombre'],
                'apellido' => $usuario['apellido'],
                'password'=>$usuario['password'],
                'email'=>$usuario['email'],
                'rol'=>$usuario['rol'],
                'activo'=>$usuario['activo'],
                'created_at' => new DateTime('NOW')
            ]);
        }

        
    }
}
