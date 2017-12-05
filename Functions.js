/*    window.onload = function(){}*/

    //нажатие enter <input id="title" >
    function clickPress(e)
    {
      if (event.keyCode == 13) {
        Searching() ;
      }
    }
    //нажатие enter <button id="search">
    document.getElementById('search').addEventListener('click', Searching);
    //добавление обработчика на топ 100
    for (var i = 1; i < 101; i++)
    {
      document.getElementById(i+'top').addEventListener('click', function(event)
            {
              event.preventDefault();
              var t=document.getElementById(this.id);              
              var myRe = '^[0-9]*';
              var myArray = t.innerHTML;
              var number=(myArray.match(myRe))+'. ';
              var res = myArray.replace(number, "");
              document.getElementById('title').value=res; 
              Searching2(res);
            });
    }
    //поиск по содержимому 'title'
    function Searching() 
    {
      var fname = document.getElementById('title').value;
      MainSC(fname);
    }
    //поиск по названию
    function Searching2(trackName) 
    {
      var fname = trackName;
      MainSC(fname);
    }
    //авторизация, поиск,событие,воспроизведение Soundcloud
    function MainSC(fname)
    {
      var myList = document.getElementById('list');
      myList.innerHTML = '';
      var vidjet = document.getElementById('putTheWidgetHere');
      vidjet.innerHTML = '';

      SC.initialize
      ({
        client_id: 'e2a6681bccff23130855618e14c481af'
        /*client_id: '2t9loNQH90kzJcsFCODdigxfp325aq4z'*/
      }); 

      SC.get('/tracks', { q: fname, limit: 200 }).then(function(tracks)
      {
        for (var i = 0; i < tracks.length; i++) 
        {
          var newLi = document.createElement('li');
          var newDiv = document.createElement('div');
          var newBr = document.createElement('br');

          newDiv.innerHTML='&emsp;add to favorites';
          newDiv.id=tracks[i].uri;
          newDiv.class=tracks[i].title;
          newDiv.style.display='inline-block';
          newDiv.style.color='red';

          newLi.innerHTML =(i+1)+'. '+ tracks[i].title;
          newLi.className ='forInsert';
          newLi.id ='forInsert'+i;
          newLi.setAttribute('href', tracks[i].uri);
          newLi.style.display='inline-block';

          list.appendChild(newLi); 
          list.appendChild(newDiv); 
          list.appendChild(newBr); 

          newLi.addEventListener('click', function()
          { 
            SC.oEmbed(this.getAttribute("href"), {auto_play: true,element: document.getElementById('putTheWidgetHere')});
          });

          newDiv.addEventListener('click', function()
          { 
            var t=document.getElementById(this.id);
            var newDivF = document.createElement('div');
            newDivF.innerHTML='&emsp;delete';
            newDivF.style.display='inline-block';
            newDivF.style.color='red';
            newDivF.id=t.id;
            var newBr2 = document.createElement('br');
            var newLiF = document.createElement('li');           
            newLiF.innerHTML=t.class;
            newLiF.id=t.id;
            SendFavoriteToSession(t.id,t.class);
            newLiF.addEventListener('click', function()
              { 
                SC.oEmbed(this.id, {auto_play: true,element: document.getElementById('putTheWidgetHere')});
              });
           /* newLiF.style.display='inline-block';*/
            favorit.appendChild(newLiF);
            favorit.appendChild(newDivF);
            favorit.appendChild(newBr2); 
             newDivF.addEventListener('click', function()
             {
              DelFavoriteFromSession(t.id);
             });
          });
        }
      });
    }


function SendFavoriteToSession(str,str2) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                /*document.getElementById("txtHint").innerHTML = this.responseText;*/
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str +'&n='+str2, true);
        xmlhttp.send();
    }
}

function DelFavoriteFromSession(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                /*document.getElementById("txtHint").innerHTML = this.responseText;*/
            }
        };
        xmlhttp.open("GET", "getfav.php?p=" + str, true);
        xmlhttp.send();

        var elem=document.getElementById(str);
        elem.parentNode.removeChild(elem);
        var elem2=document.getElementById(str);
        elem2.parentNode.removeChild(elem2);
        var elem3=document.getElementById(str);
        elem3.parentNode.removeChild(elem3);

    }
}

