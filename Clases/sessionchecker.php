<?php
class SessionChecker {
    public static function check() {
        session_id();
        session_start();

        if (!isset($_SESSION["username"])) {
            header('Location: /trabajofinal/Usuarios/inicio.php');
            exit;
        }

        if (time() - $_SESSION["login_time_stamp"] > 3600) {
            session_unset();
            session_destroy();
            header('Location: /trabajofinal/Usuariosinicio.php');
            exit;
        }
    }
}