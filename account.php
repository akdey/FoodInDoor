<?php 
include 'header.php';
include 'connect.php';
$userid = $_SESSION['user_id'];
?>
<body style="background-color: white;">
<div class="whole-wrapper">

	<div class="wrapper-page-fraction">

		<div class="fraction-page-top">

			<div class="user-details">
				<div class="user-dp"><img src="img/user.png"></div>
				<div class="user-basic">
					<div class="prfl-usr-nm">
						<span class="prfl-usr-fnm"><?php echo $_SESSION['fname'];?></span>
						<span class="prfl-usr-lnm"><?php echo $_SESSION['lname'];?></span>
					</div>
					<div class="prsnl-info">
						<div class="prfl-usrnm"><?php echo $_SESSION['username'];?></div>
						<div class="prfl-email"><?php echo $_SESSION['email'];?></div>
						<div class="prfl-phno"><?php echo $_SESSION['phno'];?></div>
					</div>
				</div>
			</div>

				<hr>
		</div>

		<div class="fraction-page-bottom">
			
			<div class="pg-frctn-ri8">
				<div id="prfl-feed-ans">
					<?php
						$rbqry = mysqli_query($con,"SELECT * FROM replies WHERE reply_by='$userid'");
						$noans = mysqli_num_rows($rbqry);
					?>
					<h3><?php echo "$noans"; ?>&nbsp;Answers</h3>

					<hr>

					<?php
						while($resrb = mysqli_fetch_assoc($rbqry)){
							$replyid = $resrb['reply_topic'];
					$qry = mysqli_query($con,"SELECT * FROM topics WHERE topic_id='$replyid' ORDER BY topic_id DESC");
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
						<div class="cmnts-done-wrapper">
							<?php while($resrply = mysqli_fetch_assoc($rplyqry)){ ?>
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
							<?php }} ?>
						</div>
						
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

				<div id="prfl-feed-ques">

					<?php
					$qry = mysqli_query($con,"SELECT * FROM topics WHERE topic_by='$userid' ORDER BY topic_id DESC");
					$noques = mysqli_num_rows($qry);
					?>

					<h3><?php echo "$noques"; ?>&nbsp;Questions</h3>

					<hr>

					<?php
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
								<span class="post-dismiss"><i class="fa fa-trash"></i></span>
							</div>
							<div class="feed-post-ques">
								<?php echo $res['topic_subject']; ?>
							</div>
							<div class="feed-post-by">
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
					<?php }
					?>
				</div>

				<div id="prfl-feed-actv">
					<h3>Activity</h3>

					<hr>
				</div>

				<div id="prfl-feed-stng">
					<h3>Settings</h3>

					<hr>

					<div class="prfl-stng">
						<div class="stng-pass-chng">
							<div class="pass-chng-hder" onclick="shwchngpas()">Change Password</div>
							<div class="pass-chng-bdy" id="pass-chng-body">
								<form method="POST">
									<div class="pas-chng-crnt">
										<input type="text" name="pass-chng-crnt" placeholder="Current Password">
									</div>
									<div class="pas-chng-nwpas">
										<input type="text" name="pass-chng-nwpas" placeholder="New Password">
									</div>
									<div class="pas-chng-retyp">
										<input type="text" name="pass-chng-retyp" placeholder="Retype Password">
									</div>
									<input type="submit" name="chng-pass-sub" value="Submit">
								</form>
							</div>
						</div>

						<div class="logout"><form method="POST"><input type="submit" name="logout-btn" value="Log Out"></form>
							<?php 
								if(isset($_POST['logout-btn'])){
									session_destroy();
									echo "<script>window.location.href='register.php'</script>";
								}
							?>
						</div>					
					</div>
				</div>

			</div>

			<div class="pg-frctn-lft">
				<h3>Feed</h3>	<hr>
				<ul>
					<li onclick="prflans()">Answers &nbsp;<?php echo "$noans"; ?> </li>
					<li onclick="prflques()">Questions&nbsp;<?php echo "$noques"; ?> </li>
					<li onclick="prflactv()">Activity </li>
					<li onclick="prflsetng()"> Settings </li>
				</ul>
			</div>

		</div>

	</div>

	<div class="wrapper-page-side">
		<div class="side-page-top">
			<?php 
				$reptopqry = mysqli_query($con,"SELECT * FROM replies WHERE reply_by='$userid'");
				$catid[0]=0;
				while($resreptop = mysqli_fetch_assoc($reptopqry)){
					$reptop = $resreptop['reply_topic'];
					$topcataqry = mysqli_query($con,"SELECT * FROM topics WHERE topic_id='$reptop'");
					while($restopcat = mysqli_fetch_assoc($topcataqry)){ 
						if(!in_array($restopcat['topic_cat'], $catid)){ 
						$catid[] = $restopcat['topic_cat'];
						}	
					}
				}
				$nocat =count($catid);

			?>
			<h3>Knows about &nbsp;<?php echo $nocat-1; ?></h3>	<hr>
			<ul>
			<?php 
				for($i=1; $i<$nocat; $i++){
					$cata_id = $catid[$i];
					$catnmqry = mysqli_query($con,"SELECT * from categories where cat_id='$cata_id'");
					while($rescatnm = mysqli_fetch_assoc($catnmqry)){
						echo "<li>".$rescatnm['cat_name']."</li>";
					}
				}
			?>
			</ul>
		</div>
		
	</div>
	
</div>
<body>
<?php 
include 'footer.php';
?>