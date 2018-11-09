<!DOCTYPE html>
<html>
<head>
    <title>Add Marker To Panorama</title>
    <!-- use bootswatch-->
</head>

<!-- This form should come up after panoramaForm has been submitted 
and panorama has been added to db -->
<body>
    <form id="add-markers" method="POST">
        Longitude (Spherical Coordinate): <input type='number' name='long'>
        <br>
        Latitude (Spherical Coordinate): <input type="number" name="lat">
        <br>
        Marker Name: <input type="text" name="tooltipStr">
        <br>
        Marker Information: <input type="text" name="info">
    </form>

    <!-- Inputs should be used to call addMarkerToPan() -->
    
</body>
</html>