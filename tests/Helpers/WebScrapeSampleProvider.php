<?php namespace WebScrape\Tests\Helpers;

class WebScrapeSampleProvider
{
	public static function getSampleHtml($page)
	{
		switch ($page) {
				case 'portfolio':
					$page = "
						<html>
						<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
						<meta name=\"title\" content=\"Stephen-Hukish.com\">
						<meta name=\"description\" content=\"This site provides a look at my body of work in Web Development, Web Design and Graphic Design.\">
						<meta name=\"keywords\" content=\"Web Development Burlington, Web Development Hamilton, Web Development, Web Design, Web Design Burlington, Web Design Hamilton\">
						<title>Stephen-Hukish.com</title>
						<link rel=\"stylesheet\" type=\"text/css\" href=\"_css/jquery.fancybox-1.3.4.css\" media=\"screen\" />
						<link href=\"_css/style.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />

						<!--<script type='text/javascript' src='_js/jquery.min.js'></script>-->
						<script type='text/javascript' src='_js/jquery-1.4.4.min.js'></script>
						<script type='text/javascript' src='_js/jquery-ui-1.8.6.custom.min.js'></script>
						<script type='text/javascript' src='_js/cufon-yui.js'></script>
						<!--<script type='text/javascript' src='_js/banner.js'></script>-->
						<script type='text/javascript' src='_js/preLoader.js'></script>
						<script type='text/javascript' src='_js/jquery.fancybox-1.3.4.pack.js'></script>
						<script type='text/javascript' src='_js/iepngfix_tilebg.js'></script>

						<script type='text/javascript'>
						     
								$(document).ready( function(){
						            
								 
								   $('ul.tabnav li a').click(function(e){
									   
									   e.preventDefault();
									   var tabname = $(this).attr('rel');
									   
									   $('div.body_copy').css('display','none');
									   //$(tabname).css('display','block');
									   $(tabname).stop().fadeTo('slow' , 1).show();
									   
								  });
									
									//fancybox for portfolio images
									   $('a.portfolio_link').fancybox();
									   
									
									 
									  $(\"a.flash_link\").fancybox({
								  		'width'				: 1024,
								  		'height'			: 768,
									           'autoScale'     	: false,
									           'transitionIn'		: 'none',
								  		'transitionOut'		: 'none',
								  		'type'				: 'iframe'
								  	 });
									  
									
									  
									  
									  //fancybox for the video
								$(\"a.windsorflash\").fancybox({
									        'width'				: 730,
								  		'height'			: 92,
										'padding'			: 0,
										'autoScale'			: false,
										'transitionIn'		: 'none',
										'transitionOut'		: 'none',
										'swf'               : {
											     'wmode': 'transparent',
											     'autostart' : 'true',
											     'backcolor' : '#000000',
											     'screencolor' : '#040404',
											     'stretching' : 'uniform',
											     'bufferlength' : '6'
							 				}
							 			});
									 
							 });
							 
						</script>


