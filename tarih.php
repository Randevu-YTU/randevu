<?php

if($_POST['submit']){
    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];
    $startHour = $_POST['startHour'];
    $endHour = $_POST['endHour'];
    
    if(strtotime($endHour) - strtotime($startHour) > 0){
        $endDate = strtotime($endDate);
        if(isset($_POST['days'])){
            for($i = strtotime($startDate); $i <= $endDate; $i = strtotime('+1 day', $i)){
                foreach ($_POST['days'] as $key => $value) {
                    if(stripos(date('l',$i),$value) !== false ){
                        for($j = strtotime($startHour); $j < strtotime($endHour); $j = strtotime('+30 minutes', $j)){
                            $insertDate = date('Y-m-d',$i).' '.date('H:i',$j);
                            echo $insertDate.'<br>';
                        }
                    }
                }
            }
        }
        else 
            echo "Gun secmediniz";
    }
    else 
        echo "Bitis saati baslangic saatinden kucuk olamaz";    
}


?>