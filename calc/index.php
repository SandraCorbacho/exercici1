<?php

declare(strict_types=1);
if(isset($_POST['operation'])){
  
    if(isset($_POST['num2'])){
        $result = performOperation($_POST['operation'],intval($_POST['num1']), intval($_POST['num2']));
        echo " el resultado de calcular la ". $_POST['operation']. " de " . intval($_POST['num1'])." y " . intval($_POST['num2']) . "es " . $result;
    }else{
        $result = performOperation($_POST['operation'],intval($_POST['num1']));
      
        if($_POST['operation'] == 'Primo'){
            echo 'eee';
            if($result){
                echo " el resultado de calcular si el numero  ".$_POST['num1'] . " es ". $_POST['operation']. " si que es Primo";

            }else{
                echo " el resultado de calcular si el numero  ".$_POST['num1'] . " es ". $_POST['operation']. " NO es Primo";

            }
        }else{

            echo " el resultado de calcular ". $_POST['operation']. "de ".$_POST['num1'] . " es ". $result;

        }
    }
   
    
}

function performOperation(string $oper, int $num1, int $num2=null){
    switch($oper){
        case 'Suma':
            return suma($num1, $num2);
        break;
        case 'Factorial':
            return factorial($num1);
        break;
        case 'Primo':
            return primo($num1);
        break;
    }
}
function suma(int $num1, int $num2):int{
  
    $total = $num1 + $num2;
    return $total;
}

function factorial(int $num):int{
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
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form action=<?= htmlentities($_SERVER['PHP_SELF']);?> method=POST>
    <div id='numbers'>
        <input type="number" name = num1 required>
        <input type="number" name = num2 required>
    </div>
    
        <select name='operation' id='options'>
            <option>Suma</option>
            <option>Factorial</option>
            <option>Primo</option>
        </select>
        <input type="submit" value='calcular'>
    </form>
    <script>
        document.getElementById('options').addEventListener('change', inputs);
        function inputs(){
            $opcion = document.getElementById('options').value
            if($opcion == 'Suma'){
                document.getElementById('numbers').innerHTML = '<input type="number" name = num1 required> <input type="number" name = num2 required>'
            }else{
                document.getElementById('numbers').innerHTML = '<input type="number" name = num1 required>'
                
            }
        }
        
    </script>
</body>
</html>