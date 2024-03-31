   <div class="container">
       <div class="coaching-details__benefit space-y">
           <div class="row">

               <div class="col-lg-6">
                   <div class="coaching-details__benefit-content">
                       <h3 class="coaching-details__benefit-title mb-3">
                           {{ $title }}
                       </h3>
                       <p class="coaching-details__benefit-text">
                           {{ $subtitle }}
                       </p>
                       <ul class="coaching-details__benefit-points list-unstyled">
                           @foreach ($requirements as $requirement)
                               <li class="d-flex align-items-start  ">
                                   <div class="icon p-1">
                                       <span class="icon-check"></span>
                                   </div>
                                   <div class="text">
                                       <p>
                                           {!! $requirement->requirements !!}
                                       </p>
                                   </div>
                               </li>
                           @endforeach
                       </ul>
                   </div>
               </div>
               <div class="col-lg-6   ">
                   <img src="{{ asset($image) }}" alt="" width="100%" style="object-fit:cover;aspect-ratio:16/10;">
               </div>
           </div>
       </div>
   </div>
