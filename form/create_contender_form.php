<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stwórz zawodnika</title>
</head>
<body>
    
<a href="../contenders.php">Wróć</a>

<form action="../logic/create_contender.php" method="post">

<label for="FirstName">Imie: </label>
<input type="text" name="FirstName" id="FirstName">

<label for="LastName">Nazwisko: </label>
<input type="text" name="LastName" id="LastName">

<label for="Class">Klasa: </lable>
<input type="text" name="Class" id="Class">

<label for="Gender">Płeć: </label>
<select name="Gender" id="Gender">
    <option value="K">Kobieta</option>
    <option value="M">Mężczyzna</option>
</select>

<label for="Status">Status: </label>
<select name="Status" id="Status">
    <option value="C">Cywil</option>
    <option value="W">Wojskowy</option>
</select>

<input type="submit" value="Stwórz">

</form>

</body>
</html>