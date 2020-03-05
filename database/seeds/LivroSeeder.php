<?php

use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livros')->insert([
            'titulo' => 'Os Miseráveis',
            'autor' => 'Vitor Hugo',
            'sinopse' => 'Jean Valjean é condenado a trabalhos forçados por ter roubado um pão em um dia em que os filhos de sua irmã tinham fome. Libertado 19 anos depois, adota outra identidade e transforma-se em um próspero empresário. Perseguido pelo inspetor Javert, é preso, mas consegue escapar. Resgata a pequena Cosette das mãos do terrível casal Thénardier, e vai morar com ela em um convento em Paris. Anos mais tarde, explodem conflitos políticos nas ruas da cidade: a Revolução Francesa.',
            'image' => 'os-miseráveis05-03-2020|19:55:11.jpeg'
            ]);
        DB::table('livros')->insert([
            'titulo' => 'O Iluminado',
            'autor' => 'Stephen King',
            'sinopse' => 'Jack, sua esposa Wendy e Danny, seu filho, se mudaram para o resort hotel Overlook, pois Jack começou a trabalhar como zelador de inverno. O passado do hotel é fantasmagórico, Danny é telepata e sensível a forças sobrenaturais, e assim segue uma série de acontecimentos estranhos.',
            'image' => 'o-iluminado05-03-2020|19:55:40.jpeg'
        ]);
        DB::table('livros')->insert([
            'titulo' => 'Dom Casmurro',
            'autor' => 'Machado de Assis',
            'sinopse' => 'O romance de Bento e Capitu, e a possível interferência do amigo Escobar, contados sob a mente não tão lúcida de Bentinho, nos levam a diversas interpretações. Podem-se fazer inúmeros debates e estudos, mas nunca conseguirá ser provado se Capitu traiu ou não Bentinho, o que faz deste um dos melhores romances de todos os tempos.',
            'image' => 'dom-casmurro05-03-2020|19:55:59.jpeg'
        ]);
        DB::table('livros')->insert([
            'titulo' => 'As Aventuras de Sherlock Holmes',
            'autor' => 'Sir Arthur Conan Doyle',
            'sinopse' => 'As Aventuras de Sherlock Holmes é uma coletânea de doze contos de aventuras do mais famoso detetive de todos os tempos. Foi publicada em 1892, mas originalmente publicados na revista Strand Magazine, nos anos de 1891 e 1892.',
            'image' => 'as-aventuras-de-sherlock-holmes05-03-2020|19:56:14.jpeg'
        ]);
        DB::table('livros')->insert([
            'titulo' => 'Admirável Mundo Novo',
            'autor' => 'Aldous Huxley',
            'sinopse' => 'Datado de 1932, o livro narra um “hipotético” futuro onde as pessoas nascem todas de proveta e são submetidas a um condicionamento biológico desde o início.',
            'image' => 'admirável-mundo-novo05-03-2020|19:56:29.jpeg'
        ]);
        DB::table('livros')->insert([
            'titulo' => 'O Auto da Compadecida',
            'autor' => 'Ariano Suassuna',
            'sinopse' => 'O Auto da Compadecida é uma obra constituída pela descrição do cenário do sertão nordestino com muito bom humor.
            As peripécias de Chicó e João Grilo retratam a alegria do povo nordestino, que mesmo com as adversidades da vida, não deixa de sorrir e sonhar.',
            'image' => 'o-auto-da-compadecida05-03-2020|19:56:52.jpeg'
        ]);
    }
}