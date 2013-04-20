<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>-->
<?php 

         $app_id = "364672670307807";

         $canvas_page = "http://apps.facebook.com/event_plan";

         $message = "Simplifies choosing a time and date for your event!";

         $feed_url = "https://www.facebook.com/dialog/feed?app_id=" 
                . $app_id . "&redirect_uri=" . urlencode($canvas_page)
                . "&message=" . $message;

         if (empty($_REQUEST["post_id"])) {
            echo("<script> top.location.href='" . $feed_url . "'</script>");
         } else {
            echo ("Feed Post Id: " . $_REQUEST["post_id"]);
         }
?>