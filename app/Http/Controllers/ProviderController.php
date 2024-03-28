<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ProviderController extends Controller
{
    public function index()
{
    $addService = Category::get();

    foreach ($addService as $key => $value) {
        $criteria = ['add_services_id' => $value->id];
        $data = [
            'add_services_id' => $value->id,
            'service' => $value->service,
            'price' => $value->price,
            'time' => $value->time,
        ];
        Service::updateOrInsert($criteria, $data);
    }

    return view('show', compact('addService','data'));
}
    public function filterdata(Request $request)
    {
        $data = Category::where('id',2)->select('id')->distinct()->get();
        return view('show', compact('data'));
    }
    public function show($id, Request $request)
    {
        $item = Category::with('services')->find($id);
        $services = Service::all();

        $userInfo = User::find(Session::get('loginID'));

        $userRole = $userInfo ? $userInfo->role : null;

        if ($userRole == 2) {
            $item->services = $item->services->where('role_restriction', '!=', 2);
        }
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if ($minPrice && $maxPrice) {
            $item->services = $item->services->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $permissionAdd = $userInfo->addServices->contains('id', $id);

        $bookedDates = Reservation::where('service_id', $id)->pluck('booking_date')->toArray();
        $bookedTimes = Reservation::where('service_id', $id)->pluck('booking_time')->toArray();
        $reservations = Reservation::all();
        $bookedSlots = [];

    foreach ($bookedDates as $index => $date) {
        $bookedSlots[] = $date . ' ' . $bookedTimes[$index];
    }
        return view('show', compact('item', 'services', 'userRole', 'permissionAdd', 'bookedDates', 'bookedTimes','reservations','userInfo','request','bookedSlots'));
    }

    public function updatePrice($id, Request $request)
{
    $service = Service::find($id);

    if (!$service) {
        return redirect()->back()->with('error', 'Service not found');
    }

    $userInfo = User::find(Session::get('loginID'));

    $request->validate([
        'price' => 'required|numeric',
    ]);

    $service->price = $request->input('price');
    $service->save();

    if($service)
    {
        return redirect()->back()->with('success',__('messages.Veiksmas'));
    }
    else
    {
        return redirect()->back()->with('fail', __('messages.NVeiksmas'));
    }

}

    public function updateService(Request $request, $id)
    {
        $service = Service::find($id);
        $userInfo = User::where('id', '=', Session::get('loginID'))->first();
        if ($userInfo->role != 2) {
            return redirect()->back()->with('error', (__('messages.Privilegija')));
        }
        $service->service = $request->input('new_service_name');
        $service->save();
        if ($service) {
            return redirect()->back()->with('success', __('messages.Veiksmas'));
        } else {
            return redirect()->back()->with('fail', __('messages.NVeiksmas'));
        }

    }
    public function removeService($id)
    {
        $service = Service::find($id);
        $userInfo = User::where('id', '=', Session::get('loginID'))->first();
        if ($userInfo->role != 2) {
            return redirect()->back()->with('error', (__('messages.Privilegija')));
        }
        $service->delete();
        if ($service) {
            return redirect()->back()->with('success', __('messages.Pasalinta'));
        } else {
            return redirect()->back()->with('fail', __('messages.NVeiksmas'));
        }
    }

    public function bookService(Request $request, $id)
    {
        $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'service_id' => 'required|exists:services,id',
        ]);

        $selectedService = Service::findOrFail($request->input('service_id'));
        $item = Category::with('services')->find($id);
        $userInfo = User::where('id', '=', session('loginID'))->first();

        $existingReservation = Reservation::where('service_id', $selectedService->id)
            ->where('booking_date', $request->input('booking_date'))
            ->where('booking_time', $request->input('booking_time'))
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('fail', (__('messages.Neuzrezervuota')));
        }

        $booking = new Reservation();
        $booking->service_id = $selectedService->id;
        $booking->user_id = $userInfo->id;
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_time = $request->input('booking_time');

        $booking->save();

        return redirect()->back()->with('success', (__('messages.Uzrezervuota')));
    }


    public function bookedReservations(Request $request)
    {
        $userInfo = User::where('id', '=', session('loginID'))->with('addServices.addService')->first();
        $selectedProvider = $request->input('provider');
    $userPhoneNumber = null;

    if ($selectedProvider && $userInfo->addServices->isNotEmpty()) {
        foreach ($userInfo->addServices as $category) {
            if ($category->addService && $category->addService->provider == $selectedProvider) {
                $userPhoneNumber = $category->pnumber;
                break;
            }
        }
    }

    $userReservations = $userInfo->reservations()
        ->with('service.addService')->orderBy('booking_date', 'asc')->get();

    if ($selectedProvider) {
        $userReservations = $userReservations->filter(function ($reservation) use ($selectedProvider) {
            return optional($reservation->service->addService)->provider == $selectedProvider;
        });
    }
        return view('bookedreservations', compact('userReservations','userPhoneNumber'));
    }
    public function cancelReservation($id)
    {

        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->back()->withSuccess( __('messages.Rezervacija'));
    }

    public function showBookings(Request $request)
    {
        $userInfo = User::where('id', '=', session('loginID'))->first();

        $query = Reservation::whereHas('service.addService', function ($query) use ($userInfo) {
            $query->where('User_id', $userInfo->id);
        })
        ->with('service.addService', 'user')->orderBy('booking_date', 'asc')->orderby('booking_time','asc');

        if ($request->has('username')) {
            $username = $request->input('username');

            $query->whereHas('user', function ($query) use ($username) {
                $query->where('username', 'like', '%' . $username . '%');
            });
        }
        $reservations = $query->get();

        return view('myservices', compact('reservations', 'userInfo'));
    }
}


