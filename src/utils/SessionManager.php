<?php
class SessionManager
{
  public static function start()
  {
    session_start();
  }

  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function get($key)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  public static function destroy()
  {
    session_destroy();
  }

  public static function unsetSesion($key)
  {
    unset($_SESSION[$key]);
  }

  public static function validateGlobalSession($userGlobal = "userGlobal")
  {
    if (SessionManager::get($userGlobal) === NULL) {
      $urlLogin = URL::to("login");
      return header("Location: $urlLogin");
    };
  }
}
