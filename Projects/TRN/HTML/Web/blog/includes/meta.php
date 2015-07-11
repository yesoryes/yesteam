<?php
//Switch case to display the Pages
$pagename =  basename($_SERVER['PHP_SELF']);

switch($pagename)
{
	case "index.php":
		$meta_records 			   = get_meta_records('1');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;

	case "aboutkot.php":
		$meta_records 			   = get_meta_records('2');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "collab.php":
		$meta_records 			   = get_meta_records('3');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd1.php":
		$meta_records 			   = get_meta_records('7');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd2.php":
		$meta_records 			   = get_meta_records('8');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd3.php":
		$meta_records 			   = get_meta_records('9');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd4.php":
		$meta_records 			   = get_meta_records('10');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd5.php":
		$meta_records 			   = get_meta_records('11');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd6.php":
		$meta_records 			   = get_meta_records('12');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd7.php":
		$meta_records 			   = get_meta_records('13');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "SPProd8.php":
		$meta_records 			   = get_meta_records('14');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "contactus.php":
		$meta_records 			   = get_meta_records('15');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "product.php":
		$meta_records 			   = get_meta_records('16');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "admin.php":
		$meta_records 			   = get_meta_records('17');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;
	
	case "pptadmin.php":
		$meta_records 			   = get_meta_records('18');
		$title                     = striptext($meta_records['title']);
		$metakey                   = striptext($meta_records['meta_keyword']);
		$metadesc                  = striptext($meta_records['meta_description']);
		break;


	default:
		//DEFAULT
		$meta_details			   = get_meta_records_default();	
		$title                     = striptext($meta_details['site_title']);
		$metakey                   = striptext($meta_details['meta_keyword']);
		$metadesc                  = striptext($meta_details['meta_description']);
		break;
}
?>
<title><?php if(!empty($title)) { echo $title; } else { echo "A & D Solars"; }?></title>
<meta name="description" content="<?php if(!empty($metakey)) { echo $metakey; } else { echo "A & D Solars"; } ?>" />
<meta name="keywords" content="<?php if(!empty($metadesc)) { echo $metadesc; } else { echo "A & D Solars"; } ?>" />