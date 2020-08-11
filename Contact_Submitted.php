<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/><meta name='keywords' content='Roslin Institute' /><meta name='description' content='' /><title>The iTEAM</title><link href='styles.css' rel='stylesheet' type='text/css'/><link rel='shortcut icon' href='favicon.ico' type='image/x-icon' /><link rel='icon' href='favicon.ico' type='image/x-icon' /><script type= "text/javascript"> function ById(su){ return document.getElementById(su);} </script><script type= "text/javascript"> var ie; if(navigator.appName.substring(0,9) != "Microsoft") ie = 0; else ie = 1; </script></head><body style = 'margin: 0 0 0 0; background:#ffffff; font-size:14px; LINE-HEIGHT: 145%; color:#663333;  text-align:center;' onload = '; ' onunload = '; ' onresize = '; ' ><div  style = "width:870px; margin-right:auto; margin-left:auto; border:0px; padding:0px; background-color:#ffffff; text-align:left; "><div id="pageheader"><div  style = "float:right; margin:7px; margin-top:4px; margin-right:11px;">
  </div>


<img width=721 height=39 src="iteamlogo5.png" style="margin:0px; padding:0px; margin-left:10px; margin-top:15px; margin-bottom:10px;"/>
<div style = "width:10px; height:2px; background:#ffffff;"></div></div><div id = "menu" style = "float:left; width:130px; margin:0px; padding:0px; padding-left:0px; padding-right:0px; padding-top:0px; background:#ffffff; overflow:hidden;"><div style="height:30px; width:1px;"></div><a href="index.html"><div style="margin-left:7px;"><img width=10 height=9 src="Picsite/arrow.gif" style="position:relative; top:6px; float:left; border:0px;" /> <div style="margin-left:15px;">Home</div></div></a><a href="BICI.html"><div style="margin-left:7px;"><img width=10 height=9 src="Picsite/arrow.gif" style="position:relative; top:6px; float:left; border:0px;" /> <div style="margin-left:15px;">BICI</div></div></a><a href="SIRE.html"><div style="margin-left:7px;"><img width=10 height=9 src="Picsite/arrow.gif" style="position:relative; top:6px; float:left; border:0px;" /> <div style="margin-left:15px;">SIRE</div></div></a><a href="PAC.html"><div style="margin-left:7px;"><img width=10 height=9 src="Picsite/arrow.gif" style="position:relative; top:6px; float:left; border:0px;" /> <div style="margin-left:15px;">PAC</div></div></a><span id = "notselected2"><a href="Contact.html"><div style="margin-left:7px;"><img width=10 height=9 src="Picsite/arrow.gif" style="position:relative; top:6px; float:left; border:0px;" /> <div style="margin-left:15px;">Contact</div></div></a></span><div style="margin-left:10px;; background:#ffffff;"></div><div style="background:#ffffff;"></div></div><div style="background:#f0f0ff; margin:0px; padding:0px; margin-left:130px;"><div style="float:left; width:25px; height:19px; margin:0px; padding:0px; border:0px;"> <img width=25 height=19 src="Picsite/curveul.gif" style="margin:0px; padding:0px; border:0px;"/></div><div style="float:right; width:25px; height:19px; margin:0px; padding:0px; border:0px;"> <img width=25 height=19 src="Picsite/curveur.gif" style="margin:0px; padding:0px; border:0px;"/></div><div style="position:relative; top:10px; left:5px; height:10px; text-align:right;"><span id='breadcrumb'><a href='index.html'>Home</a> > <a href='Contact.html'>Contact</a> > Submitted</span></div><div id = "rightme" style = "float:right; width:-1px;  margin:0px; padding:0px; padding-left:0px; padding-right:15px; padding-top:0px;"></div><div id = "mainte" style = " width:684px; margin:0px; padding:0px; padding-left:20px; padding-right:20px; padding-top:0px;"><h1>Submitted</h1><?php
//Function to decode URL's that contain Unicode characters
function unicode_urldecode($url)
{
  //split the URL into an array
  $url_array = split ("%",$url);
  //Make sure we have an array
  if (is_array($url_array))
  {
    //Loop while the key/value pair of the array
    //match our list items
    while (list ($k,$v) = each ($url_array))
    {
       //use base_convert to convert each character
       $ascii = base_convert ($v,16,10);
       $ret .= chr ($ascii);
    }
 }
 //return the decoded URL
 return ("$ret");
}

  function utf8_urldecode($str) {
    $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x1;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');;
  }

