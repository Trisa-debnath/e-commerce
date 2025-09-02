<div >
    <!-- Searchbar -->
    <form class="d-flex search-bar me-5" wire:submit.prevent="search">
        <input 
            class="form-control me-2" 
            type="search" 
            placeholder="Search products..." 
            aria-label="Search"
            wire:model="query"
        >
        <button class="btn btn-light" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <!-- Search results -->
    @if(!empty($products))
        <div class="mt-3">
            <h5>Search Results:</h5>
            <ul class="list-group">
                @forelse($products as $product)
                    <li class="list-group-item">{{ $product->product_name }}</li>
                @empty
                    <li class="list-group-item">No products found</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>