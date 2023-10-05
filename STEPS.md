# START LESSON 2
# STEP 1
```php artisan make:controller TestController -r```

# STEP 2 routes/web.php
```Route::resource('test', TestController::class);```

# STEP 3 
```php artisan make:controller Test2Controller```

# STEP 4
```php artisan make:model Test -m```

# STEP 5
```php artisan make:command TestComand```

# STEP 6 app/Console/Commands/TestCommand.php
```
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Log::info('Test command was run!!!');
    }
}
```

# STEP 7
```php artisan test```

# STEP 8 Look at the end of file: storage/logs/laravel.log 
```[2023-04-12 17:00:50] local.INFO: Test command was run!!! ```

# START LESSON 3

# STEP 9
```php artisan make:model Product -m```

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
}
```

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
```

# STEP 10
```php artisan make:model Category -m```

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
}
```

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
```

# STEP 11
```php artisan make:model Gallery -m```

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
}
```

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
```
# STEP 12
```php artisan make:model Order -m```

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
}
```

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
```

# STEP 13 database/migrations/2023_04_14_104059_create_products_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('description');
            $table->decimal('price');
            $table->string('barcode');
            $table->integer('stock');
            $table->string('cover')->default('https://via.placeholder.com/640x480');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
```
# STEP 14
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
```
# STEP 15 database/migrations/2023_04_14_104632_create_categories_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
```
# STEP 16 database/migrations/2023_04_14_104923_create_galleries_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->index('product_id', 'gallery_product_idx');
            $table->foreign('product_id', 'gallery_product_fk')
            ->on('products')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('product_id');
        });
        Schema::dropIfExists('galleries');
    }
};

```
# STEP 17 database/migrations/2023_04_14_111254_create_orders_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('customerName')->nullable();
            $table->string('customerLastName')->nullable();
            $table->string('customerEmail')->nullable();
            $table->string('customerPhone')->nullable();
            $table->string('customerAddress')->nullable();
            $table->text('comment')->nullable();
            $table->float('total', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

```
# STEP 18
```php artisan migrate```

# STEP 19 
```php artisan make:factory ProductFactory -m Product```
# STEP 20 database/factories/ProductFactory.php
```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->numerify('Product ###'),
            'description' => $this->faker->paragraph(4, true),
            'price' => $this->faker->randomFloat(2, 10, 999),
            'barcode' => $this->faker->ean8(),
            'stock' => $this->faker->numberBetween(0, 999),
            'cover' => 'https://loremflickr.com/640/480/computer'
        ];
    }
}
```
# STEP 21
```php artisan make:factory CategoryFactory -m Category``` 
# STEP 22 database/factories/CategoryFactory.php
```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Category 1', 
                'Category 2', 
                'Category 3', 
                'Category 4', 
                'Category 5'
            ])
        ];
    }
}
```
# STEP 23 
```php artisan make:factory GalleryFactory -m Gallery```
# STEP 24 database/factories/GalleryFactory.php
```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => null            
        ];
    }
}

```
# STEP 25 
```php artisan make:seeder CategorySeeder```
# STEP 26 database/seeders/CategorySeeder.php
```
<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(5)->create();
    }
}
```
# STEP 27
```php artisan make:migration CategoryProductTable```
# STEP 28 database/migrations/2023_04_26_112059_category_product_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_product', function(Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_product');
    }
};
```
# STEP 29 app/Models/Product.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function categories()
    {
        return $this->BelongsToMany(Category::class);
    }
}
```
# STEP 30 app/Models/Category.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
```
# STEP 31 
```php artisan make:seeder ProductSeeder```

# STEP 32 database/seeders/ProductSeeder.php
```
<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(120)->create();

        $faker = Factory::create();

        Product::all()->each(function($product) use ($faker) {
            $product->slug = Str::of($product->title)->slug('-');
            $product->save();

            $categories = [];

            for ($i=0; $i < 4; $i++) { 
                $categories[] = $faker->numberBetween(1, 5);
            }

            $product->categories()->sync($categories);
        });
    }
}
```
# STEP 33 app/Models/Product.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function categories()
    {
        return $this->BelongsToMany(Category::class);
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }
}

