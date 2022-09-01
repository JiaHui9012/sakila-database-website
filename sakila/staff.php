
<!DOCTYPE html>

<html>
	<head>
		<title>Sakila Database</title>
		<style>
			h1 {
				margin-left: 250px;
				font-size: 50px;
				margin-bottom: 5px;
			}
            
            h2 {
                margin-left: 250px;
                font-size: 35px;
			}

			h3 {
                margin-bottom: 5px;
				font-size: 20px;
			}
			
			table{
				margin-left: 250px;
				margin-bottom: 50px;
			}
			
			th{
				background-color: grey;
				color: white;
			}

			tr:nth-child(even){
				background-color: #f2f2f2;
			}
            
			.sidebar {
				padding: 0px 8px;
				height: 100%;
				width: 190px;
				position: fixed;
				z-index: 1;
				top: 0;
				left: 0;
				background-color: grey;
				overflow-x: hidden;
				overflow-y: hidden;
				padding-top: 20px;
			}

			.sidebar a.title {
				padding: 6px 10px 6px 30px;
				text-decoration: none;
				font-size: 23px;
				color: rgb(252, 252, 252);
				display: block;
			}

			.sidebar a:hover {
				color: black;
  				background-color: white;
			}

			.selection{
				margin-left: 250px;
			}

			.alert{
				margin-left: 250px;
				padding-bottom: 20px;
				font-weight: bold;
				font-size: 27px;
				color:rgb(167, 0, 0);
			}

			div.insert{
				margin-left: 250px;
				padding-bottom: 20px;
				
			}
			
			.in-group{
				padding-bottom: 10px;
			}

			button{
				border: none;
				border-radius: 5px;
    			background: #ddd;
				padding: 5px 20px 5px 20px;
			}

			a{
				text-decoration: none;
				color: black;
			}

		</style>
	</head>
	<body>
        <h1>Sakila Database</h1>
        <h2>Staff</h2>
		<nav>
			<div class="sidebar">
				<a href="index.php" class="title">HOME</a>
				<a href="actor.php" class="title">actor</a>
				<a href="address.php" class="title">address</a>
				<a href="category.php" class="title">category</a>
				<a href="city.php" class="title">city</a>
				<a href="country.php" class="title">country</a>
				<a href="customer.php" class="title">customer</a>
				<a href="film.php" class="title">film</a>
				<a href="film_actor.php" class="title">film_actor</a>
				<a href="film_category.php" class="title">film_category</a>
				<a href="film_text.php" class="title">film_text</a>
				<a href="inventory.php" class="title">inventory</a>
				<a href="language.php" class="title">language</a>
				<a href="payment.php" class="title">payment</a>
				<a href="rental.php" class="title">rental</a>
				<a href="staff.php" class="title">staff</a>
				<a href="store.php" class="title">store</a>
			</div>
        </nav>

		<?php require_once 'staffprocess.php';	?>

		<div class="selection">
		<form action="" method="POST">
			<h3>Select the fields</h3>
			<input type="checkbox" name="select[]" value="staff_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("staff_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>staff_id</label>
            <input type="checkbox" name="select[]" value="first_name" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("first_name",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>first_name</label>
			<input type="checkbox" name="select[]" value="last_name" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("last_name",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>last_name</label>
            <input type="checkbox" name="select[]" value="address_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("address_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>address_id</label>
            <input type="checkbox" name="select[]" value="picture" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("picture",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>picture</label>
            <input type="checkbox" name="select[]" value="email" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("email",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>email</label>
            <input type="checkbox" name="select[]" value="store_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("store_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>store_id</label>
            <input type="checkbox" name="select[]" value="active" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("active",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>active</label>
            <input type="checkbox" name="select[]" value="username" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("username",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>username</label>
            <input type="checkbox" name="select[]" value="password" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("password",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>password</label>
            <input type="checkbox" name="select[]" value="last_update" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("last_update",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>last_update</label>
			<button type="submit" class="select-submit" name="select-button">Select</button>
		</form>
		</div>

		<div class="insert">
		<form action="staffprocess.php" method="POST">
			<h3>Enter Information</h3>
			<input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
			<div class="in-group">
				<label>staff_id</label><br/>
				<input type="number" name="staff_id" class="in-input" value="<?php echo $staff_id; ?>" placeholder="Enter staff id" required>
			</div>
            <div class="in-group">
				<label>first_name</label><br/>
				<input type="text" name="first_name" class="in-input" value="<?php echo $first_name; ?>" placeholder="Enter first name" required>
			</div>
			<div class="in-group">
				<label>last_name</label><br/>
				<input type="text" name="last_name" class="in-input" value="<?php echo $last_name; ?>" placeholder="Enter last name" required>
			</div>
            <div class="in-group">
				<label>address_id</label><br/>
				<input type="number" name="address_id" class="in-input" value="<?php echo $address_id; ?>" placeholder="Enter address_id" required>
			</div>
            <div class="in-group">
				<label>picture</label><br/>
				<input type="file" name="picture" class="in-input" value="<?php echo $picture; ?>" placeholder="Enter picture">
			</div>
			<div class="in-group">
				<label>email</label><br/>
				<input type="email" name="email" class="in-input" value="<?php echo $email; ?>" placeholder="Enter email">
			</div>
            <div class="in-group">
				<label>store_id</label><br/>
				<input type="number" name="store_id" class="in-input" value="<?php echo $store_id; ?>" placeholder="Enter store_id" required>
			</div>
            <div class="in-group">
				<label>active</label><br/>
				<input type="number" name="active" class="in-input" value="<?php echo $active; ?>" placeholder="Enter active" >
			</div>
            <div class="in-group">
				<label>username</label><br/>
				<input type="text" name="username" class="in-input" value="<?php echo $username; ?>" placeholder="Enter username" >
			</div>
            <div class="in-group">
				<label>password</label><br/>
				<input type="password" name="password" class="in-input" value="<?php echo $password ?>" placeholder="Enter password">
			</div>
			<div>
			<?php
			if ($update == true):
			?>
				<button type="submit" class="insert-submit" name="update">Update</button>
			<?php else: ?>
				<button type="submit" class="insert-submit" name="insert">Insert</button>
			<?php endif; ?>
			</div>
		</form>
		</div>
		
		<?php
			if (isset($_SESSION['message'])){
		?>
			<div class="alert">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
			</div>
		<?php
			}
		?>

        <form>
			<?php
			$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM staff") or die($mysqli->error);
			
			if (isset($_POST['select-button'])){
			?>
				<table align="left" border="1px" style="width: 81%; line-height: 40px;">
					<tr>
						<?php if (!empty($_POST['select'])&&in_array("staff_id",$_POST['select'])){ ?>
							<th>staff_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">staff_id</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("first_name",$_POST['select'])){ ?>
							<th>first_name</th>
						<?php }
						else{ ?>
							<th style="display:none;">first_name</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("last_name",$_POST['select'])){ ?>
							<th>last_name</th>
						<?php }
						else{ ?>
							<th style="display:none;">last_name</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("address_id",$_POST['select'])){ ?>
							<th>address_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">address_id</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("picture",$_POST['select'])){ ?>
							<th>picture</th>
						<?php }
						else{ ?>
							<th style="display:none;">picture</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("email",$_POST['select'])){ ?>
							<th>email</th>
						<?php }
						else{ ?>
							<th style="display:none;">email</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("store_id",$_POST['select'])){ ?>
							<th>store_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">store_id</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("active",$_POST['select'])){ ?>
							<th>active</th>
						<?php }
						else{ ?>
							<th style="display:none;">active</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("username",$_POST['select'])){ ?>
							<th>username</th>
						<?php }
						else{ ?>
							<th style="display:none;">username</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("password",$_POST['select'])){ ?>
							<th>password</th>
						<?php }
						else{ ?>
							<th style="display:none;">password</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("last_update",$_POST['select'])){ ?>
							<th>last_update</th>
						<?php }
						else{ ?>
							<th style="display:none;">last_update</th>
						<?php } ?>
						<th>Action</th>
					</tr>
					<?php while ($rows = $result -> fetch_assoc()){ ?>
						<tr align="center">
							<?php if (!empty($_POST['select'])&&in_array("staff_id",$_POST['select'])){ ?>
								<td><?php echo $rows['staff_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['staff_id']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("first_name",$_POST['select'])){ ?>
								<td><?php echo $rows['first_name']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['first_name']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("last_name",$_POST['select'])){ ?>
								<td><?php echo $rows['last_name']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['last_name']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("address_id",$_POST['select'])){ ?>
								<td><?php echo $rows['address_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['address_id']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("picture",$_POST['select'])){ ?>
								<td><?php echo $rows['picture']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['picture']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("email",$_POST['select'])){ ?>
								<td><?php echo $rows['email']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['email']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("store_id",$_POST['select'])){ ?>
								<td><?php echo $rows['store_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['store_id']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("active",$_POST['select'])){ ?>
								<td><?php echo $rows['active']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['active']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("username",$_POST['select'])){ ?>
								<td><?php echo $rows['username']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['username']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("password",$_POST['select'])){ ?>
								<td><?php echo $rows['password']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['password']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("last_update",$_POST['select'])){ ?>
								<td><?php echo $rows['last_update']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['last_update']; ?></td>
							<?php } ?>
							<td><button type="submit" name="update"><a href="staff.php?update=<?php echo $rows['staff_id']; ?>">Update</a></button>
								<button type="submit" name="delete"><a href="staffprocess.php?delete=<?php echo $rows['staff_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
							</td>
						</tr>
					<?php } ?>
				</table>	
			<?php		
			}
			else{
			?>
				<table align="left" border="1px" style="width: 81%; line-height: 40px;">
					<tr>
                        <th>staff_id</th>
                        <th>first_name</th>
						<th>last_name</th>
                        <th>address_id</th>
                        <th>picture</th>
						<th>email</th>
						<th>store_id</th>
						<th>active</th>
                        <th>username</th>
						<th>password</th>
						<th>last_update</th>
						<th>Action</th>
					</tr>
				<?php while ($rows = $result -> fetch_assoc()){ ?>
					<tr align="center">
						<td><?php echo $rows['staff_id']; ?></td>
                        <td><?php echo $rows['first_name']; ?></td>
						<td><?php echo $rows['last_name']; ?></td>
                        <td><?php echo $rows['address_id']; ?></td>
                        <td><?php echo $rows['picture']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['store_id']; ?></td>
                        <td><?php echo $rows['active']; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['password']; ?></td>
						<td><?php echo $rows['last_update']; ?></td>
						<td><button type="submit" name="update"><a href="staff.php?update=<?php echo $rows['staff_id']; ?>">Update</a></button>
							<button type="submit" name="delete"><a href="staffprocess.php?delete=<?php echo $rows['staff_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
						</td>
					</tr>
				<?php } ?>
				</table>
			<?php } ?>
        </form>
	</body>
</html>