<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Post Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admintemplate/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admintemplate/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="admintemplate/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="admintemplate/https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="admintemplate/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="admintemplate/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="admintemplate/img/favicon.ico">
    <style>
        .form-group label {
            color: white
        }
    </style>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    @include('sweetalert::alert')
    @include('admin.adheader')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="container">
          <h2 style="text-align: center; margin-top:10px; color:white">Create a New Post</h2>




          <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Post Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
            </div>
            
            <div class="form-group">
              <label for="content">Post Content</label>
              <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter post content" required></textarea>
            </div>
            
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" id="category" name="category">
                <option value="" disabled selected>Select a category</option>  
                  <option value="news">News</option>
                  <option value="updates">Updates</option>
                  <option value="events">Events</option>
                  <option value="technology">Technology</option>  
                  <option value="lifestyle">Lifestyle</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="image">Post Image</label>
              <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Publish Post</button>
          </form>
        </div>
      </div>

      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
            <!-- Footer content -->
          </div>
        </div>
      </footer>
    </div>

    <!-- JavaScript files-->
    <script src="admintemplate/vendor/jquery/jquery.min.js"></script>
    <script src="admintemplate/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admintemplate/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admintemplate/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admintemplate/vendor/chart.js/Chart.min.js"></script>
    <script src="admintemplate/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admintemplate/js/charts-home.js"></script>
    <script src="admintemplate/js/front.js"></script>
  </body>
</html>
