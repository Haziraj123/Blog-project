<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>A World</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style>
         .container-fluid {
            position: relative;
            z-index: 1;
         }
         .form-container {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
         }
         .form-group label {
            color: white;
         }
         .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
         }
         .btn-primary:hover {
            background-color: #0056b3;
         }
         h1 {
            color: rgb(10, 10, 10);
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 36px; /* Increased font size */
            margin-top: 20px; /* Added margin for spacing */
            margin-bottom: 20px; /* Added margin for spacing */
            }

      </style>
   </head>
   <body>
    @include('sweetalert::alert')
     


      <div class="header_section">
         @include('home.header')
      </div>
      <h1>Create a New Post</h1>


      <div class="container">
         <div class="form-container">
           
          
            <form action="{{ route('user_post') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter category (e.g., News, Traveling, Technology)">
             </div>
             

               <div class="form-group">
                  <label for="image">Post Image</label>
                  <input type="file" class="form-control-file" id="image" name="image">
               </div>

               <button type="submit" class="btn btn-primary">Publish Post</button>
            </form>
         </div>
      </div>

      @include('home.footer')

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>
