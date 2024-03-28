<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Service;
use App\Models\Reservation;
use App\Models\User;

class ServiceController extends Controller
{

    public function index(Request $request)
{
    $selectedOption = $request->input('selected_option', 'Visos paslaugos');
    $categories = Category::All();
    if ($selectedOption == 'Visos paslaugos') {
        $data = Category::distinct()->get();
    } else {
        $data = Category::where('category', $selectedOption)->distinct()->get();
    }
    return view('index', compact('categories', 'data', 'selectedOption'));
}

    public function create()
    {
        $data = Category::all();
        return view('create',['data'=>$data]);
    }
    public function store(Request $request)
    {
        $userId = session('loginID');
        $userInfo = User::find($userId);

        if (!$userInfo) {
            return redirect()->back()->with('error',(__('messages.NerastasVartotojas')));
        }

        $data = new Category;
        $data->User_id = $userInfo->id;
        $data->category = $request->input('category');
        $data->provider = $request->input('provider');
        $data->service = $request->input('service');
        $data->address = $request->input('address');
        $data->save();

        return redirect()->route('index');
    }
    public function filterdata(Request $request)
{
    $selectedCategory = $request->input('category');
    $data = Category::where('category', $selectedCategory)
    ->select('category') ->distinct() ->get();

    return view('index', compact('selectedCategory','data'));
}

    public function show(Category $item)
    {
        return view('show',compact('item'));
    }
    public function storeservice(Request $request)
    {
        $service = new Service();

        $service->categories_id = $request->input('provider_id');
        $service->service = $request->input('service');
        $service->price = $request->input('price');
        $service->time = $request->input('time');
        $service->save();

        return redirect()->route('show', ['id' => $request->input('provider_id')]);
    }

    public function createservice($providerId)
    {
        $dataMain = Category::find($providerId);
        $dataService = Service::all();
        return view('AddNewService', ['dataService' => $dataService, 'dataMain' => $dataMain, 'providerId' => $providerId]);

    }
}


