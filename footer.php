

	</div>	<!--content closed-->
<script>

	/*script for FULL SCREEN ASK QUESTION*/
	function openfullscrnask() {
    document.getElementById("fullscrnask").style.display = "block";
	}
	function closeask() {
    document.getElementById("fullscrnask").style.display = "none";
	}

	/*alert for select a catagory*/
	function formasksub(){
		var slct = document.getElementById("sel-cat").value;
		if(slct == 0){
			alert('please select a category');
		}
	}

	/*script for feed post to close*/
	function closefeed(){
		document.getElementById("feed-post").style.display = "none";
	}

	/* add remove active class*/
	function myquesactive(){
		var qstcls = document.getElementById("myquest");
		var hmcls = document.getElementById("home");
		qstcls.classList.add("activecls");
		hmcls.classList.remove("activecls");
	}


	/*AJAX for commnets 
	$('#cmnt-rply-btn').click(function(){		
		$.ajax({
			url:"ajaxcode.php",
			method:"POST",
			data:$('#cmnt-plc').value(),
			success:function(data)
			{
				alert(data);
			}
		});
	});*/

	/*profile/account options */
	/*
	var feedans = document.getElementById("prfl-feed-ans");
		var feedques = document.getElementById("prfl-feed-ques");
		var feedactv = document.getElementById("prfl-feed-actv");
		var feedstng = document.getElementById("prfl-feed-stng");*/
	function prflans(){
		document.getElementById("prfl-feed-ans").style.display="block";
		document.getElementById("prfl-feed-ques").style.display="none";
		document.getElementById("prfl-feed-actv").style.display="none";
		document.getElementById("prfl-feed-stng").style.display="none";
	}
	function prflques(){
		document.getElementById("prfl-feed-ans").style.display="none";
		document.getElementById("prfl-feed-ques").style.display="block";
		document.getElementById("prfl-feed-actv").style.display="none";
		document.getElementById("prfl-feed-stng").style.display="none";
	}
	function prflactv(){
		document.getElementById("prfl-feed-ans").style.display="none";
		document.getElementById("prfl-feed-ques").style.display="none";
		document.getElementById("prfl-feed-actv").style.display="block";
		document.getElementById("prfl-feed-stng").style.display="none";
	}
	function prflsetng(){
		document.getElementById("prfl-feed-ans").style.display="none";
		document.getElementById("prfl-feed-ques").style.display="none";
		document.getElementById("prfl-feed-actv").style.display="none";
		document.getElementById("prfl-feed-stng").style.display="block";
	}

	/*change password menu show*/
	function shwchngpas(){
		document.getElementById("pass-chng-body").style.display="block";
	}
</script>
</body>
</html>