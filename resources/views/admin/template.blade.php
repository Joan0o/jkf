<!DOCTYPE html>
<html lang="en">
<head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J K F - admin</title>

    <style>/*!
            * Start Bootstrap - Simple Sidebar HTML Template (https://startbootstrap.com)
            * Code licensed under the Apache License v2.0.
            * For details, see http://www.apache.org/licenses/LICENSE-2.0.
            */
           
           /* Toggle Styles */
           
           #wrapper {
               padding-left: 0;
               -webkit-transition: all 0.5s ease;
               -moz-transition: all 0.5s ease;
               -o-transition: all 0.5s ease;
               transition: all 0.5s ease;
           }
           
           #wrapper.toggled {
               padding-left: 250px;
           }
           
           #sidebar-wrapper {
               z-index: 1000;
               position: fixed;
               left: 250px;
               width: 0;
               height: 100%;
               margin-left: -250px;
               overflow-y: auto;
               background: #000;
               -webkit-transition: all 0.5s ease;
               -moz-transition: all 0.5s ease;
               -o-transition: all 0.5s ease;
               transition: all 0.5s ease;
           }
           
           #wrapper.toggled #sidebar-wrapper {
               width: 250px;
           }
           
           #page-content-wrapper {
               width: 100%;
               position: absolute;
               padding: 15px;
           }
           
           #wrapper.toggled #page-content-wrapper {
               position: absolute;
               margin-right: -250px;
           }
           
           /* Sidebar Styles */
           
           .sidebar-nav {
               position: absolute;
               top: 0;
               width: 250px;
               margin: 0;
               padding: 0;
               list-style: none;
           }
           
           .sidebar-nav li {
               text-indent: 20px;
               line-height: 40px;
           }
           
           .sidebar-nav li a {
               display: block;
               text-decoration: none;
               color: #999999;
           }
           
           .sidebar-nav li a:hover {
               text-decoration: none;
               color: #fff;
               background: rgba(255,255,255,0.2);
           }
           
           .sidebar-nav li a:active,
           .sidebar-nav li a:focus {
               text-decoration: none;
           }
           
           .sidebar-nav > .sidebar-brand {
               height: 65px;
               font-size: 18px;
               line-height: 60px;
           }
           
           .sidebar-nav > .sidebar-brand a {
               color: #999999;
           }
           
           .sidebar-nav > .sidebar-brand a:hover {
               color: #fff;
               background: none;
           }
           
           @media(max-width:3000px) {
               #wrapper {
                   padding-left: 250px;
               }
           
               #wrapper.toggled {
                   padding-left: 0;
               }
           
               #sidebar-wrapper {
                   width: 250px;
               }
           
               #wrapper.toggled #sidebar-wrapper {
                   width: 0;
               }
           
               #page-content-wrapper {
                   padding: 20px;
                   position: relative;
               }
           
               #wrapper.toggled #page-content-wrapper {
                   position: relative;
                   margin-right: 0;
               }
           }
           </style>

    

<!-- Latest compiled and minified CSS -->
    <link href="css/plugins/bootstrap.min.css" rel="stylesheet">
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>

    <!-- jsCalendar style -->
    <link rel="stylesheet" type="text/css" href="js/jsCalendar/jsCalendar.css">
    <!-- jsCalendar script -->
    <script type="text/javascript" src="js/jsCalendar/jsCalendar.js"></script>
    <script type="text/javascript" src="js/jsCalendar/jsCalendar.lang.es.js"></script>

    <style media="screen">
      /*body { padding-top: 70px; }*/
      #connectLogo {
        height: 60px;
        padding: 15px 0 5px 0;
      }
      .share-link {
        line-height: 60px;
        padding: 0 1em;
        font-size: 2em;
      }
    </style>

</head>

<body>

    <nav class="navbar navbar-default NOnavbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            
          <button type="button" class="navbar-toggle collapsed menu-toggle btn btn-warning">
                menu
          </button>

        </div>

      </div>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="dashboard">
                        Reservas
                    </a>
                </li>
                <li>
                    <a href="cursos">Cursos</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
                <div id="page" style="padding: 50px">
            
                    </div>
        
        
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->

    
    <script>
       
  $(document).ready(function() {
   
    location.hash = "dashboard";
      $.ajax({
        url: 'dashboard',
        dataType: 'html',
        success: (r)=> {
          $('#page').html(r);
        }
      })
  });
    $(".menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $("a").click(function (e) {
    $.ajax({
        url: $(this).attr('href'),
        dataType: 'html', success: (r)=>{
        ensayos = undefined;
        ensayo = undefined;
          $('#page').html(r);
          location.hash = $(this).attr('href');
        }
      });
      e.preventDefault();
  });

    </script>

</body>

</html>
