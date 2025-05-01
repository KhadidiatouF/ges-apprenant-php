<?php

declare(strict_types=1);

enum ErreurMessageConnexion: string
{
  case BAD_LOGIN = 'Login invalide';
  case BAD_PASSWORD = 'Le mot de passe est invalide';
  case NOT_USER = 'L\'utilisateur n\'existe pas';
}
