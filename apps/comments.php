<?php
// apps/articles.php
$query = "SELECT * FROM comments LEFT JOIN users ON users.id=comments.id_user WHERE id_article='".$article['id']."' LIMIT 0, 30 ";
$resultatComment = mysqli_query($database, $query);
	while($comment = mysqli_fetch_assoc($resultatComment))
	{
		require('views/comment.phtml');
	}
	?> 