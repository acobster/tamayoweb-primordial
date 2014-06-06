<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php invoice_type(); ?> #<?php invoice_number(); ?> | <?php bloginfo('name'); ?> | <?php the_title(); ?></title>
	<meta name="robots" content="noindex, nofollow">
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php wp_head(); ?>
</head>
<body>
	<link rel="stylesheet" href="<?php invoice_template_url(); ?>/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php invoice_template_url(); ?>/style-print.css" type="text/css" media="print" />
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container">
    	<div class="header">
        	<table cellpadding="0" cellspacing="0" align="left">
            	<tr>
                	<td><img src="<?php invoice_template_url(); ?>/images/logo.png" height="90" width="90" style="margin-top:-25px;"/></td>
                	<td>
                    <h3>Tamayo Web Solutions</h3>
		    <br />
		    <hr />
                    <p id="contact" align="center">3011 N Warner &middot; Tacoma, WA 98407 &middot; <a href="mailto:coby@tamayoweb.net">coby@tamayoweb.net</a> &middot; (916) 833 2794</p>
                    <hr />
			</td>
                </tr>
            </table>
        </div>
        
        <div class="info">
            <fieldset>
            	<legend>Sent to</legend>
                <p><strong><?php invoice_client(); ?></strong></p>
                <p class="hidden"><strong>Description: </strong><?php invoice_client_description(); ?></p>
                <p><?php invoice_client_business(); ?></p>
                <p><?php invoice_client_business_address(); ?></p>
                <p class="hidden"><strong>Email: </strong><?php invoice_client_email(); ?></p>
                <p class="hidden"><strong>Phone: </strong><?php invoice_client_phone(); ?></p>
                <p class="hidden"><strong>VAT Number: </strong><?php invoice_client_number(); ?></p>
                
            </fieldset>
            
            <fieldset class="last">
            	<legend><?php invoice_type(); ?> Details</legend>
                <p><strong>Project: </strong><?php the_title(); ?></p>
                <p><strong><?php invoice_type(); ?> Number: </strong><?php invoice_number(); ?></p>
                <p><strong>Date Issued: </strong><?php the_time('d/m/Y'); ?></p>
            </fieldset>
            
            
        </div>
        
        <div class="breakdown">
        	<table cellpadding="0" cellspacing="0">
            	<tr class="heading">
                	<td>Project Breakdown</td><td>Type</td><td>Rate</td><td>Hours</td><td style="width:75px;">Subtotal</td>
                </tr>
				<?php if(invoice_has_details()): ?>
                    <?php while(invoice_detail()): ?>
                            <tr class="title">
                                <td><?php the_detail_title(); ?></td><td><?php the_detail_type(); ?></td><td><?php the_detail_rate(); ?></td><td><?php the_detail_duration(); ?></td><td><?php the_detail_subtotal(); ?></td>
                            </tr>
                            <tr class="description">
                                <td><?php the_detail_description(); ?></td><td colspan="4"></td>
                            </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                
				<?php if(wp3i_has_tax()):  ?>
                <tr class="heading">
                	<td colspan="3"></td><td>Subtotal</td><td><?php the_invoice_subtotal(); ?></td>
                </tr>
                <tr class="heading">
                    <td colspan="3"></td><td>Tax</td><td><?php the_invoice_tax(); ?></td>
                </tr>
                <?php endif; ?>
                
                <tr class="heading">
                	<td colspan="3"></td><td class="total">Total</td><td class="total"><?php the_invoice_total(); ?></td>
                </tr>
            </table>
        </div>
        
        <div class="payment-details">
        	<fieldset class="last">
            	<legend>Payment Details</legend>
                <?php if(get_invoice_type() == __('Invoice','wp3i') ): ?>
                	<p>Please make checks payable to Coby Tamayo</p>
        		<?php else: ?>
                	<p><strong>This is a project quote, not an invoice.</strong></p>
                    <p>No payment is required.<br /> Hope to hear from you soon.</p>
                <?php endif; ?>
            </fieldset>
        </div>
        
        
    </div>
<?php endwhile; endif; ?>
<?php wp_footer(); ?>
</body>
</html>