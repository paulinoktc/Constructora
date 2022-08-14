<div class="wrapper none" id="wrapper">
    <section class="form signup">
        <header>Chatea con nosotros</header>
        <form id="form_register" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div id="error_register" class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <label>Nombre</label>
                    <input type="text" name="fname" placeholder="Nombre" required>
                </div>
                <div class="field input">
                    <label>Apellido</label>
                    <input type="text" name="lname" placeholder="Apellido" required>
                </div>
            </div>
            <div class="field input">
                <label>Dirección de correo electrónico</label>
                <input type="text" name="email" placeholder="Introduce tu correo electrónico" required>
            </div>
            <div class="field input">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Introduzca nueva contraseña" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label>Foto</label>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input id="btn_register" type="submit" name="submit" value="Continuar chateando">
            </div>
        </form>

        <div>
            <div class="link">Ya te inscribiste? <a id="btn_init">Inicia sesión ahora</a></div>
        </div>
    </section>

</div>

<div class="button-message">
    <a id="btn_mss">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
            <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
        </svg>
    </a>
</div>