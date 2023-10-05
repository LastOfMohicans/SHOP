# STEP 1 ADD PAGINATION IN CONTROLLER
```
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        
        return view('catalog.index', compact('products'));
    }
```   
# STEP 2 CREATE BLADE TEMPLATE resources/views/catalog/index.blade.php
```
@extends('layouts.app')

@section('title')
    Catalog
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($products as $product)
                @include('catalog.card', compact('product'))
            @endforeach
        </div>

        <div class="row align-content-center">
            <div class="container">
                <div class="col-4 offset-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
```
# STEP 3 EXECUTE THIS COMMAND
```php artisan vendor:publish --tag=laravel-pagination```

# STEP 4 ADD Paginator::defaultView('vendor.pagination.bootstrap-4'); app/Providers/AppServiceProvider.php IN public function boot()
```
<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
```
### CONGRATULATIONS!!!

# SECOND METHOD: EXECUTE 2 ABOVE STEP AND ADD IN app/Providers/AppServiceProvider.php IN public function boot()
```
<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
```