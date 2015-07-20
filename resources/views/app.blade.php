<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Computer Whiz - Canberra</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script type="text/javascript">
        function MM_swapImgRestore() { //v3.0
            var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
        }
        function MM_preloadImages() { //v3.0
            var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
        }

        function MM_findObj(n, d) { //v4.01
            var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
            if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
            if(!x && d.getElementById) x=d.getElementById(n); return x;
        }

        function MM_swapImage() { //v3.0
            var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
        }
    </script>
</head>

<body onload="MM_preloadImages('images/btn01r.jpg','images/btn03r.jpg','images/btn04r.jpg','images/btn05r.jpg')">
<div id="wrapper">
    <div id="header"></div>
    <div id="navigation">
        <div id="navigation_im"></div>
        <?php
        if (Request::segment(1) == '') $btn1 = 'r'; else $btn1 = '';
        if (Request::segment(1) == 'about') $btn2 = 'r'; else $btn2 = '';
        if (Request::segment(1) == 'services') $btn3 = 'r'; else $btn3 = '';
        if (Request::segment(1) == 'contact') $btn4 = 'r'; else $btn4 = '';
        if (Request::segment(1) == 'subscribe') $btn5 = 'r'; else $btn5 = '';
        ?>
        <div id="btn01">
            <a href="/" target="_self" onmouseover="MM_swapImage('Image8','','images/btn01r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="images/btn01{{ $btn1 }}.jpg" alt="home" name="Image8" width="85" height="34" border="0" id="Image8" />
            </a>
        </div>
        <div id="btn02">
            <a href="/about" target="_self" onmouseover="MM_swapImage('Image2','','images/btn02r.jpg',0)" onmouseout="MM_swapImgRestore()">
                <img src="images/btn02{{ $btn2 }}.jpg" alt="about" name="Image2" width="86" height="34" border="0" id="Image2" />
            </a>
        </div>
        <div id="btn03"><a href="/services" target="_self" onmouseover="MM_swapImage('Image7','','images/btn03r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="images/btn03{{ $btn3 }}.jpg" alt="services" name="Image7" width="85" height="34" border="0" id="Image7" />
            </a>
        </div>
        <div id="btn04"><a href="/contact" target="_self" onmouseover="MM_swapImage('Image9','','images/btn04r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="images/btn04{{ $btn4 }}.jpg" alt="contact" name="Image9" width="85" height="34" border="0" id="Image9" />
            </a>
        </div>
        <div id="btn05"><a href="/subscribe" target="_self" onmouseover="MM_swapImage('Image10','','images/btn05r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="images/btn05{{ $btn5 }}.jpg" alt="subscribe" name="Image10" width="171" height="34" border="0" id="Image10" />
            </a>
        </div>
    </div>
    <div id="sidebar"></div>
    <div id="content">
        @yield('content1')
    </div>
    <div id="rightbar">
        @yield('rightbar')
    </div>
    <div id="divider"></div>
    <div id="left_im"> <img src="images/left_im.jpg" width="90" height="270" alt="right_im" /><img src="images/left_im.jpg" width="90" height="270" alt="right_im" /></div>
        @yield('content2')
    <div id="footer">
        <p>COMPUTER WHIZ CANBERRA 2015</p>
    </div>
</div>
</div>
</body>
</html>
