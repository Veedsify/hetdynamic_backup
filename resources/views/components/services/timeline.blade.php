 <div class="container">
     <div class="section-title mb-3  m-0 text-left my-5">
         <div class="section-title__tagline-box ">
             <span class="section-title__tagline  m-0 ">Timeline of Events</span>
             <div class="section-title__border-box mt-1"></div>
         </div>
         <h3 class="coaching-details__title-3 m-0 py-2">
             {{ $title }}
         </h3>
     </div>
     <hr>
     @foreach ($timeline as $event)
         <div class="row my-5">
             <div class="col-lg-4">
                 <span>{{ $event->duration }}</span>
                 <h5 class="coaching-details__title-3 m-0 mt-2">
                     {{ $event->plan }}
                 </h5>
             </div>
             <div class="col-lg-8 text  text-dark m-lg-0 mt-3 " style="font-weight: 500;">
                 {!! $event->timeline_context !!}
             </div>
         </div>
         <hr>
     @endforeach


 </div>
