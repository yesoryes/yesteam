<?php
	//To check 
	if($pager->numPages>1)
	{
		//Page length for display
		$paging_length = 5;
		
		//Pagnation header
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td width="58%"><div><span class="blue"><strong>'.$total.'</strong></span><strong> '.($paging_detail==''?'Records':$paging_detail).' - <span class="blue"> page '.$page.'/'.$pager->numPages.' </span></strong></div></td>
		<td width="42%" align="right"><table width="80%" border="0" align="right" cellpadding="0" cellspacing="0">
		<tr>
		<td><div id="paginate-bottom" style="float:right"><div class="pagination"><ul>';
		
		//Condition to display First and Previous link
		if($page != 1)
		{
			//Condition for total number of page is greater than page length for display
			if($pager->numPages > $paging_length)
			{    
				//To display first link
				echo '<li><a class="prevnext" href="'.$redirect_page.'?page=1'.$querystring.'" rel="1">First</a></li>';
			}
			//Condition to display previous page link
			if($page>1)
			{
				//To diaplay previous page link
				echo '<li><a class="prevnext" href="'.$redirect_page.'?page='.($page - 1).$querystring.'" rel="1">Previous &laquo;</a></li>';
			}
		}//End of first condition
		
		//Condition for total number of page is greater than page length for display
		if($pager->numPages > $paging_length)
		{
			//Condition for first page to set the paging length
			if($page == 1)
			{
				$startpage = 1;
				$endpage = $paging_length;
			}
			//Condition for last page of display to set the paging length
			else if($page == $pager->numPages)
			{
				$startpage = $page-$paging_length; 
				$endpage = $pager->numPages;
			}
			//Condition for last page to display according to the page length
			else if(($pager->numPages - $page) < $paging_length)
			{
				$startpage = $page-(($paging_length)-($pager->numPages - $page));
				$endpage = $pager->numPages;
			}
			//Condition for total pages less than display paging length
			else if($page < $paging_length)
			{
				$startpage = 1;
				$endpage = $paging_length;
			}
			else
			{
				$startpage = $page-(round($paging_length/2));
				$endpage = ($paging_length-1)+$startpage;
			}
			
			//To display pagination links
			for ($k = $startpage; $k <= $endpage; $k++) 
			{ 
				if ($k == $pager->page)
				{ 
					echo '<li><a class="currentpage" href="#list" rel="'.$k.'">'.$k.'</a></li>';
				}
				else
				{	 
					echo '<li><a href="'.$redirect_page.'?page='.$k.$querystring.'" rel="'.$k.'">'.$k.'</a></li>';
				}
			} 
		}
		else
		{
			for ($k = 1; $k <= $pager->numPages; $k++) 
			{ 
				if ($k == $pager->page)
				{ 
					echo '<li><a class="currentpage" href="#list" rel="'.$k.'">'.$k.'</a></li>';
				}
				else
				{	 
					echo '<li><a href="'.$redirect_page.'?page='.$k.$querystring.'" rel="'.$k.'">'.$k.'</a></li>';
				}
			}
		}//End of condition two
		
		//Condition to display Next and Last link
		if($page != $pager->numPages)
		{
			echo '<li><a class="prevnext" href="'.$redirect_page.'?page='.($page + 1).$querystring.'" rel="3">next &raquo;</a>';
			
			//Condition for total number of page is greater than page length for display
			if($pager->numPages > $paging_length)
			{
				echo '<li><a class="prevnext" href="'.$redirect_page.'?page='.($pager->numPages).$querystring.'" rel="3">Last </a>';
			}
		}
		
		//pagination footer
		echo '</ul></div></div></td>
		</tr>
		</table>
		</td>
		</tr>
		</table>';
	}
?>