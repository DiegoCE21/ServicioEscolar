<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .card-pasos { 
    padding-left: 45px; 
    padding-right: 45px; 
    padding-top: 25px; 
    padding-bottom: 40px; 
    border-radius: 25px; 
    text-align: left; 
    background-color: #d9edfa;

} 
 
.header-pasos { 
    border: 0px; 
    padding: 0px; 
    margin-bottom: 45px; 
} 
 
.texto-paso { 
    font-family: OpenSansCondensed-Light !important; 
    color: #1d1d1b !important; 
    width: 100%; 
} 
/* 
    elemento li que contiene los pasos 
*/ 
.lineaPasos { 
    display: flex; 
    padding: 0px; 
    margin: 0px; 
    list-style-type: none; 
} 
/* 
    Contenedor de circulo y texto del paso 
*/ 
.li-paso { 
    width: 20%; 
    padding: 0px; 
} 
/* 
    Contenedor de texto paso de color gris por defecto 
*/ 
.paso2 { 
    padding-top: 20px; 
    display: flex; 
    border-top: 2px solid #D8D8D8; 
    position: relative; 
} 
.paso { 
    padding-top: 20px; 
    display: flex; 
    border-top: 2px solid #D8D8D8; 
    position: relative; 
} 
/* 
    Se agrega cuando se finaliza el paso 
    Se agrega en el texto paso 
*/ 
.icono { 
    width: 25px; 
    height: 25px; 
    background-color: white; 
    border-radius: 25px; 
    position: absolute; 
    top: -16px; 
    left: 0; 
    color: #00953C; 
    font-size: 29px; 
    z-index: 10; 
} 
/*Circulo del paso de color gris por defecto*/ 
.paso:before { 
    content: ""; 
    width: 25px; 
    height: 25px; 
    background-color: #D8D8D8; 
    border-radius: 25px; 
    border: 1px solid #D8D8D8; 
    position: absolute; 
    top: -15px; 
    left: 0; 
} 
.paso2:before { 
    content: ""; 
    width: 25px; 
    height: 25px; 
    background-color: #00953C;
    border-radius: 25px; 
    border: 1px solid #D8D8D8; 
    position: absolute; 
    top: -15px; 
    left: 0; 
} 
/* 
    .completado: El usuario ya finalizó ese paso 
    Linea en verde 
*/ 
.li-paso.completado .paso { 
    border-top: 2px solid #00953C; 
} 
 
.li-paso.completado .texto-paso { 
    color: #00953C; 
} 
/* 
    Circulo en verde 
*/ 
.li-paso.completado .paso:before { 
    background-color: #00953C; 
    border: none; 
} 
/* 
    .actual: El usuario esta en ese paso 
    Circulo en verde y no pinta la linea de verde 
*/ 
.li-paso.actual .paso:before { 
    background-color: #00953C; 
    border: none; 
} 
 
@media (min-width: 300px) and (max-width: 600px ) { 
    .lineaPasos { 
        flex-direction: column; 
    } 
 
    .li-paso { 
        display: flex; 
        width: 100%; 
    } 
    /* Contenedor de texto paso de color gris por defecto */ 
    .paso { 
        padding-top: 0px; 
        padding-bottom: 20px; 
        border-top: none; 
        border-left: 2px solid #D8D8D8; 
        padding-left: 30px; 
        display: flex; 
    } 
 
    .li-paso.completado .paso { 
        border-top: none; 
        border-left: 2px solid #00953C; 
    } 
    /*Circulo del paso de color gris por defecto*/ 
    .paso:before { 
        top: -4px; 
        left: -14px; 
    } 
 
    .icono { 
        top: -5px; 
        left: -14px; 
    } 
}
    </style>
</head>
<body>
    <div class="row m-0">
        <div class="col-12 text-center pl-2 pr-2 pt-4 pb-4 fondo-linea-tiempo"> 
                    <div class="card card-pasos"> 
                        <div class="card-header header-pasos texto-titulo-gris"> 
                            <center><h1>Estatus de tu servicio social: </h1></center> 
                        </div> 
                        <div class="card-body p-0"> 
                            <ul class="lineaPasos" id="lineaPasos"> 
                                <li class="li-paso"> 
                                    <div class="paso2"> 
                                        <h3 class="texto-paso ">Registro en el sistema</h3> 
                                    </div> 
                                </li> 
                                <li class="li-paso "> 
                                    <div class="paso2"> 
                                        <h3 class="texto-paso">Subiendo documentos</h3> 
                                    </div> 
                                </li> 
                                <li class="li-paso "> 
                                    <div class="paso"> 
                                        <h3 class="texto-paso">Postulacion a programa</h3> 
                                    </div> 
                                </li> 
                                <li class="li-paso "> 
                                    <div class="paso"> 
                                        <h3 class="texto-paso">Revision de postulacion</h3> 
                                    </div> 
                                </li> 
                                <li class="li-paso"> 
                                    <div class="paso"> 
                                        <h3 class="texto-paso">Aceptacion en programa</h3> 
                                    </div> 
                                </li> 
                                <li class="li-paso"> 
                                    <div class="paso"> 
                                        <h3 class="texto-paso">Primer reporte</h3> 
                                    </div> 
                                </li>
                                <li class="li-paso"> 
                                    <div class="paso"> 
                                        <h3 class="texto-paso">Reporte final</h3> 
                                    </div> 
                                </li> 
                                <li> 
                                    <div class="paso"> 
                                        <h3 class="texto-paso">Finalizacion</h3> 
                                    </div> 
                                </li>  
                            </ul> 
                        </div> 
                    </div> 
            </div> 
        </div>
</body>
</html>l


    
    