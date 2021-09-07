<?php

namespace Julia\Buscador_cursos;
require_once 'vendor/autoload.php';   //precisamos desse autoload.


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

//Primeira coisa no prompt:   Pasta do projeto --> composer init. Cria o composer.
//A�, damos os requires dos composers que pegamos no packgist, necessarios para nosso programa. Esse require vem escrito na p�gina do packgist.
//o Composer tem um arquivo 'autoload.php', que faz o trabalho necess�rio para definir um autoload de classes de forma que seja poss�vel utilizar
//as depend�ncias sem incluir seus arquivos separadamente.

//precisamos colocar os requires dados no packagist (de todos os pacotes que usaremos) antes de come�ar. Eles devem ser feitos no prompt dentro do diret�rio em que esse arquivo est�.



$client = new Client(['verify' => false,'base_uri' => 'https://www.alura.com.br']);                            //url base. A partir desse site, fazemos uma requisi��o

$crawler = new Crawler();


$buscador = new Buscador($client, $crawler);
$cursos = $buscador -> buscar('/cursos-online-programacao/php');       

//$cursos vai retornar uma lista com v�rios elementos da p�gina (1 para cada curso). A partir dessa lista, podemos iterar sobre:

foreach ($cursos as $curso){
  echo $curso.PHP_EOL;

}

//Passando para o git: Coloca no git ignore o /vendor. Assim, ele n�o gerenciar� essas entradas. 
/*A�, dentro do diret�rio buscador-cursos, damos git init e criamos um commit no bash do git.
 * a�, criamos a tag de versionamento, tag -a v1.0.0:
 * O primeiro n�mero � a vers�o principal, fazendo mudan�as API imcompat�veis com as outras vers�es.
 * O segundo n�mero s�o mudan�as menores, compat�veis com as outras vers�es
 * Corre��o de bugs: ultimo n�mero.
 */


/* Por padr�o, o Composer t�m adicionado um circunflexo (^) nos nossos c�digos (nas defini��es das vers�es dos pacotes, no arquivo .json).
 Ele � utilizado para informar que queremos baixar a vers�o especificada at� a pr�xima "major version", ou seja, at� o momento em que a compatibilidade quebra */