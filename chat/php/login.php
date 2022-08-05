<div class="wrapper none" id="wrapper2">
  <section class="form login">
    <header>Chat en tiempo real</header>
    <form id="form_login" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div id="error_login" class="error-text"></div>
      <div class="field input">
        <label>Dirección de correo electrónico</label>
        <input type="text" name="email" placeholder="Introduce tu correo electrónico" required value="soporte@gmail.com">
      </div>
      <div class="field input">
        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Ingresa tu contraseña" required value="admin123">
        <i class="fas fa-eye"></i>
      </div>
      <div class="field button">
        <input id="btn_login" type="submit" name="submit" value="Continuar chateando">
      </div>
    </form>
    <div class="link">Aún no te has registrado? <a id="register">Regístrate ahora</a></div>
  </section>
</div>
