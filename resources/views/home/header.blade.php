 
<div class="header_main">
   <div class="mobile_menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('about_us')}}">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('blogs')}}">Blog</a>
               </li>
               @if (Route::has('login'))
               @auth
              <li>
                   <x-app-layout>
                  </x-app-layout>
              </li>
               <li class="nav-item">
                  <a class="nav-link "  href="{{url('create_post')}} ">Create Post</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link "  href="{{url('my_post')}} ">my Post</a>
               </li>
               @else

               <li class="nav-item">
                  <a class="nav-link "  href="{{ route('login') }}">Login</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link "  href="{{ route('register') }}">Register</a>
               </li>
               @endauth
               @endif
            </ul>
         </div>
      </nav>
   </div>
   
    <div class="container-fluid">
       <div  class="logo"><a href="{{url('/')}}"><img src="images/logo.png"></a></div>
       <div class="menu_main">
          <ul>
             <li class="active"><a href="{{ url('/') }}">Home</a></li>
             <li><a href="{{url('about_us')}}">About</a></li>
             <li><a href="{{url('blogs')}}">Blog</a></li>
             @if (Route::has('login'))
             @auth
            <li>
                 <x-app-layout>
                </x-app-layout>
            </li>
            <li><a   href="{{url('create_post')}} ">Create Post</a></li>
            <li><a   href="{{url('my_post')}} ">my Post</a></li>
             
             @else
             <li><a href="{{ route('login') }}">Login</a></li>
             <li><a href="{{ route('register') }}">Register</a></li>
             @endauth
             @endif
          </ul>
       </div>
    </div>
 </div>