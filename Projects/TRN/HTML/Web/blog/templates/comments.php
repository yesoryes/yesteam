<div class="sSBlogContent">
 <div class="sSBAccordCont">
	<div class="sSBAccordRow">
      <div class="sSBACHead"><a href="javascript:void(0)">
        <h1><?=$get_post_details[1]['title']?>
          ....</h1>
        </a>
      </div>
          <div class="sSBACIn">
          	<a href="<?=$upload_path.$get_post_details[1]['file_path']?>" title="<?=$get_post_details[1]['title']?>"  rel="lightbox-tour">
          		<img src="<?=$upload_thumb_path.$get_post_details[1]['file_path']?>" />
          	</a>
            <div align="justify"><?=$get_post_details[1]['description']?></div>
          </div>
        </div>
<?php 
	$i = 1; 
	while($list_details = mysql_fetch_assoc($get_list_details)) { ?>
	<div><?=$i.'. '.' '.$list_details['comment'];?>.</div><br /><br />
<?php $i++; } ?>
 </div>
</div>