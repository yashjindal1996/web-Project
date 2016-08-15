<?php  
include("connect.php");
$comment = $_REQUEST["q"];
$topic = $_SESSION["topic"];
$user = $_SESSION["login_user"];
$comment = trim($comment);
$comment = htmlspecialchars($comment);
	
$up = $conn->prepare("INSERT INTO topic_comment (topic, username, comment) VALUES('$topic', '$user' ,'$comment')");
$up->execute();


$count = $conn->prepare("SELECT COUNT(*) FROM topic_comment WHERE topic='$topic'");
		$count->execute();
		$result = $count->fetchColumn();
		
$comm = $conn->prepare("SELECT * FROM topic_comment WHERE topic='$topic' ORDER BY time DESC");
$comm->execute();

			echo '<tr>
				<td class="head">Comments('.$result.')</td>
			</tr>
			<div id="tablediv">';
					
					while($x = $comm->fetch())
					echo '<tr>
						<td>
							<div style="padding:5px;margin-left:40px;">
								<b>'.$x['username'].'</b><br>'.$x['comment'].'
							</div>
						</td>
					</tr>'; 
			echo "</div>";

?>