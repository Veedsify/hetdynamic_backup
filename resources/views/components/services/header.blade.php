<!--Countries Details Start-->
<section class="coaching-details">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coaching-details__right">
                    <div class=" position-relative">
                        <img src="{{ asset($featuredimage) }}" alt="" class="w-100"
                            style="aspect-ratio: 16/9; object-fit:cover;">
                        <div class="position-absolute bottom-0 end-0 p-lg-5 p-2 bg-base">
                            <div class="row">
                                @foreach ($highlights as $highlight)
                                    <div class="col-{{ 12 / $highlights->count() }} px-5">
                                        <h1 class="fw-bold text-white text-nowrap">{{ $highlight->feature_title }}
                                        </h1>
                                        <p class="fw-bold text-white text-nowrap">
                                            {{ $highlight->feature_context }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
