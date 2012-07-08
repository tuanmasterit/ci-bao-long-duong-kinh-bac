<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
    <title><?php if(isset($title)){echo $title;} else {echo "Công ty cổ phần Bảo Long Đường Kinh Bắc";}?></title>
    <link href="<?php echo base_url();?>application/content/css/global.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/news.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/product.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/carouFredsel.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>application/content/css/indexlogin.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/video.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/contact.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/common.css" rel="stylesheet" type="text/css"/>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery-1.2.1.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery-1.6.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.validationEngine.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.validationEngine-vi.js"></script>
	  <script type="text/javascript" src="<?php echo base_url();?>application/content/js/validation.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.ui.core.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/ui.datetimepicker.js"></script>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>application/content/css/validationEngine.jquery.css"></link>
	
    <link rel="stylesheet" href="<?php echo base_url();?>application/content/css/nivo/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>application/content/css/nivo/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>application/content/css/nivo/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>application/content/css/datepicker-style.css" type="text/css" media="screen" />
	
	
	
	<script type="text/javascript">
        $(document).ready(function() {
            $(".datepicker").datepicker({ dateFormat: 'dd/mm/yy' });
        });
 	</script> 
 	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
	
	<style type="text/css">
	body {
		font-family: Helvetica;
		font-size: 11px;
		color: #000;
	}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 130px;
		margin: 10px 0px 0px 0px;
		width: 300px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
	
    <script type="text/javascript" src="<?php echo base_url();?>application/content/css/nivo/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.jcarousel.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/content/css/tango/skin.css" />
	
<script>    
    jQuery(document).ready(function() {
		jQuery('#coin-slider').nivoSlider();
    jQuery('#list_carousel').jcarousel({    	
        auto: 5,
        wrap: 'circular',
        initCallback: mycarousel_initCallback    		
    	});
	});
	function mycarousel_initCallback(carousel)
	{
	    // Disable autoscrolling if the user clicks the prev or next button.
	    carousel.buttonNext.bind('click', function() {
	        carousel.startAuto(0);
	    });
	
	    carousel.buttonPrev.bind('click', function() {
	        carousel.startAuto(0);
	    });
	
	    // Pause autoscrolling if the user moves with the cursor over the clip.
	    carousel.clip.hover(function() {
	        carousel.stopAuto();
	    }, function() {
	        carousel.startAuto();
	    });
	};
</script>

</head>
<body>
   
    <div id="wrraper">
        <div id="header">
            <?php $this->load->view('front_end/header');?>
        </div><!-- end of header -->
        <div class="clear"></div>
        <div id="main">
            <div class="clear">
            </div>            
            <div id="main_left_middle" style="margin-top:20px;">
            	<?php $this->load->view($main)?>                
            </div>                
            
            <div id="main_right_middle" style="margin-top:20px;">
            	<?php $this->load->view('front_end/main_right_middle');?>                
            </div>
        </div>        
        <div class="clear">
        </div>
        <div id="footer">        
        	<?php $this->load->view('front_end/footer');?>    
        </div>
    </div>
   	
	<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("<?php echo base_url()?>rpc/index", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
	</script>
</body>
</html>