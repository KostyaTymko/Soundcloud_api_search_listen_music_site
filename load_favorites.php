
<?php
	foreach($_SESSION['fav'] as $id=>$quantity)
	{
		foreach($quantity as $key => $value)
		{
		?>
			<script>
            var t=document.getElementById(this.id);
            var newDivF = document.createElement('div');
            newDivF.innerHTML='&emsp;delete';
            newDivF.style.display='inline-block';
            newDivF.style.color='red';
            newDivF.id='<?php echo $key; ?>';
            /*newDivF.class='<?php echo $key; ?>';*/
            var newBr2 = document.createElement('br');

	        var newLiF = document.createElement('li');           
            newLiF.innerHTML='<?php echo $value; ?>';
            newLiF.id='<?php echo $key; ?>';
            var temp='<?php echo $key; ?>';
            newLiF.addEventListener('click', function()
              { 
                SC.oEmbed(this.id, {auto_play: true,element: document.getElementById('putTheWidgetHere')});
              });
            favorit.appendChild(newLiF);
            favorit.appendChild(newDivF);
            favorit.appendChild(newBr2);
            newDivF.addEventListener('click', function()
             {
              DelFavoriteFromSession2(this.id);
             });

			function DelFavoriteFromSession2(str) {
			    if (str.length == 0) { 
			        /*document.getElementById("txtHint").innerHTML = "";*/
			        return;
			    } else {

			        var xmlhttp = new XMLHttpRequest();
			        xmlhttp.onreadystatechange = function() {
			            if (this.readyState == 4 && this.status == 200) {
			               /* document.getElementById("txtHint").innerHTML = this.responseText;*/
			            }
			        };
			        xmlhttp.open("GET", "getfav.php?p=" + str, true);
			        xmlhttp.send();

			        var elem=document.getElementById(str);
			        elem.parentNode.removeChild(elem);
			        var elem2=document.getElementById(str);
			        elem2.parentNode.removeChild(elem2);

			    }
			}
			</script>
		<?php
		}
	}
?>



