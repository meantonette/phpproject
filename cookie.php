<?php
$interest = "arts";
$homepage = "http://p24.corrosive.co.uk";
$query = "homepage=".urlencode( $homepage );
$query .= "&interest=".urlencode( $interest );
?>
<a href="newpage.php?<?php //print $query ?>">Go</a>
Creating a Query String
A Function to Build Query Strings

<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Listing 19.5 Using http_build_query() to Build Query Strings</title>
</head>
<body>
<?php
$q = array (
'name' => "Arthur Harold Smith",
'interest' => "Cinema (mainly art house)",
'homepage' => "http://p24.corrosive.co.uk/harold/");
$query = http_build_query( $q );
print $query;
print 'name=Arthur+Harold+Smith&interest=Cinema+%28mainly+art+house
   %29&homepage=http%3A%2F%2Fp24.corrosive.co.uk%2Fharold%2F'
?>

<p>
<a href="anotherpage.php?<?php //print $query ?>">Go!</a>
</p>
</body>
</html> 