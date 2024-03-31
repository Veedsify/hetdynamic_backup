<div class="container">
    <div class="mt-5 p-lg-0 p-2 space-y">
        <div class="coaching-details__benefit-content">
            <h3 class="coaching-details__benefit-title mb-5">
                {{ $title }}
            </h3>
            <ul class="coaching-details__benefit-points list-unstyled gap-2 d-flex flex-column ">
                @foreach ($benefits as $benefit)
                    <li
                        class="d-flex align-items-center border rounded-3 p-3
                                            ">
                        <div class="icon">
                            <span class="icon-check"></span>
                        </div>
                        <div class="text">
                            <p>
                                {{
                                    $benefit->benefits
                                }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