```
# STEP 34 
```php artisan make:seeder GallerySeeder```
# STEP 35 database/seeders/GallerySeeder.php
```
<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::all()->each(function($product) {
            $gallery = Gallery::factory()->create();
            $product->gallery()->save($gallery);
        });
    }
}
```
# STEP 36
```php artisan migrate```
# STEP 37 database/seeders/DatabaseSeeder.php
```
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            GallerySeeder::class
        ]);
    }
}
```
# STEP 38
```php artisan db:seed```
# STEP 39 REGISTRATION NEW USER
```
LOGIN: dan@email.com
PASSWORD: 123456789
```
# STEP 40 START LESSON 4
```php artisan make:controller UserController --resource -m User```
# STEP 41 routes/web.php
```Route::resource('users', UserController::class);```
# STEP 42 resources/views/layouts/app.blade.php

### In the start page
```
    <!-- MDB Links -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <!-- Plugin file -->
    <link rel="stylesheet" href="{{ asset('css/addons/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
```
### At the end page
```
 <!--JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <!-- Plugin file -->
    <script src="{{ asset('js/addons/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
          $('#dtBasicExample').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
    </script>
    @yield('scripts')
```
# STEP 43 resources/views/layouts/app.blade.php 
```<title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>```
# STEP 44  routes/web.php
```
Route::get('/', function () {
    return view('welcome');
})->name('index');
```
# STEP 45
```php artisan make:command MakeViewCommand```
# STEP 46 app/Console/Commands/MakeViewCommand.php
```
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new blade template.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $view = $this->argument('view');

        $path = $this->viewPath($view);

        $this->createDir($path);

        if (File::exists($path)) {
            $this->error("File {$path} already exists!");
            return;
        }

        File::put($path, "Haha, Blade template file created.");

        $this->info("File {$path} created.");
    }


    /**
     * Get the view full path.
     *
     * @param string $view
     *
     * @return string
     */
    public function viewPath($view)
    {
        $view = str_replace('.', '/', $view) . '.blade.php';

        $path = "resources/views/{$view}";

        return $path;
    }

    /**
     * Create view directory if not exists.
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}
```
# STEP 47
### Create folder resources/views/layouts/partials
```php artisan make:view partials.footer```

# STEP 48 resources/views/partials/footer.blade.php
```
 <!-- Footer -->
        <footer class="page-footer text-center font-small mt-4 wow fadeIn">
            <div class="footer-copyright py-3">
                &copy; 2023 Copyright:
               <a href="{{ route('index') }}">
                {{ config('app.name') | 'Laravel' }}
               </a>
            </div>
        </footer>
 <!--/.Footer-->
 ```
 # STEP 49 resources/views/layouts/app.blade.php
```
  <!-- INCLUDE FOOTER -->
    @include('layouts.partials.footer')
```    
# STEP 50
```php artisan make:view layouts.partials.navbar```
# STEP 51 resources/views/layouts/partials/navbar.blade.php
```
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                      <img src="{{ asset('img/logo.png') }}" alt="logo" title="logo" style="max-height: 35px;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                         <a class="nav-link" href="{{ route('catalog.index') }}">Catalog</a>
                     </li>
                @if(isset(auth()->user()->is_admin) 
                    && auth()->user()->is_admin)
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                 </li>
                @endif
                </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
```
# STEP 52 resources/views/layouts/app.blade.php
```
<!-- INCLUDE NAVBAR -->
    @include('layouts.partials.navbar')
``` 
# STEP 53
```php artisan make:controller CatalogController --resource```
# STEP 54 routes/web.php
```Route::resource('catalog', CatalogController::class);```
# STEP 55 app/Http/Controllers/CatalogController.php
```
public function index()
{
    return view('layouts.app');
}
```
# STEP 56
```php artisan make:controller PageController```
# STEP 57 app/Http/Controllers/PageController.php
```
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->take(12)->get();
        //dd($products);
        return view('welcome', compact('products'));       
    }
}
```

# STEP 58 resources/views/welcome.blade.php
```
@extends('layouts.app')

@section('title')
    Welcome!!!
@endsection

@section('content')
      <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg" alt="First slide" style="max-height: 400px">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Light mask</h3>
                    <p>First text</p>
                </div>
            </div>
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg" alt="Second slide" style="max-height: 400px">
                    <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Strong mask</h3>
                    <p>Secondary text</p>
                </div>
            </div>
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg" alt="Third slide" style="max-height: 400px">
                    <div class="mask rgba-black-slight"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Slight mask</h3>
                    <p>Third text</p>
                </div>
            </div>
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    <div class="container">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

            <!-- Navbar brand -->
            <span class="navbar-brand">Categories:</span>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">All
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Phones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laptops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Headphones</a>
                    </li>
                </ul>
                <!-- Links -->

                <form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
            <!-- Collapsible content -->
        </nav>
        <!--/.Navbar-->

        <!--Section: Products v.3-->
        <section class="text-center mb-4">
            <!--Grid row-->
            <div class="row wow fadeIn">
                @foreach($products as $product)
                    @include('catalog.card', compact($product))
                @endforeach
            </div>
            <!--Grid row-->
            <a href="{{ route('catalog.index') }}" class="btn btn-block btn-primary">To catalog</a>
        </section>
        <!--Section: Products v.3-->
    </div>
@endsection
```
# STEP 59 /home/leonid/Документы/PROJECTS/ITVDN-SHOP/routes/web.php
```Route::get('/',[ PageController::class, 'index'])->name('index');```
# STEP 60
```php artisan make:view catalog.card```
# STEP 61  resources/views/catalog/card.blade.php
```
<div class="col-3 mb-4 d-flex align-items-stretch">
    <div class="card">
        <img class="card-img-top" src="{{ $product->cover }}" alt="{{ $product->title }}">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('catalog.show', ['slug' => $product->slug]) }}">
                    {{ $product->title }}
                </a>
            </h5>
            <p>
                @foreach($product->categories as $category)
                    <a href="">
                            <span class="badge
                             @if ($category->id == 1)
                                purple
                                @elseif($category->id == 2)
                                blue
                                @elseif($category->id == 3)
                                red
                                @elseif($category->id == 4)
                                yellow
                                @elseif($category->id == 5)
                                lime
                            @endif
                                mr-1">{{ $category->name }}</span>
                    </a>
                @endforeach
            </p>
            <p>&dollar;{{ $product->price }}</p>
            <p class="card-text">
                {{-- {{ str_limit($product->description, 120, '...') }} --}}
                {{ Str::limit($product->description, 120, '...') }}
            </p>

        </div>
        <div class="card-footer">
                <span class="badge {{ $product->stock > 0 ? 'badge-success' : 'badge-danger'}}">
                    {{ $product->stock > 0 ? 'on stock' : 'not on stock'}}
                </span>
                {{-- <span class="float-right">
                    <a href="{{ $product->stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}"
                        class="btn btn-sm btn-outline-secondary waves-effect">
                        to cart <i class="fas fa-cart-arrow-down"></i>
                    </a>
                </span> --}}
        </div>
    </div>
</div>

```
# STEP 62 routes/web.php
```
Route::resource('catalog', CatalogController::class)->parameters([
    'catalog' => 'slug'
]);
```
# STEP 63
```composer require laravel/helpers```
# STEP 64
```php artisan make:view catalog.index```
# STEP 65 app/Http/Controllers/CatalogController.php
```
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('catalog.index', compact('products'));
    }
```    
# STEP 66 app/Http/Controllers/CatalogController.php
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
# STEP 67 resources/views/catalog/index.blade.php
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
# STEP 68 
```php artisan vendor:publish --tag=laravel-pagination```
# STEP 69 app/Providers/AppServiceProvider.php COMPLETE LESSON 4
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
# STEP 70 START LESSON 5
```php artisan make:controller GalleryController```
# STEP 71 app/Models/Gallery.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
```
# STEP 72 app/Http/Controllers/CatalogController.php public function show()
```
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        dump($product);
        dump($product->gallery);
        dd($product->gallery());
    }
```  
# STEP 73
```php artisan make:view catalog.product```
# STEP 74 app/Http/Controllers/CatalogController.php public function show()
```
 /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        // dump($product);
        // dump($product->gallery);
        // dd($product->gallery());
        return view('catalog.product', compact('product'));
    }
```
# STEP 75 resources/views/catalog/product.blade.php
```
@extends('layouts.app')

@section('title') {{ $product->title }} @stop

@section('content')
    <div class="container dark-grey-text mt-5">

        <!--Grid row-->
        <div class="row wow fadeIn">
            <!--Grid column-->
            <div class="col-md-6 mb-4">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ $product->cover }}" class="img-fluid img-thumbnail"
                             alt="">
                    </div>
                </div>
                <div class="row mt-2">
                    {{-- @foreach($product->gallery->images as $photo)
                        <div class="col-3">
                            <img src="{{ $photo->path }}" alt="" class="img-fluid img-thumbnail">
                        </div>
                    @endforeach --}}
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4">

                <!--Content-->
                <div class="p-4">

                    <div class="mb-3">
                        @foreach($product->categories as $category)
                            <a href="">
                            <span class="badge
                             @if ($category->id == 1)
                                purple
                                @elseif($category->id == 2)
                                blue
                                @elseif($category->id == 3)
                                red
                                @elseif($category->id == 4)
                                yellow
                                @elseif($category->id == 5)
                                lime
                            @endif
                                mr-1">{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </div>

                    <p class="lead">
              <span class="mr-1">
              </span>
                        <span>${{ $product->price }}</span>
                    </p>

                    <p class="lead font-weight-bold">Description</p>

                    <p>
                        {{ $product->description }}
                    </p>
                </div>
                <!--Content-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <hr>

        <!--Grid row-->
        <div class="row d-flex justify-content-center wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 text-center">

                <h4 class="my-4 h4">Additional information</h4>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta
                    odit voluptates,
                    quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid"
                     alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid"
                     alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid"
                     alt="">

            </div>
            <!--Grid column-->
        </div>
    </div>
@stop
```
# STEP 76
```php artisan make:model Image -m``` 
# STEP 77 database/migrations/2023_05_24_142502_create_images_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->integer('gallery_id')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
```
# STEP 78 
```php artisan migrate```
# STEP 79 app/Models/Image.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
```
# STEP 80 app/Models/Gallery.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
```
# STEP 81 
```php artisan make:factory ImageFactory -m Image```
# STEP 82 database/factories/ImageFactory.php
```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => 'https://loremflickr.com/640/480/computer'
        ];
    }
}
```
# STEP 83 
```php artisan make:seeder ImageSeeder```
# STEP 84 database/seeders/ImageSeeder.php
```
<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::all()->each(function ($gallery) {
            $images = Image::factory()->count(4)->create();
            $gallery->images()->saveMany($images);
        });
    }
}
```
# STEP 85 database/seeders/DatabaseSeeder.php
```
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // CategorySeeder::class,
            // ProductSeeder::class,
            // GallerySeeder::class,
            ImageSeeder::class
        ]);
    }
}
```
# STEP 86
```php artisan db:seed```
# STEP 87 database/seeders/DatabaseSeeder.php
```
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            GallerySeeder::class,
            ImageSeeder::class
        ]);
    }
}
```
# STEP 88
```composer require hardevine/shoppingcart```

# STEP 89 config/app.php
```'Cart' => Gloudemans\Shoppingcart\Facades\Cart::class,```
```
<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'ExampleClass' => App\Example\ExampleClass::class,
        'Cart' => Gloudemans\Shoppingcart\Facades\Cart::class,
    ])->toArray(),

];
```
# STEP 90 
```php artisan make:controller CartController```
# STEP 92 routes/web.php
```
Route::prefix('cart')->group(function () {

    Route::get('add/{productId}', [CartController::class, 'add'])
    ->name('cart.add');

    
});
```
```
<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ PageController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('test', TestController::class);

//Route::resource('users', UserController::class);

Route::resource('catalog', CatalogController::class)->parameters([
    'catalog' => 'slug'
]);

Route::prefix('cart')->group(function () {

    Route::get('add/{productId}', [CartController::class, 'add'])
    ->name('cart.add');

    
});
```
# STEP 93 UNCOMMENT resources/views/catalog/card.blade.php
```
<span class="float-right">
    <a href="{{ $product->stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}"
    class="btn btn-sm btn-outline-secondary waves-effect">
    to cart <i class="fas fa-cart-arrow-down"></i>
    </a>
</span>

```
```
<div class="col-3 mb-4 d-flex align-items-stretch">
    <div class="card">
        <img class="card-img-top" src="{{ $product->cover }}" alt="{{ $product->title }}">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('catalog.show', ['slug' => $product->slug]) }}">
                    {{ $product->title }}
                </a>
            </h5>
            <p>
                @foreach($product->categories as $category)
                    <a href="">
                            <span class="badge
                             @if ($category->id == 1)
                                purple
                                @elseif($category->id == 2)
                                blue
                                @elseif($category->id == 3)
                                red
                                @elseif($category->id == 4)
                                yellow
                                @elseif($category->id == 5)
                                lime
                            @endif
                                mr-1">{{ $category->name }}</span>
                    </a>
                @endforeach
            </p>
            <p>&dollar;{{ $product->price }}</p>
            <p class="card-text">
                {{-- {{ str_limit($product->description, 120, '...') }} --}}
                {{ Str::limit($product->description, 120, '...') }}
            </p>

        </div>
        <div class="card-footer">
                <span class="badge {{ $product->stock > 0 ? 'badge-success' : 'badge-danger'}}">
                    {{ $product->stock > 0 ? 'on stock' : 'not on stock'}}
                </span>
                <span class="float-right">
                    <a href="{{ $product->stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}"
                        class="btn btn-sm btn-outline-secondary waves-effect">
                        to cart <i class="fas fa-cart-arrow-down"></i>
                    </a>
                </span>
        </div>
    </div>
</div>
```
# STEP 94 app/Http/Controllers/CartController.php
```
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($productId)
    {
        $product = Product::findOrFail($productId);
        Cart::add($product->id, $product->title, 1, $product->price);
        return back();
    }
}
```
# STEP 95 resources/views/layouts/partials/navbar.blade.php
```
@if (Cart::total() > 0)
    <li class="nav-item">
        <a href="{{ route('cart.index') }}" class="nav-link waves-effect">
            <span class="badge red z-depth-1 mr-1">
                {{ Cart::total() }}
            </span>
            <i class="far far-shopping-cart"></i>
            <span class="clearfix d-none d-sm-inline-block">
                Cart
            </span>
        </a>
     </li>
@endif
```
```
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                      <img src="{{ asset('img/logo.png') }}" alt="logo" title="logo" style="max-height: 35px;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                         <a class="nav-link" href="{{ route('catalog.index') }}">Catalog</a>
                     </li>
                @if(isset(auth()->user()->is_admin) 
                    && auth()->user()->is_admin)
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                 </li>
                @endif
                </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Cart::count() > 0)
                            <li class="nav-item">
                                <a href="{{ route('cart.index') }}" class="nav-link waves-effect">
                                    <span class="badge red z-depth-1 mr-1">
                                        {{ Cart::count() }}
                                    </span>
                                    <i class="far far-shopping-cart"></i>
                                    <span class="clearfix d-none d-sm-inline-block">
                                        Cart
                                    </span>
                                </a>
                            </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
```
# STEP 96  app/Http/Controllers/CartController.php 
```
Route::get('/', [CartController::class, 'index'])->name('cart.index');
```   
```
Route::prefix('cart')->group(function () {

    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    
    Route::get('add/{productId}', [CartController::class, 'add'])
    ->name('cart.add');

    
});
```
# STEP 97 app/Http/Controllers/CartController.php
```
public function index()
{
    return view('cart.index');
} 
```
# STEP 98 
```php artisan make:view cart.index```
# STEP 99 resources/views/cart/index.blade.php
```
@extends('layouts.app')

@section('title')
{{ __('Cart') }}
@endsection

@section('content')
    <div class="container wow fadeIn">
        <h2 class="my-5 h2 text-center">Your cart</h2>

        @if(Cart::count() > 0)
            <table class="table table-striped">
                <thead class="black white-text">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 0; @endphp
                @foreach(Cart::content() as $key => $item)
                    @php $i++; @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="post">
                                {!! method_field('patch') !!}
                                {!! csrf_field() !!}
                                <input type="hidden" name="productId" value="{{ $item->rowId }}">
                                <input type="number" name="qty" value="{{ $item->qty }}" min="1">
                                <button class="btn btn-sm btn-primary" type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('cart.drop', ['productId' => $item->rowId]) }}" type="button"
                               class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3">Total:</td>
                    <td><strong>&dollar;{{ Cart::total() }}</strong></td>
                </tr>
                </tfoot>
            </table>
            <a href="{{ route('cart.destroy') }}" class="btn-danger btn btn-lg">Clear cart</a>
            <a href="{{ route('cart.checkout') }}" class="btn-success btn btn-lg">
                Checkout <i class="fa fa-arrow-right"></i>
            </a>
        @else
            <blockquote class="blockquote bq-warning">
                <p class="bq-title">Do you like our products?</p>
                <p>Your cart is empty now. You can choose product in our <a href="{{ route('catalog.index') }}">catalog</a> and
                    enjoy them!
                </p>
            </blockquote>
        @endif
    </div>
@endsection
```
# STEP 100 routes/web.php
```
Route::patch('update', [CartController::class, 'update'])
    ->name('cart.update');
```
```
Route::prefix('cart')->group(function () {

    Route::get('/', [CartController::class, 'index'])->name('cart.index');

    Route::get('add/{productId}', [CartController::class, 'add'])
    ->name('cart.add');

    Route::patch('update', [CartController::class, 'update'])
    ->name('cart.update');

    Route::get('drop', [CartController::class, 'drop'])
    ->name('cart.drop');

    Route::get('destroy', [CartController::class, 'destroy'])
    ->name('cart.destroy');

    Route::get('checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');
});
```
# STEP 101 
```php artisan make:request CartUpdateRequest```
# STEP 102 app/Http/Requests/CartUpdateRequest.php
```
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'productId' => 'required|string',
            'qty'       => 'required|integer'

        ];
    }
}
```
# STEP 103 app/Http/Controllers/CartController.php
```
public function update(CartUpdateRequest $request)
{
    Cart::update($request->productId, $request->qty);       
    return to_route('cart.index');

    // Cart::update($request->productId, 
    // [
    //     'name' => 'My awesom test product', 
    //     'qty'=> 256,
    //     'options' => [ 'size' => 'XL']
    // ]);
    // dd(Cart::content());
}
```
```
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartUpdateRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add($productId)
    {
        $product = Product::findOrFail($productId);
        Cart::add($product->id, $product->title, 1, $product->price);
        return back();
    }

    public function update(CartUpdateRequest $request)
    {
        Cart::update($request->productId, $request->qty);       
        return to_route('cart.index');

        // Cart::update($request->productId, 
        // [
        //     'name' => 'My awesom test product', 
        //     'qty'=> 256,
        //     'options' => [ 'size' => 'XL']
        // ]);
        // dd(Cart::content());
    }
}
```
# STEP 104 app/Http/Controllers/CartController.php
```
public function drop(Request $request)
{
    Cart::remove($request->productId);
    return to_route('cart.index');
}

public function destroy()
{
    Cart::destroy();
    return to_route('cart.index');
}
```
# STEP 105
```php artisan make:view orders.checkout```
# STEP 106 resources/views/orders/checkout.blade.php
```
@extends('layouts.app')

@section('title')
{{ __('Checkout') }}
@endsection

@section('content')
    <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout</h2>

        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4">
                <!--Card-->
                <div class="card">
                    @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    </div>
                    @endif
                    <!--Card content-->
                    <form class="card-body" action="{{ route('order.store') }}" method="post">
                    {{ csrf_field() }}

                    <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6 mb-2">
                                <!--firstName-->
                                <div class="form-group">
                                    <label for="firstName" class="">First name</label>
                                    <input type="text" id="firstName" class="form-control" name="customerName"
                                           value="{{ auth()->user()->name ?? null }}">
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">
                                <!--lastName-->
                                <div class="form-group">
                                    <label for="lastName" class="">Last name</label>
                                    <input type="text" id="lastName" class="form-control" name="customerLastName"
                                           value="{{ auth()->user()->lastname ?? null }}">
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--email-->
                        <div class="form-group mb-5">
                            <label for="email" class="">Email</label>
                            <input type="text" id="email" class="form-control" placeholder="youremail@example.com"
                                   name="customerEmail" value="{{ auth()->user()->email ?? null }}">
                        </div>

                        <!--address-->
                        <div class="form-group mb-5">
                            <label for="phone" class="">Phone number</label>
                            <input type="text" id="phone" class="form-control" placeholder="+1 (123) 456-7890"
                                   name="customerPhone" value="{{ auth()->user()->phone ?? null }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="address" class="">Address</label>
                            <input type="text" id="address" class="form-control"
                                   placeholder="Park av., 123, New York, USA"
                                   name="customerAddress" value="{{ auth()->user()->address ?? null }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="comment" class="">Comment</label>
                            <textarea type="text" id="comment" class="form-control"
                                      placeholder="Comment"
                                      name="customerComment"></textarea>
                        </div>

                        <hr class="mb-4">

                        @guest
                        @else
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info" name="updateUser">
                                <label class="custom-control-label" for="save-info">Save this information for next
                                    time</label>
                            </div>
                            <hr class="mb-4">
                        @endif
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Order it</button>

                    </form>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ Cart::total() }}</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3 z-depth-1">
                    @foreach(Cart::content() as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $item->name }}</h6>
                                <small class="text-muted">x {{ $item->qty }}</small>
                            </div>
                            <span class="text-muted">&dollar;{{ $item->price *  $item->qty }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>&dollar;{{ Cart::total() }}</strong>
                    </li>
                </ul>
                <!-- Cart -->
                <a href="{{ route('cart.index') }}" class="btn-info btn btn-lg"><i class="fa fa-arrow-left"></i> Change
                    order</a>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
@endsection
```
# STEP 107 
```php artisan make:migration EditUsersTable --table=users```
# STEP 108 database/migrations/2023_06_07_104752_edit_users_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->string('address')->after('phone')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
};
```
# STEP 109
```php artisan migrate```

# STEP 111
```php artisan make:model OrderItem -m```

# STEP 112 database/migrations/2023_06_07_162620_create_order_items_table.php
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('order_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
```
# STEP 113 
```php artisan migrate```
# STEP 114
```php artisan make:controller OrderController -r -m Order```
# STEP 115 routes/web.php
```
Route::resource('order', OrderController::class)->only([
    'store', 'show', 'update', 'destroy'
]);
```
# STEP 116 app/Http/Controllers/CartController.php
```
public function checkout()
{
    return view('orders.checkout');
}
```    
# STEP 117 
```php artisan make:request StoreOrderRequest```
# STEP 118 app/Http/Requests/StoreOrderRequest.php
```
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'customerName'       => 'required|string|max:150',
            'customerLastName'   => 'string|max:150',
            'customerEmail'      => 'required|email',
            'customerPhone'      => 'required|string',
            'customerAddress'    => 'string',
            'customerComment'    => 'string',
            'updateUser'         => 'boolean'
        ];
    }
}
```
# STEP 119 app/Http/Controllers/OrderController.php
```
/**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'customerName' => $request->customerName,
            'customerLastName' => $request->customerLastName,
            'customerEmail' => $request->customerEmail,
            'customerPhone' => $request->customerPhone,
            'customerAddress' => $request->customerAddress,
            'comment' => $request->customerComment,
            'total' => Cart::total(2, '.', '')
        ]);

        foreach (Cart::content() as $row) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $row->model->id,
                'price' => $row->model->price,
                'quantity' => $row->qty
            ]);
        }

        if ($request->has('updateUser')) {
            $user = auth()->guest() ? User::where('email', $request->email)->first() : auth()->user();

            if (!is_null($user)) {
                $user->update([
                    'name' => $request->customerName,
                    'lastname' => $request->customerName,
                    'email' => $request->customerName,
                    'phone' => $request->customerName,
                    'address' => $request->customerName
                ]);
                $order->update([
                    'user_id' => $user->id
                ]);
            }
        }

        Cart::destroy();

        return to_route('cart.success', ['orderId' => $order->id]);
    }
```
```
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'customerName' => $request->customerName,
            'customerLastName' => $request->customerLastName,
            'customerEmail' => $request->customerEmail,
            'customerPhone' => $request->customerPhone,
            'customerAddress' => $request->customerAddress,
            'comment' => $request->customerComment,
            'total' => Cart::total(2, '.', '')
        ]);

        foreach (Cart::content() as $row) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $row->model->id,
                'price' => $row->model->price,
                'quantity' => $row->qty
            ]);
        }

        if ($request->has('updateUser')) {
            $user = auth()->guest() ? User::where('email', $request->email)->first() : auth()->user();

            if (!is_null($user)) {
                $user->update([
                    'name' => $request->customerName,
                    'lastname' => $request->customerName,
                    'email' => $request->customerName,
                    'phone' => $request->customerName,
                    'address' => $request->customerName
                ]);
                $order->update([
                    'user_id' => $user->id
                ]);
            }
        }

        Cart::destroy();

        return to_route('cart.success', ['orderId' => $order->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
```
# STEP 120 
```php artisan make:view cart.success```
# STEP 121 routes/web.php
```
Route::get('success/{orderId}', [CartController::class, 'success'])->name('cart.success');
```
# STEP 122 resources/views/cart/success.blade.php
```
@extends('layouts.app')

@section('title') Thanks for your order @stop

@section('content')
    <div class="container">
        <blockquote class="blockquote bq-success">
            <p class="bq-title">Thanks for your order!</p>
            <p>Hey, {{ $order->user->name ?? 'dear customer' }}!</p>

            <p>Your order <strong>#{{ $order->id }}</strong> was successfully created. We will call you as soon as possible!</p>
        </blockquote>

        <div class="row">
            <div class="col">
                <a href="{{ route('index') }}" class="btn btn-success">Get back</a>
            </div>
        </div>
    </div>
@stop
```
# STEP 123 app/Http/Controllers/CartController.php
```
public function success($orderId)
{
    $order = Order::findOrFail($orderId);

    return view('cart.success', compact('order'));
}
```  
# STEP 124 app/Models/User.php
```
protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'phone',
        'address'
    ];
``` 
# STEP 125 CREATE: config/cart.php    
```
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default tax rate
    |--------------------------------------------------------------------------
    |
    | This default tax rate will be used when you make a class implement the
    | Taxable interface and use the HasTax trait.
    |
    */

    'tax' => 0,

    /*
    |--------------------------------------------------------------------------
    | Shoppingcart database settings
    |--------------------------------------------------------------------------
    |
    | Here you can set the connection that the shoppingcart should use when
    | storing and restoring a cart.
    |
    */

    'database' => [

        'connection' => null,

        'table' => 'shoppingcart',

    ],

    /*
    |--------------------------------------------------------------------------
    | Destroy the cart on user logout
    |--------------------------------------------------------------------------
    |
    | When this option is set to 'true' the cart will automatically
    | destroy all cart instances when the user logs out.
    |
    */

    'destroy_on_logout' => false,

    /*
    |--------------------------------------------------------------------------
    | Default number format
    |--------------------------------------------------------------------------
    |
    | This defaults will be used for the formated numbers if you don't
    | set them in the method call.
    |
    */

    'format' => [

        'decimals' => 2,

        'decimal_point' => '.',

        'thousand_seperator' => ''

    ],

];
```
# STEP 126 app/Http/Controllers/CartController.php
```
public function add($productId)
{
    $product = Product::findOrFail($productId);
    $cartRow = Cart::add($product->id, $product->title, 1, $product->price);
    $cartRow->associate(Product::class);
    return back();
}
```    
# STEP 127 app/Http/Controllers/OrderController.php
```
foreach (Cart::content() as $row) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $row->model->id,
                'price' => $row->model->price,
                'quantity' => $row->qty
            ]);
        }
