
<section class="main__section section section_login">
  <p class="text text_login_titulo">Log in</p>
  <form id="registrase" action="../../controllers/cvalidar.php" method="POST" class="form form_login">
    <p class="form__text text text_form_titulo-seccion">Ingrese su usuario y contraseña</p>
    <label class="form__label_login" for="email">Email:</label>
    <input id="email" class="form__input_login input input_login" type="email" name="email" autocomplete="off" required>
    <label class="form__label_login" for="password">Password:</label>
    <input id="password" class="form__input_login input input_login" type="password" name="password" autocomplete="off" required>
  
    <input id="login" class="form__btn_login btn_secondary btn_login" type="submit" value="Log in">

  </form>
</section>

