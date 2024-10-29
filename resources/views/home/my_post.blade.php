<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>A World</title>
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
      <!-- Custom CSS -->
      <style>
      .container-fluid{
            position: relative;
            z-index: 1;
       }


         body {
            background-color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
         }
         h1 {
            text-align: center;
            margin-top: 50px;
            font-weight: 700;
            color: #333;
         }
         .post-container {
            margin-top: 30px;
         }
         .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s ease;
         }
         .card:hover {
            transform: scale(1.05);
         }
         .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #007bff;
         }
         .card-text {
            color: #555;
         }
         .read-more-btn {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
         }
         .read-more-btn:hover {
            background-color: #0056b3;
         }
         .empty-post-message {
            text-align: center;
            margin-top: 50px;
            color: #777;
         }
          /* Style for the Edit button */
            .edit-btn {
            position: absolute;
            top: 10px; /* Adjust to your preference */
            left: 10px; /* Adjust to your preference */
            z-index: 10; /* Ensure the button is above the image */
            background-color: #3498db; /* Customize button color */
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            color: white;
            cursor: pointer;
            }
            .post-card {
            position: relative; /* Ensure the post card is relative so the Edit button can be positioned inside */
            }
            /* Optional hover effect for Edit button */
            .edit-btn:hover {
            background-color: #2980b9;
            }
      </style>
   </head>
   <body>
    @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>

      <!-- Main content -->
      <div class="container post-container">
         <h1>Your Posts</h1>

         <!-- If there are no posts -->
         @if($posts->isEmpty())
            <p class="empty-post-message">You have not posted anything yet.</p>
         @else
         <!-- Posts list -->
         <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4">
               <div class="card mb-4">
                  <!-- Display post image if available -->
                  <a href="{{route('home.edit', $post->id)}} " class="edit-btn btn btn-primary  ">Edit</a>
                  @if($post->image)
                     <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                  @endif
                  <div class="card-body">
                     <h5 class="card-title">{{ $post->title }}</h5>
                     <p class="card-text">{{ Str::limit($post->content, 100) }}</p>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('home.show_post', $post->id) }}" class="btn read-more-btn btn-sm">Read More</a>

                        <form action="{{ route('delete_post', $post->id) }}" method="POST" style="display:inline;">
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirmation(event)">Delete</button>  
                        </form>
                   </div>
                     {{-- onclick="return confirm('Are you sure you want to delete this post?')" --}}
                  </div>
               </div>
            </div>
            @endforeach
            
         </div>
         @endif  
      </div>

      <!-- Footer section -->
      @include('home.footer')
       
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

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function confirmation(ev) {
          ev.preventDefault(); // Prevent the default form submission
          const form = ev.currentTarget.closest("form"); // Get the closest form element
          
          Swal.fire({
              title: "Are you sure you want to delete this post?",
              text: "You will not be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel!",
              
          }).then((result) => {
              if (result.isConfirmed) {
                  form.submit(); // Submit the form if confirmed
              }
          });
      }
  </script>

   </body>
</html>