function checkEmail($email) {
  if(eregi("\r[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $email)){
    // if(preg_match("/\r( [a-zA-Z0-9] )+( [a-zA-Z0-9._-] )*@( [a-zA-Z0-9_-] )+( [a-zA-Z0-9._-] +)+$/" , $email)){
    list($username,$domain)=split('@',$email);
    if(!checkdnsrr($domain,'MX')) return false;
    else return true;
  }
  else return false;
}

   // $mess = unicode_urldecode($_GET['message']);
   $mess = $_GET['comments'];
 
   $email = $_GET['email_address'];

   $name = $_GET['name'];

   $message = "Dear ".$name.",**";   
   $message .= "Thank you very much for your comments!*";
   $message .= "I will get back to you as soon as possible.**";  
   $message .= "Warmest Regards,*";
   $message .= "Chris Pooley*";
   $message .= "(EAT)*";
   $tit = "EAT Comments";
   
   mail($email,$tit,$message,"From: anagha.joshi@roslin.ed.ac.uk","");
  
   $message = "The following comments were submitted to the MKODB website:**";
   $message .= "Name: ".$name."*";
   $message .= "Email: ".$email."*";
   $message .= "Comments:* ".$mess."**";
   
   mail("christopher.pooley@roslin.ed.ac.uk","EAT Comments",$message,"From: christopher.pooley@roslin.ed.ac.uk","");
?>

<p><b>Thank you very much for your comments.</b></p>
<p>We will reply as soon as possible.</p>
<div style="height:250px;"></div><div style = "height:1px; clear:right; " ></div></div><div style="width:600px; height:1px;"></div><div style="height:19px; backgroud:#f0f0ff;"><div style="float:left; width:25px; height:19px; margin:0px; padding:0px; border:0px;"><img width=25 height=19 src="Picsite/curvedl.gif" style="margin:0px; padding:0px; border:0px;"/></div><div style="float:right; width:25px; height:19px; margin:0px; padding:0px; border:0px;"> <img width=25 height=19 src="Picsite/curvedr.gif" style="margin:0px; padding:0px; border:0px;"/></div></div></div><div id="pagefooter"><div style = "height:10px; background:#ffffff;"></div>
<div style="background:#a4a3e6;">
<div style="float:left; width:14px; height:30px; margin:0px; padding:0px; border:0px;"><img width = 14 height=30 style="margin:0px; padding:0px; border:0px;" src="Picsite/endl.gif"/></div>
<div style="float:right; width:14px; height:30px; margin:0px; padding:0px; border:0px;"><img width = 14 height=30 style="margin:0px; padding:0px; border:0px;" src="Picsite/endr.gif"/></div>
<div style="height:30px; background-color:#a4a3e6; margin:0px; padding:0px; border:0px;">
<center>
<div style="font-size:15px; color:#ffffff; padding-top:4px;">
<font face="trebuchet ms, helvetica, georgia, courier, arial"> 
<b>© The iTEAM - 2020</b> 
</font>
</div>
</div>
</center>
<div id="quote" style = "visibility:hidden; position:absolute; width:0px; height:0px; left:0px; top:0px;"><a href="javascript:boxoff();"><img width=196 height=123 style="border:0px;" src="quote.gif"/></a></div>
</div>
<div style = "width:10px; height:10px; background:#ffffff;"></div>
</div></div></body></html>