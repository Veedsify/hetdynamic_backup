     <div class="col-xl-4 col-lg-4 col-md-6">
         <div class="blog-one__single">
             <div class="blog-one__img-box">
                 <div class="blog-one__img">
                     <img style="aspect-ratio: 16/12; object-fit: cover;" src="{{ asset($blog->image) }}" alt="">
                     <a href="{{ route('blog.details', $blog->slug) }}">
                         <span class="blog-one__plus"></span>
                     </a>
                 </div>
                 <div class="blog-one__date">
                     <p>{{ $blog->created_at->format('d') }} <span>{{ $blog->created_at->format('M') }}</span></p>
                 </div>
             </div>
             <div class="blog-one__content">
                 <div class="blog-one__tag-and-user">
                     <div class="blog-one__tag">
                        <p>
                            {{ \App\Models\Category::find($blog->category)->name }}
                        </p>
                     </div>
                     <div class="blog-one__user">
                         <div class="img">
                             <img src="{{ \App\Models\User::find($blog->user_id)->avatar }}" alt="" class="object-fit-square">
                         </div>
                         <div class="text">
                             <p>by {{ \App\Models\User::find($blog->user_id)->fullname}}</p>
                         </div>
                     </div>
                 </div>
                 <h3 class="blog-one__title"><a href="{{ route('blog.details', $blog->slug) }}">{{$blog->title}}</a></h3>
                 <div class="blog-one__comment-and-arrow">
                     <div class="blog-one__comment">
                         <p><span class="fas fa-comments"></span>
                            {{ \App\Models\BlogComment::where('blog_id', $blog->id)->count() }}
                            {{ \App\Models\BlogComment::where('blog_id', $blog->id)->count() > 1 ? 'Comments' : 'Comment' }}
                        </p>
                     </div>
                     <div class="blog-one__arrow">
                         <a href="{{ route('blog.details', $blog->slug) }}"><i class="icon-up-right"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
