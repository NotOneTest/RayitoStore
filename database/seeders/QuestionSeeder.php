<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@rayitostore.com')->first();
        $admin = User::where('role', 'admin')->first();

        $question1 = Question::create([
            'user_id' => $user->id,
            'title' => '¿Cuál es el mejor juego de RPG para principiantes?',
            'content' => 'Soy nuevo en el mundo de los RPG y me gustaría saber cuál me recomiendan para empezar. He escuchado mucho sobre The Witcher 3 y Elden Ring, pero no sé cuál sería mejor para alguien que nunca ha jugado un RPG.',
            'is_published' => true,
        ]);

        Answer::create([
            'question_id' => $question1->id,
            'user_id' => $admin->id,
            'content' => '¡Buena pregunta! Para alguien nuevo en RPGs te recomiendo empezar con The Witcher 3. Tiene una historia increíble y la curva de dificultad es más amigable. Elden Ring es más desafiante y puede ser frustrante para principiantes.',
            'is_accepted' => true,
        ]);

        Answer::create([
            'question_id' => $question1->id,
            'user_id' => $user->id,
            'content' => 'Yo empecé con Stardew Valley que es más casual, pero si buscas algo más épico, +1 para The Witcher 3.',
            'is_accepted' => false,
        ]);

        $question2 = Question::create([
            'user_id' => $user->id,
            'title' => '¿Los juegos digitales se pueden instalar en varias computadoras?',
            'content' => 'Quiero comprar algunos juegos en Rayito Store pero me gustaría saber si puedo instalarlos en mi PC de escritorio y mi laptop. ¿Hay alguna limitación?',
            'is_published' => true,
        ]);

        Answer::create([
            'question_id' => $question2->id,
            'user_id' => $admin->id,
            'content' => '¡Sí! Los juegos digitales que compres se pueden instalar en todos tus dispositivos sin límite. Solo necesitas iniciar sesión con tu cuenta y listo. Puedes tenerlos instalados en tantas máquinas como quieras.',
            'is_accepted' => true,
        ]);

        $question3 = Question::create([
            'user_id' => $user->id,
            'title' => '¿Hay descuento por comprar varios juegos a la vez?',
            'content' => 'Vi en la página que hay una promoción de "Compra 2 y ahorra 40%". ¿Funciona con cualquier juego? ¿Hay algún límite?',
            'is_published' => true,
        ]);

        Answer::create([
            'question_id' => $question3->id,
            'user_id' => $admin->id,
            'content' => '¡Exacto! La promoción 2x1 aplica automáticamente cuando tienes 2 o más juegos en tu carrito. El descuento del 40% se aplica sobre el total. No hay límite de uso y funciona con todos los juegos del catálogo.',
            'is_accepted' => true,
        ]);

        $question4 = Question::create([
            'user_id' => $user->id,
            'title' => '¿Cuánto tarda en llegar el código después de la compra?',
            'content' => 'Hice mi primera compra y quiero saber cuánto tiempo tengo que esperar para recibir el código de activación.',
            'is_published' => true,
        ]);

        Answer::create([
            'question_id' => $question4->id,
            'user_id' => $admin->id,
            'content' => 'La entrega es inmediata. En cuanto completes tu compra, el código se envía automáticamente a tu correo electrónico registrado. Si no lo ves, revisa tu carpeta de spam.',
            'is_accepted' => true,
        ]);
    }
}
