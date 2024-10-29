<!DOCTYPE html>
<html>
    
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $post->title }} - Blog Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        
        <base href="/public">
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
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style>
            .post-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 30px;
                margin-bottom: 40px;
            }
            .post-image {
                width: 100%;
                max-width: 400px;
                height: auto;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .post-content-wrapper {
                flex: 1;
                padding: 20px;
            }
            .post-title {
                font-size: 2rem;
                font-weight: bold;
                margin-bottom: 20px;
                color: white;
            }
            .post-category {
                font-size: 1rem;
                color: #007bff; /* Bootstrap primary color for better visibility */
                margin-bottom: 20px;
            }

            .category-name {
                font-weight: bold; /* Makes the category name bold */
            }

            .post-meta {
                font-size: 0.9rem;
                color: #6c757d;
                margin-bottom: 20px;
            }
            .post-content {
                font-size: 1.1rem;
                line-height: 1.7;
                margin-bottom: 30px;
            }
            .back-btn {
                text-align: center;
            }
            .btn-primary {
                padding: 10px 20px;
                font-size: 1rem;
            }
        </style>
    </head>
    <body>
 
        @include('admin.adheader') 

        <div class="d-flex align-items-stretch">
            @include('admin.sidebar')

            <div class="page-content">
                <div class="container mt-5">
                    <div class="post-wrapper">
                        <div>
                            <!-- Display Post Image -->
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="Post Image">
                            @endif
                        </div>
                        <div class="post-content-wrapper">
                            <!-- Post Title -->
                            <div class="post-title">{{ $post->title }}</div>

                            <div class="post-category">
                                <strong>Category:</strong> <span class="category-name">{{ $post->category }}</span>
                            </div>

                            <!-- Post Meta Info -->
                            <p class="post-meta">Posted on: {{ $post->created_at->format('F j, Y') }}</p>

                            <!-- Post Content -->
                            <div class="post-content">
                                {!! nl2br(e($post->content)) !!}
                            </div>

                            <!-- Back Button -->
                            <div class="back-btn">
                                <a href="{{url('view_post')}} " class="btn btn-primary">Back to Posts</a>
                            </div>
                        </div>
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
        <script src="admintemplate/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="admintemplate/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="admintemplate/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="admintemplate/vendor/chart.js/Chart.min.js"></script>
        <script src="admintemplate/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="admintemplate/js/charts-home.js"></script>
        <script src="admintemplate/js/front.js"></script>
    </body>
</html>
