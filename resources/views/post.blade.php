@extends('layouts.blog-post')
@section('content')
	<div class="col-md-8">
            <!-- First Blog Post -->
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
            <hr>
          		<img src="{{$post->photo? asset('postimage/'.$post->photo->name): 'https://via.placeholder.com/400
C/O https://placeholder.com/ '}}" width="100%" height="250">
            <hr>
            <p>{!!$post->body!!}</p>
            <!-- start disqus -->
            <div id="disqus_thread"></div>
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://codinghack.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
            </noscript>                            
            <!-- end disqus -->
  </div>
@endsection



