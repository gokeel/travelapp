	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	
	<script src="<?php echo JS_DIR;?>/web/setup.js"></script>

	<!-- Template functions -->
	<script src="<?php echo JS_DIR;?>/web/developr.input.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.message.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.modal.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.navigable.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.notify.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.scroll.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.table.js"></script>
    
	<script src="<?php echo JS_DIR;?>/web/developr.tooltip.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.confirm.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.agenda.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.tabs.js"></script>		<!-- Must be loaded last -->
    <script src="<?php echo JS_DIR;?>/web/libs/glDatePicker/glDatePicker.min_59edcbff.js"></script>
    <script src="<?php echo JS_DIR;?>/web/libs/jquery.tablesorter.min.js"></script>
	<!-- Tinycon -->
    <!--
	<script src="<?php echo JS_DIR;?>/web/libs/tinycon.min.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.progress-slider.js"></script>
    <script src="<?php echo JS_DIR;?>/web/libs/datatables/datatables.min.js"></script>
    -->
    <!-- jQuery Form Validation -->
	<script src="<?php echo JS_DIR;?>/web/libs/formValidator/jquery.validationEngine.js"></script>
	<script src="<?php echo JS_DIR;?>/web/libs/formValidator/languages/jquery.validationEngine-en.js"></script>
    
    <script src="<?php echo JS_DIR;?>/web/web.js"></script>
	<script>

		// Call template init (optional, but faster if called manually)
		$.template.init();

		// Favicon count
		//Tinycon.setBubble(2);

		// If the browser support the Notification API, ask user for permission (with a little delay)
		if (notify.hasNotificationAPI() && !notify.isNotificationPermissionSet())
		{
			setTimeout(function()
			{
				notify.showNotificationPermission('Your browser supports desktop notification, click here to enable them.', function()
				{
					// Confirmation message
					if (notify.hasNotificationPermission())
					{
						notify('Notifications API enabled!', 'You can now see notifications even when the application is in background', {
							icon: '<?php echo CSS_DIR;?>/web/img/demo/icon.png',
							system: true
						});
					}
					else
					{
						notify('Notifications API disabled!', 'Desktop notifications will not be used.', {
							icon: '<?php echo CSS_DIR;?>/web/img/demo/icon.png'
						});
					}
				});

			}, 2000);
		}

		/*
		 * Handling of 'other actions' menu
		 */

		var otherActions = $('#otherActions'),
			current = false;

		// Other actions
		$('.list .button-group a:nth-child(2)').menuTooltip(otherActions, {

			classes: ['with-mid-padding'],

			onShow: function(target)
			{
				// Remove auto-hide class
				target.parent().removeClass('show-on-parent-hover');
			},

			onRemove: function(target)
			{
				// Restore auto-hide class
				target.parent().addClass('show-on-parent-hover');
			}
		});

		// Delete button
		$('.list .button-group a:last-child').data('confirm-options', {

			onShow: function()
			{
				// Remove auto-hide class
				$(this).parent().removeClass('show-on-parent-hover');
			},

			onConfirm: function()
			{
				// Remove element
				$(this).closest('li').fadeAndRemove();

				// Prevent default link behavior
				return false;
			},

			onRemove: function()
			{
				// Restore auto-hide class
				$(this).parent().addClass('show-on-parent-hover');
			}

		});

		// Demo alert ori
		/*function openAlert()
		{
			$.modal.alert('This is an alert message', {
				buttons: {
					'Thanks, captain obvious': {
						classes:	'huge blue-gradient glossy full-width',
						click:		function(win) { win.closeModal(); }
					}
				}
			});
		};*/

		// Demo alert
		/*function openAlert()
		{
			var news=$('#news_flash').val();
			// alert (news);
			if (news!=''){
			 $.modal.alert(news, {
			 	width:550,
			 	buttons: {
			 		'CLOSE': {
			 			classes:	'blue-gradient glossy full-width',
			 			click:		function(win) { win.closeModal(); }
			 		}
			 	}
			 });
			}else{

			}
		};
		*/
		// Demo prompt
		/*function openPrompt()
		{
			var cancelled = false;

			$.modal.prompt('Please enter a value between 5 and 10:', function(value)
			{
				value = parseInt(value);
				if (isNaN(value) || value < 5 || value > 10)
				{
					$(this).getModalContentBlock().message('Please enter a correct value', { append: false, classes: ['red-gradient'] });
					return false;
				}

				$.modal.alert('Value: <strong>'+value+'</strong>');

			}, function()
			{
				if (!cancelled)
				{
					$.modal.alert('Oh, come on....');
					cancelled = true;
					return false;
				}
			});
		};*/

		// Demo confirm
		/*function openConfirm()
		{
			$.modal.confirm('Challenge accepted?', function()
			{
				$.modal.alert('Me gusta!');

			}, function()
			{
				$.modal.alert('Meh.');
			});
		};*/

		/*
		 * Agenda scrolling
		 * This example shows how to remotely control an agenda. most of the time, the built-in controls
		 * using headers work just fine
		 */

			// Days
		/*$(document).ready(function(){
				openAlert();
			
		  $('.datepicker').glDatePicker(
          { 
            zIndex: 100,
            onChange: function(target, newDate){
                target.val
                (
                    
                    newDate.getDate() + "-" +(newDate.getMonth() + 1) + "-" + newDate.getFullYear()
                    
                );
            } 
          }
          
          );
          $('.trip_way_label').click(function(){
            //console.log($('radio_trip:checked').val());
            if($('.radio_trip:checked').val() == 'two_way'){
                $('#p_kembali').slideDown();
            }else{
                $('#p_kembali').slideUp();
            }
          });
		});*/
        
        
    

	</script>
</body>
</html>