<html>

 <head>

  <title>PHP 测试</title>

 </head>

<script language="JavaScript" type="text/JavaScript">

function runEx(cod1) {

cod=document.all(cod1);

var code=cod.value;
 if (parseInt(code) ==2)

    document.getElementsByName("result")[0].value = parseInt(code) + " 对了";

  else

    document.getElementsByName("result")[0].value = parseInt(code) + " 错了"; 

}



}



</script>

 <body>

 <p>1+1=?</p>

 <p>

<textarea name="answer" cols="60" rows="1" id="rn01">

</textarea>



<br><INPUT onclick="runEx('rn01')" type="button" value="提交评测！" style="cursor:hand">
<br>
<textarea name="result" cols="60" rows="2" id="rn02">没交呢</textarea>

</p>

 </body>

</html>
