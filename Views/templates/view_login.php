<?php
  $isLogin = $_POST['isLogin'];

?>


<div class="row">
  <div class = "col-1"></div> 
  <div class = "col-3"></div>        
  <div class = "col-6">
    <div id="alerts"></div>
  </div>  
</div>

<div class="">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
        <div class="box-login ">
          <form id="login" action="../../index.php" method="POST">
            <h3 class="text-center ">Login</h3>
            <hr class="hr3">
            <div class="form-group">
              <label for="email" class="">Email:</label><br>
              <input class="form-control" type="email" id="email" name="email" placeholder="ex. usuario@tcc.com.br" required> 
            </div>
            <div class="form-group">
              <label for="senha" class="">Senha:</label><br>
              <input type="password" name="senha" id="senha" class="form-control" placeholder="4 números" required>
            </div>

            <input type="hidden" id="class" name="class" value="Login">
            <input type="hidden" id="acao" name="acao" value="logar">

            <button type="submit" class="btn-usuario">Entrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
