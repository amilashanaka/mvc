<html>
<head></head>
<title>User List</title>
<body>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>City</th>
        <th>Country</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $key => $user)
    {
        echo '<tr>
<td>
<a href="index.php?user='.$user->name.'">'.$user->name.'</a></td>
<td>'.$user->city.'</td>
<td>'.$user->country.'</td>
</tr>';
    }
    ?>
    </tbody>
</table>
</body>
</html>
