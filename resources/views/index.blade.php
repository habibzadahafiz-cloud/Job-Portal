<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    {{-- <h1>This my ID number: {{ $id }} and this is My Name: {{ $name }}</h1> --}}
    <form>
        <input type="text" name="khan" placeholder="Enter your name" value="{{ $id }}">
        <input type="text" name="salim" placeholder="Enter your last name" value="{{ $name }}">
        <input type="submit">
    </form>
    <?php
if(isset($_GET["khan"])){
$idd = $_GET["khan"];
$namee = $_GET["salim"];
echo "My Name is: " .$namee."<br>"."My ID Number is: " .$idd;
}

?>


</body>
</html>
