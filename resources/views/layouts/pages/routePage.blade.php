<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('product.show')" :inactive="request()->routeIs('product.show')">
        {{ __('Show Products') }}
    </x-nav-link>
    <x-nav-link :href="route('product.create')" :inactive="request()->routeIs('product.create')">
        {{ __('Add Product') }}
    </x-nav-link>
    <x-nav-link :href="route('product.index')" :inactive="request()->routeIs('product.index')">
        {{ __('Products List') }}
    </x-nav-link>
</div>