``` 
```
 /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'customerName' => $request->customerName,
            'customerLastName' => $request->customerLastName,
            'customerEmail' => $request->customerEmail,
            'customerPhone' => $request->customerPhone,
            'customerAddress' => $request->customerAddress,
            'comment' => $request->customerComment,
            'total' => Cart::total(2, '.', '')
        ]);

        foreach (Cart::content() as $row) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $row->model->id,
                'price' => $row->model->price,
                'quantity' => $row->qty
            ]);
        }

        if ($request->has('updateUser')) {
            $user = auth()->guest() ? User::where('email', $request->email)->first() : auth()->user();

            if (!is_null($user)) {
                $user->update([
                    'name' => $request->customerName,
                    'lastname' => $request->customerName,
                    'email' => $request->customerName,
                    'phone' => $request->customerName,
                    'address' => $request->customerName
                ]);
                $order->update([
                    'user_id' => $user->id
                ]);
            }
        }

        Cart::destroy();
        
        return to_route('cart.success', ['orderId' => $order->id]);
    }
```
# STEP 128 app/Models/Order.php
```
public function user()
{
    return $this->belongsTo(User::class);
}
``` 
# STEP 129 app/Models/User.php
```
public function orders()
{
    return $this->hasMany(Order::class);
}
``` 
# STEP 130 app/Models/Order.php
```
public function items()
{
    return $this->hasMany(OrderItem::class);
}
```  
# STEP 131 app/Models/OrderItem.php FINISHED PROJECT
```
public function order()
{
    return $this->belongsTo(Order::class);
}
```                       