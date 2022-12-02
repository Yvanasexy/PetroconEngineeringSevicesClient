<!doctype html>
<html lang="en">
  <head>
    <!-- Change the 'Page' to current page  -->
    <title>Base Admin Structure</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- External CSS -->
    <!-- Change paths of href depending on the location of the file -->
    <link rel="stylesheet" href="../../public/styles/styles.css">
    <link rel="stylesheet" href="../styles/astyles.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light">
      <button id="sidebarCollapseToggler" type="button" class="btn icon-btn">
          <span class="material-icons">menu</span>
      </button>
      <strong class="user-type flex-grow-1">Petrocon</strong>
      <span class="material-icons">circle_notifications</span>
      <p class="user-name">Eli Lamzon</p>
      <span id="user-display" class="material-icons">account_circle</span>
    </nav>

    <div class="wrapper">
      <div id="sidebar">
        <nav>
          <ul class="list-unstyled components">
            <li class="active">
              <a class="d-flex align-content-start" href="#">
                <span class="material-icons">dashboard</span>
                <div class="collapsible">
                  <span>Dashboard</span>
                </div> 
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="item-dropdown">
              <div class="dropdown-tile">
                <a class="d-flex align-content-start" data-toggle="collapse" href="#projectsCollapse" aria-expanded="false" aria-controls="contentId"> 
                  <span class="material-icons">handyman</span>
                  <div class="collapsible">
                    <span>
                      Projects
                      <span class="material-icons">arrow_drop_down</span>
                    </span>
                  </div>
                </a>
              </div>
              <ul class="collapse list-unstyled sub-menu" id="projectsCollapse">
                <li class="">
                  <a class="" href="#">All</a>
                </li>
                <li class="">
                  <a class="" href="#">Done</a>
                </li>
                <li class="">
                  <a class="" href="#">Ongoing</a>
                </li>
                <li class="">
                  <a class="" href="#">Pending</a>
                </li>
              </ul>
            </li>
            <li class="">
              <a class="d-flex align-content-start" href="#">
                <span class="material-icons">chat_bubble</span>
                <div class="collapsible">Messages</div>
              </a>
            </li>
            <li class="item-dropdown">
              <div class="dropdown-tile">
                <a class="d-flex align-content-start" data-toggle="collapse" href="#teamCollapse" aria-expanded="false" aria-controls="contentId"> 
                  <span class="material-icons">workspaces</span>
                  <div class="collapsible">
                    <span>
                      Team
                      <span class="material-icons">arrow_drop_down</span>
                    </span>
                  </div>
                </a>
              </div>
              <ul class="collapse list-unstyled sub-menu" id="teamCollapse">
                <li class="">
                  <a class="" href="#">Employees</a>
                </li>
                <li class="">
                  <a class="" href="#">Workers</a>
                </li>
              </ul>
            </li>
            <li class="">
              <a class="d-flex align-content-start" href="#">
                <span class="material-icons">people</span>
                <div class="collapsible">Users</div>
              </a>
            </li>
  
            <hr>
  
            <li class="">
              <a class="d-flex align-content-start" href="#">
                <span class="material-icons">person</span>
                <div class="collapsible">Profile</div>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="">
              <a class="d-flex align-content-start" href="#">
                <span class="material-icons">logout</span>
                <div class="collapsible">
                  <span>Logout</span>
                </div>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      
      <div class="content">
        <main class="main">