						<!-- Fix for IE png-->
						<style type=\"text/css\">
							 img, div { behavior: url(\"iepngfix.htc\") }
						</style> 

						<meta property=\"og:title\" content=\"www.stephen-hukish.com\" />
						<meta property=\"og:type\" content=\"website\" />
						<meta property=\"og:url\" content=\"http://www.stephen-hukish.com\" />
						<meta property=\"og:image\" content=\"http://www.stephen-hukish.com/images/moi.png\" />
						<meta property=\"og:site_name\" content=\"Stephen-hukish.com\" />
						<meta property=\"fb:admins\" content=\"520680940\" />

						<link REL=\"icon\" HREF=\"favicon.ico\" TYPE=\"image/x-icon\"> 
						<link REL=\"shortcut icon\" HREF=\"favicon.ico\" TYPE=\"image/x-icon\"> 


						</head>

						<body>
						<div id=\"absolute_wrapper\"><!--begin abs wrapper-->
						<a name='top'></a>
							<div id=\"content_wrapper\"><!--begin content wrapper-->
								  <div id=\"header\"><!--begin header-->
									<ul id=\"top_nav\"><!--begin top nav-->
									   <li><a href='about' class='about'>About Me</a></li>
									   <li><a href='portfolio' class='portfolio'>My Work</a></li>
									   <li><a href='contact' class='contact'>Get In Touch</a></li>
									</ul><!--end top nav-->   
									 
								  </div><!--end header-->   
								  <div id=\"content\"><!--begin content-->
									   
								  <img src=\"images/portfolio_banner.png\" alt=\"Stephen Hukish porfolio images\"  id='my_pic'/>
								  
								
								<div id=\"maintab\" class='widget'><!--Begin maintab-->
								  
								
									   
								  <ul class=\"tabnav\">
										    <li><a rel=\"#web_gal\" href=\"\" class='marker' id='web_tab'>Web</a></li>  
										    <li><a rel=\"#print_gal\" href=\"\" class='marker' id='print_tab'>Print</a></li>
										    <li><a rel=\"#flash_gal\" href=\"\" class='marker' id='int_tab'>Interactive</a></li>
									   </ul>
									   		  
									   <div  id=\"web_gal\" class=\"body_copy tabdiv\"><!--body copy-->
									   <div class=\"portfolio_title marker\">Web Portfolio</div>
									   <div class='gallery_intro'>
										    
										   Here you can view my latest works in web design and web development. 
									   </div>
									   
									     <div class='web_gallery_row'><!-- Begin Web Row-->
									   <div class='web_proj_title'>Liquid Nutrition <div class='top_link marker'><a href=\"http://www.liquidnutrition.ca\" target=\"_blank\" class='web_iframe'>Visit the site</a></div></div>
									   <div class='web_proj_copy'></div>
									   <ul class='web_proj_list'>
										    <li><a href=\"images/porfolio_images/large/web_img0007.jpg\" class='portfolio_link'  rel='gal2'><img src=\"images/porfolio_images/thumb/web_thumb07.jpg\" alt=\"Liquid Nutrition page 1\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0008.jpg\" class='portfolio_link'  rel='gal2'><img src=\"images/porfolio_images/thumb/web_thumb08.jpg\" alt=\"Liquid Nutrition page 2\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0009.jpg\" class='portfolio_link'  rel='gal2'><img src=\"images/porfolio_images/thumb/web_thumb09.jpg\" alt=\"Liquid Nutrition page 3\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0010.jpg\" class='portfolio_link'  rel='gal2'><img src=\"images/porfolio_images/thumb/web_thumb10.jpg\" alt=\"Liquid Nutrition page 4\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0011.jpg\" class='portfolio_link'  rel='gal2'><img src=\"images/porfolio_images/thumb/web_thumb11.jpg\" alt=\"Liquid Nutrition page 5\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0012.jpg\" class='portfolio_link'  rel='gal2'><img src=\"images/porfolio_images/thumb/web_thumb12.jpg\" alt=\"Liquid Nutrition page 6\" /></a></li>
									   </ul>
									   
												      
									   </div><!--End Web Row-->
									   
									   <div class='web_gallery_row'><!-- Begin Web Row-->
									   <div class='web_proj_title'>Grandcheddar.ca (Agropur)<div class='top_link marker'><a href=\"http://www.grandcheddar.ca\" target=\"_blank\" class='web_iframe'>Visit the site</a></div></div>
									   <div class='web_proj_copy'></div>
									   <ul class='web_proj_list'>
										    <li><a href=\"images/porfolio_images/large/web_img0013.jpg\" class='portfolio_link'  rel='gal3'><img src=\"images/porfolio_images/thumb/web_thumb13.jpg\" alt=\" Agropur Grandcheddar page 1\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0014.jpg\" class='portfolio_link' rel='gal3'><img src=\"images/porfolio_images/thumb/web_thumb14.jpg\" alt=\" Agropur Grandcheddar page 2\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0015.jpg\" class='portfolio_link' rel='gal3'><img src=\"images/porfolio_images/thumb/web_thumb15.jpg\" alt=\" Agropur Grandcheddar page 3\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0016.jpg\" class='portfolio_link' rel='gal3'><img src=\"images/porfolio_images/thumb/web_thumb16.jpg\" alt=\" Agropur Grandcheddar page 4\" /></a></li>
									   </ul>
									   
												      
									   </div><!--End Web Row-->
									   
									   <div class='web_gallery_row'><!-- Begin Web Row-->
									   <div class='web_proj_title'>Windsor Salt<div class='top_link marker'><a href=\"http://www.windsorsalt.com\" target=\"_blank\" class='web_iframe'>Visit the site</a></div></div>
									   <div class='web_proj_copy'></div>
									   <ul class='web_proj_list'>
										    <li><a href=\"images/porfolio_images/large/web_img0004.jpg\" class='portfolio_link' rel='gal1'><img src=\"images/porfolio_images/thumb/web_thumb04.jpg\" alt=\"Windsor Salt page 1\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0004a.jpg\" class='portfolio_link' rel='gal1'><img src=\"images/porfolio_images/thumb/web_thumb04a.jpg\" alt=\"Windsor Salt page 2\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0005.jpg\" class='portfolio_link' rel='gal1'><img src=\"images/porfolio_images/thumb/web_thumb05.jpg\" alt=\"Windsor Salt page 3\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0006.jpg\" class='portfolio_link' rel='gal1'><img src=\"images/porfolio_images/thumb/web_thumb06.jpg\" alt=\"Windsor Salt page 4\" /></a></li>
									   </ul>
									   
												      
									   </div><!--End Web Row-->
									   
									 
									   
									   <div class='web_gallery_row'><!-- Begin Web Row-->
									   <div class='web_proj_title'>Trispec.com <div class='top_link marker'><a href=\"http://www.trispec.com\" target=\"_blank\" class='web_iframe'>Visit the site</a></div></div>
									   <div class='web_proj_copy'></div>
									   <ul class='web_proj_list'>
										    <li><a href=\"images/porfolio_images/large/web_img0017.jpg\" class='portfolio_link' rel='gal4'><img src=\"images/porfolio_images/thumb/web_thumb17.jpg\" alt=\" Trispec page 1\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0018.jpg\" class='portfolio_link' rel='gal4'><img src=\"images/porfolio_images/thumb/web_thumb18.jpg\" alt=\" Trispec page 2\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0019.jpg\" class='portfolio_link' rel='gal4'><img src=\"images/porfolio_images/thumb/web_thumb19.jpg\" alt=\" Trispec page 3\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0020.jpg\" class='portfolio_link' rel='gal4'><img src=\"images/porfolio_images/thumb/web_thumb20.jpg\" alt=\" Trispec page 4\" /></a></li>
									   </ul>
									   
												      
									   </div><!--End Web Row-->
									   
									    <div class='web_gallery_row'><!-- Begin Web Row-->
									   <div class='web_proj_title'>Urologi.ca <div class='top_link marker'><a href=\"http://www.urologi.ca\" target=\"_blank\" class='web_iframe'>Visit the site</a></div></div>
									   <div class='web_proj_copy'></div>
									   <ul class='web_proj_list'>
										    <li><a href=\"images/porfolio_images/large/web_img0021.jpg\" class='portfolio_link' rel='gal5'><img src=\"images/porfolio_images/thumb/web_thumb21.jpg\" alt=\" Urologi page 1\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0022.jpg\" class='portfolio_link' rel='gal5'><img src=\"images/porfolio_images/thumb/web_thumb22.jpg\" alt=\" Urologi page 2\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0023.jpg\" class='portfolio_link' rel='gal5'><img src=\"images/porfolio_images/thumb/web_thumb23.jpg\" alt=\" Urologi page 3\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/web_img0024.jpg\" class='portfolio_link' rel='gal5'><img src=\"images/porfolio_images/thumb/web_thumb24.jpg\" alt=\" Urologi page 4\" /></a></li>
									   </ul>
									   
												      
									   </div><!--End Web Row-->
										
								  
									   </div><!--end body copy-->
									   
									   <div  id=\"print_gal\" class=\"body_copy tabdiv\"><!--body copy-->
									   <div class=\"portfolio_title marker\">Print Portfolio</div>
								 
									   <div class='gallery_intro'>
										    
										  The majority of my print work was for Games Workshop. I was there for almost six years and during that time I produced web content, magazine articles and customer-facing in-store ads.
									   </div>
									     
									   <div class='web_gallery_row print_gallery_tweak'><!-- Begin Web Row-->
									   <ul class='web_proj_list '>
										    <li><a href=\"images/porfolio_images/large/print_img0001.jpg\" class='portfolio_link' rel='print_gallery'><img src=\"images/porfolio_images/thumb/porfolio_thumb_test.jpg\" alt=\" javascript test\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/print_img0002.jpg\" class='portfolio_link' rel='print_gallery'><img src=\"images/porfolio_images/thumb/porfolio_thumb02.jpg\" alt=\" javascript test\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/print_img0003.jpg\" class='portfolio_link' rel='print_gallery'><img src=\"images/porfolio_images/thumb/porfolio_thumb03.jpg\" alt=\" javascript test\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/print_img0004.jpg\" class='portfolio_link' rel='print_gallery'><img src=\"images/porfolio_images/thumb/porfolio_thumb04.jpg\" alt=\" javascript test\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/print_img0005.jpg\" class='portfolio_link' rel='print_gallery'><img src=\"images/porfolio_images/thumb/porfolio_thumb05.jpg\" alt=\" javascript test\" /></a></li>
										    <li><a href=\"images/porfolio_images/large/print_img0006.jpg\" class='portfolio_link' rel='print_gallery'><img src=\"images/porfolio_images/thumb/porfolio_thumb06.jpg\" alt=\" javascript test\" /></a></li>
										    
									   </ul>
									   </div><!--End Web Row-->
									   </div><!--end body copy-->
									   
									   <div  id=\"flash_gal\" class=\"body_copy tabdiv\"><!--body copy-->
									   <div class=\"portfolio_title marker\">Interactive Portfolio</div>
								 
									   <div class='gallery_intro'>
										    
										  My interactive applications that live apart from the web, have been created using Adobe Flash. Once it is web-ready I will post my Interactive flash portfolio, hopefully in the next couple of days. In addition to my Flash programs and animations I will adding some of the scripts and tools I have developed during my career as a Web Developer and Web Administrator. For now you can check out some banner ads that I put together for Windsor Salt to coincide with a fresh run of commercials on the Food Networks French counterpart Zeste. Please note that you will need <a href=\"http://www.adobe.com/products/flashplayer/\" target='_blank'>Adobe Flash Player 10.X</a> or higher to view my flash work.  
									   </div>
									    <div class='web_gallery_row'><!-- Begin Web Row-->
									   <ul class='web_proj_list '>
										    <li><a href=\"zeste_chef_select_v2_rev.swf\" class='windsorflash'><img src=\"images/porfolio_images/thumb/flash_thumb01.jpg\" alt=\" windsor salt flash 1\" /></a></li>
										    <li><a href=\"zeste_chef_select_v2_alternate.swf\" class='windsorflash'><img src=\"images/porfolio_images/thumb/flash_thumb02.jpg\" alt=\" windsor salt flash 2\" /></a></li>
										   
										   
										    
									   </ul>
									   </div><!--End Web Row-->
								  
									   </div><!--end body copy-->
							
							 </div><!--end maintab -->		   
									   
									   
								  
								  </div><!--end content-->   
							 </div><!--end content wrapper-->   
							 
							



						 
						</div><!--end absolute_wrapper-->   
						<div id=\"footer\" ><!--footer-->
							 <iframe src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.stephen-hukish.com&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=recommend&amp;font=arial&amp;colorscheme=dark&amp;height=35\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:450px; height:35px;\" allowTransparency=\"true\"></iframe>
							 <ul id=\"footer_nav\">
							 <li class='last marker'>&copy; 2014 Stephen Hukish</li>
							  <li><a href=\"contact\" class='marker'>Contact Me</a></li>
							 <li><a href=\"portfolio\" class='marker'>My Work</a></li>
							 <li><a href=\"about\" class='marker'>Home</a></li>
							 
							 
							 </ul>
							 
							 
						</div><!--end footer-->   
						<script type='text/javascript'>Cufon.now();</script>
						</body>
						</html>
						";

					break;
				
				case 'about':
					$page = "
						<html>
							<head>
							</head>
							<body>
								<p>
									this page is about me
								</p>
							</body>
						</html>
					";
				 break;

				case 'contact':
					$page = "
						<html>
							<head>
							</head>
							<body>
								<p>
									contact me on this page here please and thank you
								</p>
							</body>
						</html>
					";
				 break;


			}

		return $page;
	}
}