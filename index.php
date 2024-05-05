
<!-- saved from url=(0078)https://tigger.celaya.tecnm.mx/conacad/cargas/GUVF681004UW4/46/capasMouse.html -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <script type="text/javascript">
            function carga(){ 
                posicion=0; cardClicked=null;
                
                // IE
                if(navigator.userAgent.indexOf("MSIE")>=0 || navigator.userAgent.indexOf("Trident")>=0) navegador=0;
                // Otros
                else 
                    navegador=1;
            }
            
            // DUDA: QUÉ ES EL clientX
            function comienzoMovimiento(event, id){ 
                cardClicked=document.getElementById(id); // Selecciona la card
                console.log(cardClicked.id);

                elComienzoX=parseInt(cardClicked.style.left); // Estas variables son globales???
                elComienzoY=parseInt(cardClicked.style.top);
                if(navegador==0)
                { 
                    cursorComienzoX=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft;
                    cursorComienzoY=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop;
            
                    document.attachEvent("onmousemove", enMovimiento);
                    document.attachEvent("onmouseup", finMovimiento);
                }
                if(navegador==1) // Acá entra
                {    
                    // console.log('MOVIMIENTO');
                    console.log(event.clientX);
                    cursorComienzoX=event.clientX+window.scrollX;
                    cursorComienzoY=event.clientY+window.scrollY;
                    document.addEventListener("mousemove", enMovimiento, true); 
                    document.addEventListener("mouseup", finMovimiento, true);
                }
                
                // elComienzoX=parseInt(cardClicked.style.left);
                // elComienzoY=parseInt(cardClicked.style.top);
                // Actualizo el posicion del elemento
                cardClicked.style.zIndex=++posicion;
                evitaEventos(event);
            }
            
            function enMovimiento(event){  
                var xActual, yActual;
                if(navegador==0)
                {    
                    xActual=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft;
                    yActual=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop;
                }  
                if(navegador==1)
                {
                    xActual=event.clientX+window.scrollX;
                    yActual=event.clientY+window.scrollY;
                }
                
                cardClicked.style.left=(elComienzoX+xActual-cursorComienzoX)+"px";
                cardClicked.style.top=(elComienzoY+yActual-cursorComienzoY)+"px";
                evitaEventos(event);
            }
            
            function finMovimiento(event){
                if(navegador==0)
                {    
                    document.detachEvent("onmousemove", enMovimiento);
                    document.detachEvent("onmouseup", finMovimiento);
                }
                if(navegador==1)
                {
                    document.removeEventListener("mousemove", enMovimiento, true);
                    document.removeEventListener("mouseup", finMovimiento, true); 
                }
            }

            function evitaEventos(event){
                // Funcion que evita que se ejecuten eventos adicionales
                if(navegador==0)
                {
                    window.event.cancelBubble=true;
                    window.event.returnValue=false;
                }
                if(navegador==1) event.preventDefault();
            }
        </script>

        <link rel="stylesheet" href="./style.css">
    </head>
    <body onload="carga();" style="margin: 0px;">
    
        <div class="Cards-Conatiner">

            <?= include('./classes/baraja.php'); ?>
            <!-- <div id="carta1" style="top: 29px; width: 112px; left: 126px; background-color: black; position: absolute; height: 158px; cursor: move; z-index: 10;" onmousedown="comienzoMovimiento(event, this.id);" onmouseover="this.style.cursor=cursor;">
            <center><img src="./imgs/1T.jpg"></center>
            </div> -->
        </div>

        
        <!--  -->
        <!-- <input name="enviar" id="enviar" type="button" value="Enviar" onclick="alert('ayayayayyyyy')"> -->
    
    </body>
</html>

    <!-- Dos caretas aleatorias, que no se repitan -->
    <!-- Si no la quiero, se dejan y me da otra carta -->