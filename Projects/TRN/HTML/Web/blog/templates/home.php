<div class="sSBlogContent">
      <div class="sSBAccordCont">
<?php 
	$i = 0; 
	while($list_details = mysql_fetch_assoc($get_list_details)) { ?>
	<div class="sSBAccordRow">
      <div class="sSBACHead"><a href="javascript:void(0)">
        <h1><?=$list_details['title']?>
          ....</h1>
        </a>
      </div>
          <div class="sSBACIn" style="display:<?php echo $i==0?'block':'none';?>;"> 
          <a href="<?=$upload_path.$list_details['file_path']?>" title="<?=$list_details['title']?>"  rel="lightbox-tour">
          	<img src="<?=$upload_thumb_path.$list_details['file_path']?>" />
          </a>          
            <div align="justify"><?=$list_details['description']?></div>
            <div class="sSBAComm">
              <div class="sSBACTop">
                <ul>
                  <li><?php echo $list_details['comment_count'] > 0 ? '<a href="comments.php?post_id='.$list_details['id'].'">'.$list_details['comment_count'].' Comments</a>' : 'No Comments';?></li>
                  <li>|</li>
                  <li><a href="javascript:void(0)" class="ssBCommAnchor">Wanna comment?</a></li>
                </ul>
                <span>Posted at <?=date('d M Y', strtotime($list_details['date_created']))?></span> 
              </div>
              <div class="sSBACForm" style="display:none;">
              <form name="comment" method="post" action="comments.php"> 
                <div class="sSBACFRow">
                  <label> Name </label>
                  <input type="text" name="name" class="textBox name" />
                </div>
                <div class="sSBACFRow">
                  <label> Email ID </label>
                  <input type="text" name="email" class="textBox email" />
                </div>
                <div class="sSBACFRow">
                  <label> Comments </label>
                  <textarea name="comments" class="textArea comments"></textarea>
                </div>
                <div class="sSBACFRow">
                    <label>&nbsp;</label>
                    <input type="submit" value="Submit" class="sSBlogBut submit" />
                    <input type="hidden" name="post_id" value="<?=$list_details['id']?>" />
                    <input type="reset" value="Cancel" class="sSBlogBut" />
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
<?php $i++; } ?>
</div>
</div>
<?php

 $pager_links = '<ul>
        <li>';
		if($prev)
		{
			$pager_links .= '<a href="?page='.$prev.'">&laquo; Previous</a></li>';
		}
		else
		{
			$pager_links .= '&laquo; Previous';
		}
 $pager_links .= '
        <li>|</li>
        <li>';
		if($next)
		{
			$pager_links .= '<a href="?page='.$next.'">Next &raquo;</a></li>';
		}
		else
		{
			$pager_links .= 'Next &raquo;';
		}
 $pager_links .= '
		</li>
 </ul>';
 
?>

