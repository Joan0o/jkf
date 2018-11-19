<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>

  .fab-container {
    margin: 1em;
    position: fixed;
    bottom: 0;
    right: 0;
  }
  .fab-container:hover .buttons:not(:last-of-type) {
    width: 40px;
    height: 40px;
    margin: 15px auto 0;
    opacity: 1;
  }
  .fab-container:hover .rotate {
    background-image: url("svg/fab/chevron-up.svg");
    background-size: 50%;
    background-color: white;
    transform: rotate(360deg);
  }

  .buttons {
    display: block;
    width: 35px;
    height: 35px;
    margin: 20px auto 0;
    text-decoration: none;
    position: relative;
    border-radius: 50%;
    box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 0px 4px 12px -7px rgba(0, 0, 0, 0.15);
    opacity: 0;
    transition: .2s;
  }
  .buttons:nth-last-of-type(2) {
    transition-delay: 20ms;
  }
  .buttons:nth-last-of-type(3) {
    transition-delay: 40ms;
  }
  .buttons:nth-last-of-type(4) {
  transition-delay: 60ms;
  }
  .buttons:nth-last-of-type(5) {
    transition-delay: 80ms;
  }
  .buttons:nth-last-of-type(6) {
    transition-delay: 100ms;
  }
  .buttons:nth-last-of-type(1) {
    width: 56px;
    height: 56px;
    opacity: 1;
  }
  .fab-bandas {
      background-image: url(svg/fab/band.svg);
      background-size: 70%;
      background-position: center;
      background-color: white;
      background-repeat: no-repeat;
  }
  .fab-about {
      background-image: url(svg/fab/question.svg);
      background-size: 70%;
      background-position: center;
      background-color: white;
      background-repeat: no-repeat;
  }
  .fab-login {
      background-image: url(svg/fab/login.svg);
      background-size: 70%;
      background-position: center;
      background-color: orange;
      background-repeat: no-repeat;
  }
  .fab-logout {
      background-image: url(svg/fab/exit.svg);
      background-size: 80%;
      background-position: center;
      background-color: orange;
      background-repeat: no-repeat;
  }
  .fab-registrarse {
      background-image: url(svg/fab/register.svg);
      background-size: 60%;
      background-position: center;
      background-color: orange;
      background-repeat: no-repeat;
  }
  .fab-perfil{
      background-image: url(svg/fab/profile.svg);
      background-size: 52%;
      background-position: center;
      background-color: orange;
      background-repeat: no-repeat;
  }
  .fab-reservas{
      background-image: url(svg/fab/calendario.svg);
      background-size: 60%;
      background-position: center;
      background-color: orange;
      background-repeat: no-repeat;
  }
  .fab-mis-bandas{
    background-image: url(svg/fab/band.svg);
      background-size: 60%;
      background-position: center;
      background-color: #FFF;
      background-repeat: no-repeat;
  }
  .buttons:hover {
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);
  }

  .span {
    width: 100%;
    height: 100%;
    border-radius: 50%;
  }
  .span.rotate {
    background: orange url("svg/fab/k.svg") center no-repeat;
    position: absolute;
    transform: rotate(0);
    transition: .3s;
  }

  [tooltip]:before {
    content: attr(tooltip);
    background: #585858;
    padding: 5px 7px;
    margin-right: 10px;
    border-radius: 2px;
    color: #FFF;
    font: 500 16px Roboto;
    white-space: nowrap;
    position: absolute;
    bottom: 20%;
    right: 100%;
    visibility: hidden;
    opacity: 0;
    transition: .3s;
  }
  [tooltip]:hover:before {
    visibility: visible;
    opacity: 1;
  }

</style>

<nav class="fab-container">
    <a class="buttons fab-about" data-toggle="modal" data-target="#about" tooltip="Qué es - J K F"></a>
    <a class="buttons fab-bandas" href="#" tooltip="Bandas de la sala"></a>
    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="buttons fab-logout" href="#" tooltip="Cerrar sesión" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
        </a>
        <a class="buttons fab-perfil" data-toggle="modal" data-target="#perfil"tooltip="Mi perfil"></a>
        <a class="buttons fab-mis-bandas" href="#" tooltip="Mis bandas"></a>
        <a class="buttons fab-reservas" id="m-e" data-toggle="modal" data-target="#calendar-modal" tooltip="Mis reservas"></a>
    @else
        <a class="buttons fab-login" data-toggle="modal" data-target="#auth-modal" tooltip="Iniciar sesión"></a>
        <a class="buttons fab-registrarse" data-toggle="modal" data-target="#register-modal" href="#" tooltip="Registrarse"></a>
    @endauth
    <a class="buttons top" href="#" tooltip="J K F">
        <span>
            <span class="rotate span"></span>
        </span>
    </a>
</nav>
