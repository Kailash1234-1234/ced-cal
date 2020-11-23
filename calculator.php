<?php
/**
 * Templet File Doc Comment
 * 
 * PHP version /
 * 
 * @category Tenplete_Class
 * @package  Templete_Class
 * @author   Author <author@domain.com>
 * @license  http://opensource.org/MIT MIT License
 * @link     http://localhost/
 */
$inputval = (int) $_POST['display'];
$opt=$_POST['opt'];
$temp = (int) $_POST['pre'];
switch($opt){
case '+':
    {
    sum($inputval, $temp); 
    break;
    }
case '-':
    {
    sub($inputval, $temp); 
    break;
    }
case '*':
    {
    mul($inputval, $temp);  
    break;
    }
    case '/':{
    div($inputval, $temp); 
    break; 
    }
}
function sum($a, $b) 
{
    $result=(int)$a+(int)$b;
    echo $result;
   
}
function mul($a, $b)
{
    $result=(int)$a*(int)$b;
    echo $result;
   
}
function sub($a, $b)
{
    if ($a > $b) {
        $result=(int)$a-(int)$b; 
    } else {
        $result=(int)$b-(int)$a;
    }
    echo $result;
   
}
function div($a, $b)
{
    $result=(int)$a/(int)$b;
    echo $result;
   
}
?>