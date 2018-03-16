<?php


//array de dados vindos do banco deverá ficar aqui
$input = array('2.5', '0.1', '0.1', '0.3');

//aqui vai pegar apenas os valores que são únicos dentro do array principal
$result = array_unique($input);
echo "<hr>";

//array vazio pronto pra receber valores vindos do for
$sorteio = [];
echo "<hr>";

//aqui vou contar a quantidade de valores dentro de cada array
$teste = array_count_values($input);


//laço que vai verificar cada um dos valores
foreach ($teste as $key => $i) {
    // echo $i."<br>";
    if ($i == 1) {
//aqui ele joga dentro do array vazio cada um dos valores que não tiverem repetição
        array_push($sorteio, $key);
    }
}

echo "<hr>Sorteio aqui<br>";
print_r($sorteio);
echo "<hr>O menor valor é: " . min($sorteio);
echo "<hr>O menor valor é: " . max($sorteio);
?>
