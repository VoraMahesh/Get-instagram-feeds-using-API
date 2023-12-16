<?php

/*instagram feeds using API*/
   
$fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
$token = "YOUR ACCESS TOKEN";
$json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}";
$json_feed = @file_get_contents($json_feed_url);
$contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);

  foreach($contents["data"] as $post){ 
	 $username = isset($post["username"]) ? $post["username"] : "";
	 $caption = isset($post["caption"]) ? $post["caption"] : "";
	 $caption = substr($caption, 0, 300);
	 $media_url = isset($post["media_url"]) ? $post["media_url"] : "";
	 $permalink = isset($post["permalink"]) ? $post["permalink"] : "";
	 $media_type = isset($post["media_type"]) ? $post["media_type"] : "";  
	 
	 ?>
	 <div class="insta-feed"> 
		<div>
			<?php 
			if($media_type=="VIDEO"){
				echo "<video controls style='width:100%; display: block !important;'><source src='{$media_url}' type='video/mp4'></video>";
			}else{
				echo "<a href='{$permalink}' target='_blank'><img src='{$media_url}' /></a>";
			}
			?>
		</div>
		<a href='<?php echo $permalink; ?>' target='_blank' class="instadesc">
		<div class="text">
			<div><strong>@<?php echo $username; ?></strong> <?php echo $caption; ?></div>
			<div class='ig_view_link'><a href='<?php echo $permalink; ?>' target='_blank'>View on Instagram</a></div>
		</div>
		</a>    
	</div>
	<?php

}

       
                
               