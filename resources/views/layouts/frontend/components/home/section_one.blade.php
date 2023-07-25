{{-- ============ PRODUCT DISPLAY =============== --}}


@foreach ($products as $item)
    <div class="col">
        <div class="card shadow" style="width: 18rem;">
            <img src="{{ $item->image_url }}" alt="img-product" class="card-img-top p-4" />
            <div class="card-body">
                <h5><a href="{{ route('detailProduct', ['id' => $item->id]) }}"
                        class="card-title text-decoration-none text-dark">{{ $item->name }}
                    </a>
                </h5>
                <p class="card-text text-muted">{{ $item->description }}</p>
                <a href="#" class="card-text text-decoration-none text-dark text-sm"><img width="16"
                        height="16" src="https://img.icons8.com/small/16/4D4D4D/sorting-answers.png"
                        alt="sorting-answers" /> -
                    @if ($item->category_id == 1)
                        <span class="badge rounded-pill text-bg-success">Sayuran</span>
                    @else
                        <p>Category not found</p>
                    @endif
                </a>
                <p class="card-text mt-2 text-success "><span class="fw-bold">Rp {{ $item->price }}
                        /kg</span></p>
                <a href="{{ route('addToCart', $item->id) }}" class="btn btn-success w-100 btn-sm">Beli</a>
            </div>
        </div>
    </div>
@endforeach
<div class="pagination">
    {{ $products->links() }}
</div>
