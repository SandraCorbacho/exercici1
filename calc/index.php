<?php

declare(strict_types=1);

function performOperation(string $oper, int $num1, int &$num2){
    switch($oper){
        case 'calculo':
            return calculo_basico($num1, $num2);
        break;
        case 'factorial':
            return factorial($num1);
        break;
        case 'primo':
            return primo($num1);
        break;
    }
}
function suma(int $num1, int $num2){
    $total = $num1 + $num2;
    return $total;
}

function factorial(int $num){
    $factorial = 1;
    for($i = 1; $i<=$num; $i++){
        $factorial = $factorial * $i; 
    }
    return $factorial;
}


function primo(int $num):bool { 
    if($num!=2&&$num!=1){
            if($num%2==0){
                return false;
            } 
            else{
                $maxdiv=sqrt($num);
                for($i=3; $i <=$maxdiv; $i=$i+2) {
                    if ($num%$i==0){
                            return false;                       
                    }
                            return true;
                }
        }
    }
    return true;
}
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form action=<?= htmlentities($_SERVER['PHP_SELF']);?>>
    
    </form>
</body>
</html>