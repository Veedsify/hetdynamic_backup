<div class="container">
    <div class="coaching-details__benefit space-y">
        <div class="row">
            <div class="col-lg-7">
                <div class="coaching-details__benefit-content text-dark " style="font-weight: 500; ">
                    <h3 class="coaching-details__benefit-title mb-4">
                        {{ $title }}
                    </h3>
                    <div>
                        {!! $text !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-5 m-lg-0 mt-3 ">
                <img src="{{ asset($image) }}"
                    alt="" width="100%">
            </div>
        </div>
    </div>
</div>
