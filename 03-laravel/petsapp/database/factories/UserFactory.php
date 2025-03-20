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
    
        $this->saveImageToDatabase($imagePath) ;
    }

    /**
     * guarda la imagen dependiendo el genero.
     *
     * @param string  $gender genero del usuario
     */

    public function ConfigImage($gender) {
        /**
         * variables por defecto
         */


        $directory = 'C:\Users\buitr\OneDrive\Documentos\GITHUB\adso2847431\03-laravel\petsapp\public\images';
        
        $urls = [
            'https://avatar.iran.liara.run/public/boy', //url male
            'https://avatar.iran.liara.run/public/girl' //url female
            ];
        /**
         *  condicional que determina el genero
         */
        if($gender == 'Male') {
            $url = $urls[0];
            
            
            $this->downloadImage($url, $directory);
        }else{
            $url = $urls[1];
            $this->downloadImage($url, $directory);

           
            // file_put_contents($path, $imageContent);
        }
    }
   
    public function definition(): array
    {
      
        // parte donde descarga las fotos
      
       
        // $maleImages = ['male1.png','male2.png','male3.png','male4.png'];
     

        $gender = fake()->randomElement(['male','female']);
      

        $imageFolder = "../../../public/images/avatars";
        /**
         * 
         * lo que hace la ternaria es decidir apartir del genero
         * que nombre poner
         */

        if  ($gender  == 'male') {
            $nombre  = fake()->firstNameMale();
            $config =$this->ConfigImage($gender);

            

        } else {
            $config =$this->ConfigImage($gender);

            // $url = $urls[1].$itemNumber.'.png';
            // $nombre  = fake()->firstNameFemale();
            // $imageContent = file_get_contents($url);

        
        }

        return [
            'document' => fake()->unique()->numerify('##########'),
            'fullname' => $nombre.' '.fake()->lastName(),
            'gender' => $gender,
            'birthdate' => fake()->date(),
            'phone' => fake()->numerify('##########'),
            'email'=> fake()->unique()->email(),
            'password'=>'12345'
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
