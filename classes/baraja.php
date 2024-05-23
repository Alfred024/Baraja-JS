<?php
    $cardsWidthSize = 100;
    $cardsHeighthSize = 80;

    $cards = "";
    $cardsUsed = array();
    $cardsType = "CDPT";

    // JUGADOR 1
    $playerAVerticalStartRef=30;
    $playerAHorizontalStartRef=20;
    for ($index = 1; $index < 6; $index++) {
        $imagePath = getRandomImage();
        $cartaNum = $index;
        $cards .=  '
        <div id="cardPlayerA_'.$cartaNum.'" 
            style="top: '.$playerAVerticalStartRef.'px; width: '.$cardsWidthSize.'px; left: '.$playerAHorizontalStartRef.'px; background-color: black; position: absolute; height: '.$cardsHeighthSize.'px; cursor: move; z-index: 10;"
            onmousedown="comienzoMovimiento(event, this.id);">
            <center><img src="'.$imagePath.'"></center>
        </div>';
        $playerAHorizontalStartRef+=30;
    }

    // JUGADOR 2
    $player2VerticalStartRef=100;
    $player2HorizontalStartRef=20;
    for ($index = 1; $index < 6; $index++) {
        $imagePath = getRandomImage();
        $cartaNum = $index;
        $cards .=  '
        <div id="cardPlayerB_'.$cartaNum.'" 
            style="top: '.$player2VerticalStartRef.'px; width: '.$cardsWidthSize.'px; left: '.$player2HorizontalStartRef.'px; background-color: black; position: absolute; height: '.$cardsHeighthSize.'px; cursor: move; z-index: 10;"
            onmousedown="comienzoMovimiento(event, this.id);">
            <center><img src="'.$imagePath.'"></center>
        </div>';
        $player2HorizontalStartRef+=30;
    }

    // CARTAS SOBRANTES


    return $cards;


    function getRandomImage() : string{
        $imagesPath = './imgs/';

        do{
            $cardNum = rand(1,13);
            $cardType = $GLOBALS['cardsType'][rand(0,3)];
            $card = $cardNum.$cardType;
        } while(in_array($card, $GLOBALS['cardsUsed']));

        array_push($GLOBALS['cardsUsed'], $card);

        $imgFileName = $card.".jpg";
        return $imagesPath.$imgFileName;
    }
?>