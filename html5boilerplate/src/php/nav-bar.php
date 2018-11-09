<!-- This is pretty close to what is taken from https://bootswatch.com/flatly/? , further customization needed -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">SFView</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Not many these links currently go anywhere, and none of them are set to active if you're there -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">All Locations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./panoramaForm.php">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Help</a>
    </li>
  </ul>

  <!-- When I add sessions I have to make this a if else with Log Out button and user recognition -->
  <button class="btn btn-secondary my-2 mr-lg-0" onclick="location.href='./userForm.php'" type="submit">Log In</button>
</nav>
