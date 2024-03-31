  <div class="container" style="margin-bottom:80px; ">
      <div class="section-title mb-3 m-0 text-left my-5">
          <div class="section-title__tagline-box py-5">
              <span class="section-title__tagline">All requirements are mandatory</span>
              <div class="section-title__border-box mt-1"></div>
          </div>
          <h3 class="coaching-details__title-3 m-0 py-2">
              {{ $title }}
          </h3>
      </div>
      <hr>
      @foreach ($requirements as $requirement)
          <div class="row mt-5 mb-5">
              <div class="col-lg-4">
                  <h5 class="coaching-details__title-3 m-0">
                      {{ $requirement->requirements }}
                  </h5>
              </div>
              <div class="col-lg-8 text-dark m-lg-0" style="font-weight: 500;">
                  {!! $requirement->requirement_context !!}
              </div>
          </div>
          <hr>
      @endforeach
  </div>
