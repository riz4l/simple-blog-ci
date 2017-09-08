<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if($this->uri->segment(2)=="detail"){?>
    <meta name='keywords' content='<?php echo $artikel_keyword;?>'/>
    <meta name="description" content="<?php echo $artikel_description;?>">
    <meta name="author" content="acode.web.id">
    <link rel="canonical" href="http://acode.web.id/"/>

    <!-- meta facebook -->
    <meta property="og:type" content="article"/> 
    <meta property="og:title" content="<?php echo $artikel_judul?> - Acode"/>
    <meta property="og:description" content="<?php echo $artikel_description?>"/>
    <meta property="og:image" content="http://acode.web.id/upload/acode.png"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content="acode"/>
    <meta property="og:see_also" content="http://acode.web.id"/>
    <meta property="fb:app_id" content="1804995129789002" /> 
    <meta property='og:site_name'content='http://acode.web.id' /> 

    <!-- meta google plus-->
    <link rel="author" href="http:://acode.web.id"/>
    <link rel="publisher" href="http:://acode.web.id"/>
    <meta itemprop="name" content="<?php echo $artikel_judul?> - Acode"/>
    <meta itemprop="description" content="<?php echo $artikel_description?>"/>
    <meta itemprop="image" content="http://acode.web.id/upload/acode.png"/>
    
    <!-- meta twitter -->
    <meta name="twitter:site" content="acode.web.id"/>
    <meta name="twitter:title" content="<?php echo $artikel_judul?> - Acode">
    <meta name="twitter:description" content="<?php echo $artikel_description?>"/>
    <meta name="twitter:creator" content="acode.web.id"/>
    <meta name="twitter:image:src" content="http://acode.web.id/upload/acode.png"/>
    <meta name="twitter:domain" content="acode.web.id"/>

    <title><?php echo $artikel_judul?> - Acode</title>
<?php }elseif($this->uri->segment(2)=="category"){?>
    <meta name='keywords' content='code, a code, programing'/>
    <meta name="description" content="write a code line by line">
    <meta name="author" content="acode.web.id">
    <link rel="canonical" href="http://acode.web.id/"/>

    <title><?php echo $kategori?> - Acode</title>
<?php }else{ ?>
    <meta name='keywords' content='code, a code, programing'/>
    <meta name="description" content="write a code line by line">
    <meta name="author" content="acode.web.id">
    <link rel="canonical" href="http://acode.web.id/"/>

    <!-- meta facebook -->
    <meta property="og:type" content="article"/> 
    <meta property="og:title" content="Acode"/>
    <meta property="og:description" content="write a code line by line"/>
    <meta property="og:image" content="http://acode.web.id/upload/acode.png"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content="acode"/>
    <meta property="og:see_also" content="http://acode.web.id"/>
    <meta property="fb:admins" content=""/>
    <meta property="fb:app_id" content="1804995129789002" /> 
    <meta property='og:site_name'content='http://acode.web.id' /> 

    <!-- meta google plus-->
    <link rel="author" href="http:://acode.web.id"/>
    <link rel="publisher" href="http:://acode.web.id"/>
    <meta itemprop="name" content="Acode"/>
    <meta itemprop="description" content=""/>
    <meta itemprop="image" content="http://acode.web.id/upload/acode.png"/>
    
    <!-- meta twitter -->
    <meta name="twitter:site" content="acode.web.id"/>
    <meta name="twitter:title" content="Acode">
    <meta name="twitter:description" content="write a code line by line"/>
    <meta name="twitter:creator" content="acode.web.id"/>
    <meta name="twitter:image:src" content="http://acode.web.id/upload/acode.png"/>
    <meta name="twitter:domain" content="acode.web.id"/>

    <title>Acode</title>
    <?php } ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/front/img/favicon.png" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/front/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/prism.css">

     <style type="text/css">

    #return-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.7);
        width: 50px;
        height: 50px;
        display: block;
        text-decoration: none;
        -webkit-border-radius: 35px;
        -moz-border-radius: 35px;
        border-radius: 35px;
        display: none;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    #return-to-top i {
        color: #fff;
        margin: 0;
        position: relative;
        left: 16px;
        top: 13px;
        font-size: 19px;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    #return-to-top:hover {
        background: rgba(0, 0, 0, 0.9);
    }
    #return-to-top:hover i {
        color: #fff;
        top: 5px;
    }

    .facebook,.twitter { margin-left:3px !important;}
    .facebook, .twitter, .google, .linkedin, .pinterest {
     float:left;
     position:relative;
     margin-left:5px;
    }
    .social-share {
     width:190px;
     margin:15px auto 0;
    }

    .fb_iframe_widget > span {
    }
    .fb-comments,
    .fb-comments iframe[style],
    .fb-comments > span {
        width: 100% !important;
    }
    </style>

</head>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=35b2b797-9b0f-442d-be48-ccfc14e7e768"></script>
<script type="text/javascript">stLight.options({publisher: "35b2b797-9b0f-442d-be48-ccfc14e7e768", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=1804995129789002";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body>
	<div class="container">
		<div  >
			<div class="header" id="sticky-menu" style="z-index:999">
				<div class="col-md-3">
					<div class="logo" align="center">
						<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/front/img/yourlogo.png" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-5">
					<div class="navigation">
						<ul>
							<li><a href="<?php echo base_url()?>">HOME</a></li>
						<?php 
	                        $menu_category = $this->Mdl_front->get_category_menu();
	                        foreach($menu_category as $row_menu){

                        ?>
                        	<li><a href="<?php echo base_url()?>post/category/<?php echo $row_menu->id_kategori?>/<?php echo $row_menu->kategori_slug?>"><?php echo $row_menu->kategori?></a></li>
						<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="search">
						<form name="form1" method="post" action="<?php echo base_url()?>post/search" enctype="multipart/form-data">
						 	<div class="input-group">
							    <input type="text" class="form-control" placeholder="search.." name="keyword" required>
							     <span class="input-group-btn">
							        <input type="submit" class="btn btn-default" type="button" name="btn_search" value="Go!">
							      </span>
						    </div><!-- /input-group -->
						</form>
					</div>
				</div>
			</div>
		</div>