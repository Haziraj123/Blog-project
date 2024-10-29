 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Blog Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admintemplate/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admintemplate/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom CSS-->
    <link rel="stylesheet" href="admintemplate/css/style.default.css">
    <link rel="stylesheet" href="admintemplate/css/custom.css">
    <style>
      .h1
      {
        color: white;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        text-align: center;
        margin-top: 5px; 
      }
      /* Custom styles for the post cards */
      .post-card {  
        background-color: #2c3e50;  
        color: white;  
        border-radius: 10px;  
        margin-bottom: 30px;  
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  
        transition: transform 0.2s ease-in-out;  
        display: flex;  
        flex-direction: column;  
          
        height: 100%; /* Ensures all cards take the same height */  
}
      .post-card:hover {
        transform: translateY(-5px);
      }
      .post-image {
        width: 100%;
        height: 200px;  
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 0; /* Ensure no padding */
        margin: 0; /* Ensure no extra margin */
      }

      .post-body {
        padding: 15px;
      }
      .post-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #e74c3c;
        
        
      }
      .post-content {
        color: #ecf0f1;
        font-size: 1rem;
         
      }
      .read-more-btn {  
        background-color: #e74c3c;  
        border: none;  
        color: white;  
        padding: 10px 20px; /* Keep this padding */  
        text-align: center;  
        text-decoration: none;  
        display: inline-block;  
        font-size: 16px; /* Keep this font size */  
        margin-top: 15px;  
        border-radius: 5px;  
       transition: background-color 0.3s;  
    }  
        .btn-danger {  
          background-color: #e74c3c; /* Match the theme */  
          border: none;  
          color: white;  
          padding: 10px 20px; /* Match the padding */  
          border-radius: 5px;  
          cursor: pointer;  
          font-size: 16px; /* Match the font size */  
        margin-top: 15px; 
        }
        .button-container {
            display: flex; 
            justify-content: space-between; /* This will push the buttons to the edges */   
             align-items: center; /* Center align items vertically */       
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

    /* Style for the Accept and Reject buttons */
    .button-container button {  
 
        margin-left: 5px; /* Add some space between the buttons */  
    }
   </style>
  </head>
  <body>
    @include('sweetalert::alert')

    @include('admin.adheader')

    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')

      <div class="page-content">
        <h1 class="h1">All Blog Posts</h1>
        <div class="container mt-5">
         
          <div class="row">
            @foreach($posts as $post)
            
            <div class="col-lg-4 col-md-6 col-sm-12" style="padding: 20px">
              <div class="post-card">
                <a href="{{ route('admin.edit', $post->id) }}" class="edit-btn btn btn-primary btn-sm">Edit</a>
                <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt=" ">
            
                <div class="post-body">
                  <!-- Post Title -->
                  <h5 class="post-title">{{ $post->title }}</h5>
            
                  <p style="color: skyblue">Status: {{ $post->post_status }}</p>
            
                 <!-- Accept and Reject buttons if status is pending -->  
                    @if($post->post_status == 'pending')  
                    <div class="button-container" style="position: absolute; top: 10px; right: 10px;">  
                        <a href="{{url('accept_post', $post->id)}}"  style="display: inline;">  
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to accept this post!! ?')">Accept</button>  
                        </a>  

                        <a href="{{url('reject_post', $post->id)}} " style="display: inline;">  
                            <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure to reject this post!! ?')">Reject</button>  
                        </a>  
                    </div>  
                    @endif
            
                  <!-- Post Content (Limited to 50 characters) -->
                  <p class="post-content">{{ Str::limit($post->content, 50) }}</p>
            
                  <!-- Read More Button -->
                  <div class="button-container">
                    <a href="{{ route('admin.show', $post->id) }}" class="read-more-btn">Read More</a>
            
                    <form action="{{ route('admin.destroy', $post->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="confirmation(event)">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
              
            @endforeach
          </div>
        </div>
        
      </div>


      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
          </div>
        </div>
      </footer>
    </div>

    <!-- JavaScript files-->
    <script src="admintemplate/vendor/jquery/jquery.min.js"></script>
    <script src="admintemplate/vendor/popper.js/umd/popper.min.js"></script>
    <script src="admintemplate/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admintemplate/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="admintemplate/vendor/chart.js/Chart.min.js"></script>
    <script src="admintemplate/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admintemplate/js/charts-home.js"></script>
    <script src="admintemplate/js/front.js"></script>


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
