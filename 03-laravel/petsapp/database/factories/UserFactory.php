<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;



    public function saveImageToDatabase ($path){
       $querry = "UPDATE users SET photo = '$path' WHERE email = 'L8c6K@example.com'";
    }
    /**
     * 
     * guarda la imagen en la maquina local y luego envia la direccion a la base de datos
     * @param mixed $path
     * @param  mixed $imageContent contenido de la imagen previamente descargado
     * @return mixed retorna el path absoluto para guardarlos en la base de datos
     */
        public function downloadImage($url, $directory){
            // esto lo que hace es valida que el directoriop tenga permiso y si no lo crea
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }
        
            // lo qwue hace es guardar le contenido de la imagen
            $imageContent = file_get_contents($url);
        
            $filename = $directory . '/avatar_' . uniqid() . '.jpg'; //crear un unico nombre para este archivo
        
        
            // esta si es la fuincion que guarda la imagen
            file_put_contents($filename, $imageContent);
        
            // aqui es donde se obtiene la verdadera ruta del archivo
            $imagePath = realpath($filename);
        
            
            return $imagePath;
    }

    /**
     * guarda la imagen dependiendo el genero.
     *
     * @param string  $gender genero del usuario
     * @return string $imagePath retorna el path del cual se guardo la imagen 
     */

    public function ConfigImage($gender) {
        /**
         * variables por defecto
         */

        $imagePath = '';
        $directory = 'C:\Users\buitr\OneDrive\Documentos\GITHUB\adso2847431\03-laravel\petsapp\public\images';
        
        $urls = [
            'https://avatar.iran.liara.run/public/boy', //url male
            'https://avatar.iran.liara.run/public/girl' //url female
            ];
        /**
         *  condicional que determina el genero
         */
        if($gender == 'male') {
            $url = $urls[0];
            $imagePath = $this->downloadImage($url, $directory);
        }else{
            $url = $urls[1];
            $imagePath = $this->downloadImage($url, $directory);
        }

        return $imagePath;

    }
   
    public function definition(): array
    {
        $gender = fake()->randomElement(array('Female', 'Male'));
        $name = ($gender == 'Female') ? $name = fake() -> firstNameFemale() 
                                      : $name = fake() -> firstNameMale();
        ($gender == 'Female') ? $g = 'girl' : $g = 'boy';
        $id = fake()->numerify('75######');
        copy('https://avatar.iran.liara.run/public/'.$g, public_path('images/'.$id.'.png'));
        return [
            'document' => $id,
            'fullname' => $name. " " .fake()->lastName(),
            'gender'=>  $gender,
            'birthdate' => fake()->dateTimeBetween('1974-01-01','2004-12-31'),
            'photo' => $id.'.png',
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->numerify('320######'),
            'email_verified_at' => now(),
            'password' => static:: $password ??= Hash::make('12345'),
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}