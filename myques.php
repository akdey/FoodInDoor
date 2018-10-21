<?php
	include 'header.php';
	include 'connect.php';
	$userid = $_SESSION['user_id'];
?>


		<?php
			$qry = mysqli_query($con,"SELECT * FROM topics WHERE topic_by='$userid' ORDER BY topic_id DESC");
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



<?php
include 'footer.php';
?>