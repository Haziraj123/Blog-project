<style>
   .services_img {  
    height: 200px; /* Set a fixed height */  
    object-fit: cover; /* Ensure the image covers the area without distortion */  
}  
</style>
<div class="services_section layout_padding">  
   <div class="container">  
       <h1 class="services_taital">Blog Posts</h1>  
       <p class="services_text">"Join us today and start sharing your thoughts! Sign up to create and post your own blog."</p>  
       <div class="services_section_2">  
           <div class="row">  
               @foreach($posts as $post)                            
                   <div class="col-md-4 mb-4"> <!-- Added margin-bottom for spacing -->  
                       <div class="card"> <!-- Use card for better styling -->  
                           <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top services_img" alt="{{ $post->title }}">  
                           <div class="card-body">  
                               <h5 class="card-title">{{ $post->title }}</h5> <!-- Display the title of the post -->  
                               <p class="card-text">{{ Str::limit($post->content, 100) }}</p> <!-- Display a limited excerpt of the content -->  
                               <div class="btn_main">  
                                   <a href="{{ route('home.show_post', $post->id) }}" class="btn btn-primary">Read more</a> <!-- Link to the full post -->  
                               </div>  
                           </div>  
                       </div>  
                   </div>  
               @endforeach  
           </div>  
       </div>  
   </div>  
</div>