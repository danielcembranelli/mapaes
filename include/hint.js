  Xoffset= -100;    // modify these values to ...
  Yoffset=-25;    // change the popup position.
  var old,skn,iex=(document.all),yyy=-1000;
  var ns4=document.layers;
  var ns6=document.getElementById&&!document.all;
  var ie4=document.all;
	
  if (ns4)
    skn=document.dek;
  else if (ns6)
    skn=document.getElementById("dek").style;
  else if (ie4)
    skn=document.all.dek.style;
  if(ns4)document.captureEvents(Event.MOUSEMOVE);
  else
  {
    skn.visibility="visible";
    skn.display="none";
  }
  document.onmousemove=get_mouse;

  function popup_plus(msg)
  {
    if (msg == ' ')
    {
      // não faz nada se o parametro for um espaço em branco
    }
    else
    { 
      var line;
      var content="<TABLE WIDTH=100 CELLPADDING=2 CELLSPACING=0 "+"BGCOLOR=#D0EB28 BORDER=0><TD ALIGN=center><font class=font-11>"+msg+"</FONT></TD></TABLE>";
      // Conforme o tamanho da fonte e o tamanho da mensagem, o box é posicionado
      if((msg.search('class')!=-1) || ((msg.search('class')==-1) && (msg.length<28)))
      {
        if(msg.search('com negrito')!=-1)
        {
          Yoffset=-44;
        }
        else if(msg.search('style')!=-1)
        {
          Yoffset=-56;
        }
	else
	{ 
          Yoffset=-28;
        }
      }
      else 
      {
        line = Math.round(((msg.length-27)/28))+1;
        Yoffset=((18*line)+28)*(-1);
      }
      yyy=Yoffset;
      if(ns4){skn.document.write(content);skn.document.close();skn.visibility="visible";}
      if(ns6){document.getElementById("dek").innerHTML=content;skn.display='';}
      if(ie4){document.all("dek").innerHTML=content;skn.display='';}
    }
  }

  function get_mouse(e)
  {
    var x=(ns4||ns6)?e.pageX:event.x+document.body.scrollLeft;
    skn.left=x+Xoffset;
    var y=(ns4||ns6)?e.pageY:event.y+document.body.scrollTop;
    skn.top=y+yyy;
  }

  function kill()
  {
    yyy=-1000;
    if(ns4){skn.visibility="hidden";}
    else if (ns6||ie4)
    skn.display="none";
  }