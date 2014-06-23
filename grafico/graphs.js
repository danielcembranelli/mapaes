/*
 +-------------------------------------------------------------------+
 |                       H T M L - G R A P H S                       |
 |                                                                   |
 | Copyright Gerd Tentler                   info@gerd-tentler.de     |
 | Created 17/09/2002                       Last Modified 10/04/2003 |
 +-------------------------------------------------------------------+
 | This program may be used and hosted free of charge by anyone for  |
 | personal purpose as long as this copyright notice remains intact. |
 |                                                                   |
 | Obtain permission before selling the code for this program or     |
 | hosting this software on a commercial website or redistributing   |
 | this software over the Internet or in any other medium. In all    |
 | cases copyright must remain intact.    			     |
 | Downloaded at Webmasters Online (http://www.wmonline.com.br)      |
 +-------------------------------------------------------------------+
*/
//======================================================================================================
// Parameters:
//
// - graph type ("hBar", "vBar", "pBar")
// - values (comma-separated)
// - labels (comma-separated)
// - bar color (comma-separated)
// - hBar/vBar: label color; pBar: background color
// - show values (1 = yes, 0 = no)
// - hBar/vBar: legend items (comma-separated)
//
// Returns HTML code
//======================================================================================================

function bar_graph(type, values, labels, bColor, lColor, showVal, legend) {
  showVal = parseInt(showVal);
  var colors = new Array('#0000FF', '#FF0000', '#00E000', '#A0A0FF', '#FFA0A0', '#00A000');
  var d = values.split(',');
  var r = labels ? labels.split(',') : new Array();
  var label = graph = '';
  var percent = 0;
  var drf = bColor ? bColor.split(',') : new Array();
  var drw = new Array();
  var val = new Array();
  var bc = new Array();
  if(lColor) lColor = lColor.replace(/\s+/, '');
  if(!lColor) lColor = '#C0E0FF';

  for(var i = sum = max = 0; i < d.length; i++) {
    drw = d[i].split(';');
    val[i] = new Array();
    for(var j = cnt = 0; j < drw.length; j++) {
      val[i][j] = parseFloat(drw[j]);
      sum += val[i][j];
      if(val[i][j] > max) max = val[i][j];
      if(!bc[j]) {
        if(cnt >= colors.length) cnt = 0;
        bc[j] = (!drf[j] || drf[j].length < 3) ? colors[cnt++] : drf[j];
      }
    }
  }
  var mDiv = sum ? Math.round(max * 100 / sum) : 0;
  var mul = mDiv ? 100 / mDiv : 1;
  type = type.toLowerCase();

  if(legend && type != 'pbar') graph += '<table border=0 cellspacing=0 cellpadding=0><tr valign=top><td>';
  graph += '<table border=0 cellspacing=2 cellpadding=0>';

  if(type == 'hbar') {
    for(i = 0; i < d.length; i++) {
      label = r[i] ? r[i] : i+1;
      graph += '<tr><td rowspan=' + val[i].length + ' bgcolor=' + lColor + ' align=center>' + label + '</td>';

      for(j = 0; j < val[i].length; j++) {
        percent = sum ? Math.round(val[i][j] * 100 / sum) : 0;
        if(j) graph += '<tr>';
        if(showVal) graph += '<td bgcolor=' + lColor + ' align=right>' + val[i][j] + '</td>';

        graph += '<td><table border=0 cellspacing=0 cellpadding=0><tr>';

        if(percent) {
          graph += '<td bgcolor=' + bc[j] + ' width=' + Math.round(percent * mul) + '>&nbsp;</td>';
        }
        graph += '<td>&nbsp;' + percent + '%</td>' +
                    '</tr></table></td>' +
                    '</tr>';
      }
    }
  }
  else if(type == 'vbar') {
    graph += '<tr align=center valign=bottom> ';
    for(i = 0; i < d.length; i++) {

      for(j = 0; j < val[i].length; j++) {
        percent = sum ? Math.round(val[i][j] * 100 / sum) : 0;
        graph += '<td><table border=0 cellspacing=0 cellpadding=0 width=30 align=center>' +
                    '<tr align=center valign=bottom>' +
                    '<td>' + percent + '%</td>';
        if(percent) {
          graph += '</tr><tr align=center valign=bottom>' +
                      '<td bgcolor=' + bc[j] + ' width=25 height=' + Math.round(percent * mul) + '>' +
                      (document.layers ? '&nbsp;' : '') + '</td>';
        }
        graph += '</tr></table></td>';
      }
    }
    if(showVal) {
      graph += '</tr><tr align=center>';
      for(i = 0; i < d.length; i++) {
        for(j = 0; j < val[i].length; j++) {
          graph += '<td bgcolor=' + lColor + '>' + val[i][j] + '</td>';
        }
      }
    }
    graph += '</tr><tr align=center>';
    for(i = 0; i < d.length; i++) {
      label = r[i] ? r[i] : i+1;
      graph += '<td colspan=' + val[i].length + ' bgcolor=' + lColor + '>' + label + '</td>';
    }
    graph += '</tr>';
  }
  else if(type == 'pbar') {
    for(i = 0; i < d.length; i++) {
      label = r[i] ? r[i] : '';
      graph += '<tr><td align=right>' + label + '</td>';

      sum = val[i][1];
      percent = sum ? Math.round(val[i][0] * 100 / sum) : 0;
      if(showVal) graph += '<td bgcolor=' + lColor + ' align=right>' + val[i][0] + ' / ' + sum + '</td>';

      graph += '<td width=200 bgcolor=' + lColor + '>';
      graph += '<table border=0 cellspacing=0 cellpadding=0><tr>';

      if(percent) {
        bColor = drf[i] ? drf[i] : colors[0];
        graph += '<td bgcolor=' + bColor + ' width=' + Math.round(percent * 2) + '>&nbsp;</td>';
      }
      graph += '</tr></table></td>' +
               '<td>&nbsp;' + percent + '%</td>' +
               '</tr>';
    }
  }
  graph += '</table>';

  if(legend && type != 'pbar') {
    graph += '</td><td width=10>&nbsp;</td><td>';
    graph += '<table border=0 cellspacing=0 cellpadding=1><tr><td bgcolor=#808080>';
    graph += '<table border=0 cellspacing=0 cellpadding=0><tr><td bgcolor=#F8F0F8>';
    graph += '<table border=0 cellspacing=4 cellpadding=0>';
    var l = legend.split(',');
    for(i = 0; i < bc.length; i++) {
      graph += '<tr>';
      graph += '<td bgcolor=' + bc[i] + ' nowrap>&nbsp;&nbsp;&nbsp;</td>';
      graph += '<td nowrap>' + (l[i] ? l[i] : '') + '</td>';
      graph += '</tr>';
    }
    graph += '</table></td></tr></table></td></tr></table>';
    graph += '</td></tr></table>';
  }
  if(document.layers) graph += '<span>';

  return graph;
}
