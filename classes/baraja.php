<?php
    $cardsWidthSize = 100;
    $cardsHeighthSize = 80;

    $cards = "";
    $cardsUsed = array();
    $cardsType = "CDPT";

    $player1VerticalStartRef=30;
    $player1HorizontalStartRef=20;

    for ($index = 1; $index < 6; $index++) {
        $imagePath = getRandomImage();
        $cartaNum = "carta".$index;
        $cards .=  '
        <div id="carta'.$cartaNum.'" style="top: '.$player1VerticalStartRef.'px; width: 100px; left: '.$player1HorizontalStartRef.'px; background-color: black; position: absolute; height: 80px; cursor: move; z-index: 10;" onmousedown="comienzoMovimiento(event, this.id);" onmouseover="this.style.cursor=cursor;">
            <center><img src="'.$imagePath.'"></center>
        </div>';
        $player1HorizontalStartRef+=30;
    }
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