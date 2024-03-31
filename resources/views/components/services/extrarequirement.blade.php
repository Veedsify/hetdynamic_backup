<div class="container">
    <div class="coaching-details__benefit space-y">
        <div class="row">
            <div class="col-lg-6">
                <div class="">
                    <img src="{{ asset($image) }}" alt="" width="100%"
                        style="aspect-ratio: 16/11; object-fit:cover;">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="section-title mb-3  m-0 text-left">
                    <div class="section-title__tagline-box ">
                        {{-- <span class="section-title__tagline ">Option 1</span> --}}
                        {{-- <div class="section-title__border-box mt-0"></div> --}}
                    </div>
                    <h3 class="h3">
                        {{ $title }}
                    </h3>
                </div>

                <div>
                    {!! $text !!}
                </div>

            </div>
        </div>
    </div>
</div>
