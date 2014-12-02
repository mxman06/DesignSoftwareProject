/**
 * 
 * Mise à jour automatique de l'interface
 * 
 *
 * PHP versions 5
 * @author  SÈbastien Mosser
 * Adapté par M. Blay-Fornarino
 */
/** Config Parameters **/

var data_url = "apeldisplay.php";
var delta = 2;


/** Display Engine **/
function retrieve() {
    new Ajax.Request(data_url,{
		     method:'get',
		     onSuccess: function(msg){ 
			 xmlDoc = msg.responseXML;
			 data = xmlDoc.getElementsByTagName("info");
			 loop(data,0);
		     },
		     onFailure: function(){ alert('Unable to retrieve data!');},
		     onException: function(s,err) { alert('Error: '+err+'!');}
		    });
}

function loop(data, index) {
    if (index >= data.length) {
	// alert('end of data set');
	return retrieve();
    }
    item = data[index];
    display(item);
    window.setTimeout(function(){ loop(data,index+1); }, delta * 1800);
}

function display(information) {
    var titre = information.getElementsByTagName("titre")[0].textContent;
	var sport = information.getElementsByTagName("sport")[0].textContent;
    var content = information.getElementsByTagName("content")[0];
    var html = transform(titre, sport, content);
    $('main').update(html);
}

function transform(titre, sport, content) {
    var kind = getKind(content);
    var html = bindings[kind].call(this, content);
    var result = "<div id=\"contenu\"><ul><div id=\"titre\">" + titre + " pour : " + sport + "</div><hr><br />";
    result += html + "</div>";
    return result;
}

/** Information specific implementation **/

var bindings = new Array();
bindings["info"] = function(data) { 
       var result="<div id=\"info\">";
	   result += data.getElementsByTagName("texte")[0].textContent;
	   result += "</div>"
	   return result; }
bindings["news"] = function(data) { return data.textContent; }
//bindings["info"] = function(data) { return data.textContent; }
bindings["menu"] = function(data) {
    var result = "<div id=\"menu\"> Menu: <ul>";
    var starters = data.getElementsByTagName("starter");
    result += "<li>Starters: ";
    for(var i = 0; i < starters.length; i++)
	result += starters[i].textContent +", ";
    result += "</li>";
    // to do : other tags
    result += "</ul></div>";
    return result;
} 


/** ugly helper **/
function getKind(element) {
        for(var i = 0; i < element.attributes.length; i++) {
                if ("kind" == element.attributes[i].name)
                        return element.attributes[i].nodeValue;
        }
        return null;    
}

