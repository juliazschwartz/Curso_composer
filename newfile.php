<?php

namespace Julia\Buscador_cursos;
require_once 'vendor/autoload.php';   //precisamos desse autoload.


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

//Primeira coisa no prompt:   Pasta do projeto --> composer init. Cria o composer.
//Aí, damos os requires dos composers que pegamos no packgist, necessarios para nosso programa. Esse require vem escrito na página do packgist.
//o Composer tem um arquivo 'autoload.php', que faz o trabalho necessário para definir um autoload de classes de forma que seja possível utilizar
//as dependências sem incluir seus arquivos separadamente.

//precisamos colocar os requires dados no packagist (de todos os pacotes que usaremos) antes de começar. Eles devem ser feitos no prompt dentro do diretório em que esse arquivo está.



$client = new Client(['verify' => false,'base_uri' => 'https://www.alura.com.br']);                            //url base. A partir desse site, fazemos uma requisição

$crawler = new Crawler();


$buscador = new Buscador($client, $crawler);
$cursos = $buscador -> buscar('/cursos-online-programacao/php');       

//$cursos vai retornar uma lista com vários elementos da página (1 para cada curso). A partir dessa lista, podemos iterar sobre:

foreach ($cursos as $curso){
  echo $curso.PHP_EOL;

}

//Passando para o git: Coloca no git ignore o /vendor. Assim, ele não gerenciará essas entradas. 
/*Aí, dentro do diretório buscador-cursos, damos git init e criamos um commit no bash do git.
 * aí, criamos a tag de versionamento, tag -a v1.0.0:
 * O primeiro número é a versão principal, fazendo mudanças API imcompatíveis com as outras versões.
 * O segundo número são mudanças menores, compatíveis com as outras versões
 * Correção de bugs: ultimo número.
 */


/* Por padrão, o Composer têm adicionado um circunflexo (^) nos nossos códigos (nas definições das versões dos pacotes, no arquivo .json).
 Ele é utilizado para informar que queremos baixar a versão especificada até a próxima "major version", ou seja, até o momento em que a compatibilidade quebra */