<div id = centrar>


<h1>TypKey</h1>



<br><br>
<form action="../controladores/c-autenticacion.php" method="POST">
    Usuario
    <br>
    <input type ="email" name="usuario" required>
    <br><br>
    clave
    <br>
    
    <input type ="password"  name="clave" required minlength="5" maxlength="8" title="error"><br>
    
    <a href="../controladores/c-recuperar.php" >olvido su clave?</a>
    <br><br><br>
    <input type ="submit" value = "Aceptar">
    <br>
</form>
 



