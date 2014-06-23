         if (document.images) {
             bthomeon = new Image();
             bthomeon.src =  "temas/imagens/bthomeon.gif";
             btclienteson = new Image();
             btclienteson.src =  "temas/imagens/btclienteson.gif";
             btplanoson = new Image();
             btplanoson.src =  "temas/imagens/btplanoson.gif";
             btcobrancason = new Image();
             btcobrancason.src =  "temas/imagens/btcobrancason.gif";
             btadminon = new Image();
             btadminon.src =  "temas/imagens/btadminon.gif";
             btrelatorioson = new Image();
             btrelatorioson.src =  "temas/imagens/btrelatorioson.gif";
             btdesconectaron = new Image();
             btdesconectaron.src =  "temas/imagens/btdesconectaron.gif";

             bthomeoff = new Image();
             bthomeoff.src =  "temas/imagens/bthomeoff.gif";
             btclientesoff = new Image();
             btclientesoff.src =  "temas/imagens/btclientesoff.gif";
             btplanosoff = new Image();
             btplanosoff.src =  "temas/imagens/btplanosoff.gif";
             btcobrancasoff = new Image();
             btcobrancasoff.src =  "temas/imagens/btcobrancasoff.gif";
             btadminoff = new Image();
             btadminoff.src =  "temas/imagens/btadminoff.gif";
             btrelatoriosoff = new Image();
             btrelatoriosoff.src =  "temas/imagens/btrelatoriosoff.gif";
             btdesconectaroff = new Image();
             btdesconectaroff.src =  "temas/imagens/btdesconectaroff.gif";
         }

         function ShowHide(imgDocID,imgObjName) {
                  if (document.images)
                      document.images[imgDocID].src = eval(imgObjName + ".src")
         }
         function MM_openBrWindow(theURL,winName,features) { //v2.0
                  window.open(theURL,winName,features);
         }

         function MM_reloadPage(init) {  //reloads the window if Nav4 resized
           if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
             document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
           else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
         }

         MM_reloadPage(true);