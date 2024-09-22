<div>
    <div class="card w-100 shadow-sm"
        style="border-radius: 8px; height:100%; display:flex; flex-direction:column; justify-content:space-between">
        
        <!-- Image Section -->
        <img src="{{ $imageSrc }}" class="card-img-top" alt="{{ $title }}"
            style="
            width:100%;
            height:auto;
            border-radius:8px 8px 0px 0px;
          " />

        <!-- Card Body -->
        <div class="card-body text-start w-100  " >
            <h6 class="card-title font-weight-bold"
                style="min-height:50px; max-height:50px; overflow:hidden; text-overflow:ellipsis;">
                {{ $title }}
            </h6>
        </div>

        <!-- Card Footer -->
        <div class="card-footer w-100 bg-white text-muted border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="font-weight-bold" style="font-size: 0.9em">
                        {{ $priceRange }}
                    </span>
                </div>

                <!-- Button -->
                <button class="btn btn-primary btn-sm"
                    style="
                background-color:#F52968;
                border-color:#F52968;
                border-radius:5px;
                font-size:0.85rem;
                padding:5px 10px;">
                    {{ $buttonText }}
                </button>
            </div>
        </div>
    </div>
</div>
