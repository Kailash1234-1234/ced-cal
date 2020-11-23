<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate here..</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <th colspan="6" >Basic Calculator</th>
        </tr>
        <tr>
            <th colspan="5"><input type="text" name="result"  id="result" value=""></th>
        </tr>
        <tr>
            <td><input type="button" class="btn" data-id="1"  value="1"></td>
            <td><input type="button" class="btn"  data-id="2"  value="2"></td>
            <td><input type="button" class="btn"  data-id="3"   value="3"></td>
            <td><input type="button" class="optr"  data-id="/"  value="/"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn"  data-id="4" value="4"></td>
            <td><input type="button" class="btn"  data-id="5"  value="5"></td>
            <td><input type="button" class="btn"  data-id="6" value="6"></td>
            <td><input type="button" class="optr" data-id="*" value="*"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn"  data-id="7" value="7"></td>
            <td><input type="button" class="btn"  data-id="8" value="8"></td>
            <td><input type="button" class="btn"  data-id="9" value="9"></td>
            <td><input type="button" class="optr"  data-id="-" value="-"></td>
        </tr>
        <tr>
            <td><input class="btn" type="button"  data-id="0"  value="0"></td>
            <td><input class="optr" type="button"  data-id="="  style="background-color: green;" value="="></td>
            <td><input class="optr" data-id="clr"  type="button" style="background-color: red;"  value="clr"></td>
            <td><input type="button" class="optr"  data-id="+" value="+"></td>
        </tr>
        <tr>
            <th colspan="6" >CED- Cal</th>
        </tr>
    </table>
    <script>
    $(document).ready(function(){
        var inputval;
        var preval=0;
        var result = 0;
        var operator;
        $(".btn").on("click", function(e){
            e.preventDefault();
            inputval = $(this).val(); 
            if(result !=0){
                preval=preval * 10+ Number(inputval);
                $("#result").val(preval);
            } else {
                preval = preval*10+Number(inputval);
                $("#result").val(preval);
            }
        });
        $(".optr").on("click", function(e){
            e.preventDefault();
            $("#result").val("");
            if(operator == undefined){
                opertaor = $(this).val();   
            }
            if(result==0){
                result=preval;
                preval=0;
                $("#result").val("");
            } else {
               opt=$(this).val();
               if(opt=='clr'){
                   result=0;
                   preval=0;
                   $("#result").val("0");
               }
               else{
                   callajax();
               }
            }
        });

        function callajax(){
            $.ajax({
                url : "calculator.php",
                type : "POST",
                data :{opt:opt,pre:preval,display:result},
                success : function(data){
                result=data;
                preval=0;
                operator=opt;    
                $("#result").val(data);

                }
            })  
    }
});
    </script>    
</body>
</html>