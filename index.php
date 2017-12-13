<!DOCTYPE html>
<html>
<head>
	<!-- Just in case any of the names contain special characters... -->
	<meta charset="UTF-8">
	<title>Mythu's Application</title>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- 
	Normally in-line CSS like this is blasphemy and unmanagable in the long term, but to keep things simple
	I lifted the styling directly from: https://www.w3schools.com/css/tryit.asp?filename=trycss_table_fancy.
	The CSS is was then modified to my taste - since no particular requirements for style. ;) 
	-->
	<style>
		table {
		    font-family: Arial, Helvetica, sans-serif;
		    border-collapse: collapse; 
		    width: 100%;
		    text-align: center;
		    font-size: 14px;
		}

		table td, table th {
		    border: 1px solid #ddd;
		    padding: 8px;
		}

		table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		table tr:hover {
			background-color: #ddd;
		}

		table th {
		    padding-top: 12px;
		    padding-bottom: 12px;
		    background-color: #4CAF50;
		    color: white;
		    font-size: 18px;
		}
	</style>
	<script>
		$(document).ready(function() {
			// We only use button for one thing here, which is why something more generic wasn't used.
			// Generally, we don't want to have a selector on an HTML element like this. We don't want
			// click events on every button on the page in an application! XD
			$('button').click(function() {
				let personObject = JSON.parse(
					$(this).attr('data-personal-information')
				);
				alert(
					personObject.first_name + ' ' +
					personObject.last_name + '    ' + 
					personObject.email
				);
			});
		});
	</script>
</head>
<body>
	<?
		# I'll be using shortags here... This is usually enabled in the php.ini file. 
		# https://stackoverflow.com/questions/2185320/how-to-enable-php-short-tags
		$people = array(
		   array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
		   array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
		   array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
		   array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
		   array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
		);
		# To get the column headers, lets grab the first row and then the array keys of that row.
		$columnHeaders = array_keys(reset($people));
	?>

	<!-- 
			For this task, I went with a very basic approach to front-end implementation. As a backend-developer I mostly don't 
		use a lot of JS frameworks but am aware that Angular was an option here. 
			In this case, I chose to use JQuery to be able to grab the personal information from a JSON string stored as an 
		attribute to each button element.
			The tables were all rendered using PHP, and may have been a bit cleaner if we used angular directives - but it's not
		something that I regularly use so I've have refrained from using it.
	 -->

	<table>
		<thead>
			<tr>
				<?foreach($columnHeaders as $columnLabel):?>
					<th><?=$columnLabel?></th>
				<?endforeach;?>
				<!-- An extra column for the buttons -->
				<th></th> 
			</tr>
		</thead>
		<?foreach($people as $person):?>
		<tbody>
			<tr>
				<?foreach($person as $personalInformation):?>
				<td>
					<?=$personalInformation?>
				</td>
				<?endforeach;?>
				<td>
					<button data-personal-information='<?=json_encode($person)?>'>CLICK</button>
				</td>
			</tr>
		</tbody>
		<?endforeach;?>
	</table>
</body>
</html>
