 {{if empty($smarty.session.user) }}
           <script language='javascript' type='text/javascript'> 
						window.location.href='{{$smarty.const.WEBSITE_URL}}admin/login'; 
	    </script>
				  
{{/if}}