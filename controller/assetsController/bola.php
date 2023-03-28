<?php namespace Bola;
class Bola
{

  public static function getBola(String $cor)
  {
    if ($cor == 'R')
      return self::bolaVermelha();
    else if ($cor == 'G')
      return self::bolaVerde();
    else if ($cor == 'Y')
      return self::bolaAmarela();
  }

  private static function bolaAmarela()
  {
    return './assets/imagens/bola_amarela_G.png';
  }

  private static function bolaVerde()
  {
    return './assets/imagens/bola_verde_G.png';
  }

  private static function bolaVermelha()
  {
    return './assets/imagens/bola_vermelho_G.png';
  }
}


?>