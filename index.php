<?php
include 'header.php';
include 'connect.php';


/*
;
$_SESSION["user_id"]="2";*/
if($_SESSION["user_id"]==0){
	echo "<script>window.location.href='register.php'</script>";
}
?>

	<center>
	<div class="page-wrapper" >
		<div>
			<div id="fullscrnask" class="fullscrnask">
			  <span class="closebtn" onclick="closeask()">×</span>
			  <div class="overlay-ask">
			    <form class="formask" method="POST">
			      <textarea type="textarea" class="askques" placeholder="Ask Your question.." name="askques" required></textarea>
			      <select required name="sel-cat" id="sel-cat">
			      	<option value="0">Select a catagory</option>
			      		<?php 
			      			$slctqry = mysqli_query($con,"SELECT * FROM categories ORDER BY cat_name ASC");
			      			while($reslctqry = mysqli_fetch_assoc($slctqry)){ ?>
			      				<option value="<?php echo $reslctqry['cat_id']; ?>"><?php echo $reslctqry['cat_name']; ?></option>
			      		<?php	}
			      		?>
			      	<option>Add category..(later karenge)</option>
			      </select>
			      <div class="asksub"><input type="submit" value="Submit" name="form-ask-sub" onclick="formasksub()"></div>
			    </form>
			  </div>
			</div>

			<?php

				if(isset($_POST['form-ask-sub'])){
					$askqus = $_POST['askques'];
					$userid = $_SESSION['user_id'];
					$seltcat = $_POST['sel-cat'];
					$querry = mysqli_query($con,"INSERT INTO topics (topic_subject,topic_cat,topic_by,topic_date) VALUES ('$askqus','$seltcat','$userid',now())");
				}

			?>

			<div class="asklbl">
				<div class="userwithname"><i class="fa fa-user-circle"></i>&nbsp;<?php echo $_SESSION['fname']; ?></div>
				<div>
					<p class="ask-lbl-space" onclick="openfullscrnask()"><b>Ask your question...</b> </p>
				</div>
			</div>
		</div>

		<?php
			$qry = mysqli_query($con,"SELECT * FROM topics ORDER BY topic_id DESC");
			while($res = mysqli_fetch_assoc($qry)){?>


		<div class="feed-post" id="feed-post">
			<div class="feed-post-cat">
				<span class="post-cat-name">
					<?php
						$top_cat = $res['topic_cat'];
						$topcat = mysqli_query($con,"SELECT * FROM categories WHERE cat_id ='$top_cat'");
						while($restopcat = mysqli_fetch_assoc($topcat)){
							echo $restopcat['cat_name'];
						}
					?>
				</span>
				<span class="post-dismiss" onclick="closefeed()">×</span>
			</div>
			<div class="feed-post-ques">
				<?php echo $res['topic_subject']; ?>
			</div>
			<div class="feed-post-by">
				<span class="fa fa-user"></span>
				<span class="post-by-name">
					<?php
						$pstby = $res['topic_by'];
						$pstby =mysqli_query($con,"SELECT * FROM users WHERE user_id ='$pstby'");
						while($respstby = mysqli_fetch_assoc($pstby)){
							echo $respstby['user_name'];
						}
					?>						
				</span>
				<span class="dot">&emsp;&bull;&emsp;</span>
				<span class="post-date">Shared on <?php echo $res['topic_date']; ?></span>
			</div>
			<!-- if there is an cmnt-->
			<?php 
				$topicid = $res['topic_id'];
				$rplysql = "SELECT * FROM replies WHERE reply_topic='$topicid'";
				$rplyqry = mysqli_query($con,$rplysql);
				$cmntcount = mysqli_num_rows($rplyqry);
				?>
			<div class="post-like">
				<span class="pl fa fa-thumbs-up">25</span>
				<span class="pl fa fa-thumbs-down">5</span>
				<span class="pl fa fa-comments"><?php echo $cmntcount; ?></span>
			</div>
			<!-- if there is comment display it-->
			<?php while($resrply = mysqli_fetch_assoc($rplyqry)){ ?>
			<div class="cmnts-done-wrapper">
				<div class="cmnt-done">		
					<div class="name-cmnter"><i class="fa fa-user"></i>
						<?php
							$rplyusr = $resrply['reply_by'];
							$rplyby = mysqli_query($con,"SELECT * FROM users WHERE user_id='$rplyusr'");
							while($resrplyby = mysqli_fetch_assoc($rplyby)){
							echo $resrplyby['user_name'];
							}
						?>
					</div>
					<div class="cmnter-cntnt"><?php echo $resrply['reply_content']; ?></div>		
				</div>
			</div>
			<?php } ?>

			<div class="post-cmnt-section">
					<span class="my-icon"><i class="fa fa-user-circle"></i></span>
					<span class="cmnt-box">
							<input type="text" placeholder="Add your commnet.." class="cmnt-place">
							<button type="submit" class="cmnt-reply-btn">Comment</button>
					</span>
			</div>
		</div>

		<?php	}
		?>


	</div>
	</center>
	




<?php
include'footer.php';
?>
