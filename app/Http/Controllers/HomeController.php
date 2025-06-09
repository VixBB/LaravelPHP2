<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laptop;
use App\Models\Peminjaman;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['permission:view_dashboard'])->only('dashboard');
    // }


    public function home()
    {
        $data = auth()->user();
        $laptops = Laptop::all();

        if (auth()->user()->can('view_dashboard')) {
            return redirect()->route('admin.index3');
        }

         return view('home', compact('laptops','data')); // Pass laptops variable to the view
    }

    public function index()
    {
        $data = User::get();

        return view('index', compact('data'));
    }

    public function index2(Request $request)
    {
        $data = new Laptop;

        if ($request->get('search')){
            $data = $data->where('kode_laptop', 'like', '%' . $request->get('search').'%')
            ->orWhere('merk', 'like', '%' . $request->get('search').'%')
            ->orWhere('tipe', 'like', '%' . $request->get('search').'%');
        }
        $data = $data->get();

        return view('index2', compact('data','request'));
    }

    public function index3()
    {
        $data = Peminjaman::get();
        return view('index3', compact('data'));
    }

    

    public function laptopdetail(Request $request,$id)
    {
        $data = auth()->user();
        $laptop = Laptop::find($id);

        return view('laptopdetail', compact('laptop','data'));
    }



    public function create()
    {
        return view('create');
    }
    
    public function create1()
        {
            return view('create1');
        }

    public function create2()
    {
        $laptops = Laptop::where('status', 'tersedia')->get();
        $users = User::all();
        return view('create2', compact('laptops', 'users'));
    }

    public function store(Request $request) {
        $validator = FacadesValidator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nis' => 'nullable|string|max:255',
            'nisn' => 'nullable|string|max:255',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data ['email'] = $request -> email;
        $data ['name'] = $request -> name;
        $data ['password'] = bcrypt($request -> password);
        $data['nis'] = $request->nis;
        $data['nisn'] = $request->nisn;
        User::create($data);

        return redirect()->route('admin.index');
    }

    public function store1(Request $request) 
        {

            $validator = FacadesValidator::make($request->all(),[
                // Hapus validasi unique untuk kode_laptop
                'merk' => 'required',
                'tipe' => 'required',
                'cpu' => 'required',
                'gpu' => 'required',
                'ram' => 'required',
                'storage' => 'required', 
                'port' => 'required',       
                'gambar' => 'nullable|mimes:png,jpg,jpeg|max:100000',
                'status' => 'required|in:tersedia,dipinjam',
                'deskripsi' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            // Generate kode laptop otomatis
            $latestLaptop = Laptop::latest()->first();
            $nextId = $latestLaptop ? $latestLaptop->id + 1 : 1;
            $kodeLaptop = 'LP' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

            $data = $request->only(['merk', 'tipe', 'Deskripsi', 'status', 'cpu', 'gpu', 'ram', 'storage', 'port']);
            $data['kode_laptop'] = $kodeLaptop; // Tambahkan kode otomatis


            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $filename = date('Y-m-d').'-'.$gambar->getClientOriginalName();
                $path = 'gambar-laptop/'.$filename;
                Storage::disk('public')->put($path, file_get_contents($gambar));
                $data['gambar'] = $filename;

            }

            $laptop = Laptop::create($data);
            

            return redirect()->route('admin.index2');
        }

    public function store2(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'laptop_id' => 'required|exists:laptops,id',
            'tanggal_pinjam' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = new Peminjaman;
        $data->user_id = $request->user_id;
        $data->laptop_id = $request->laptop_id;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('admin.index3');
    }

    public function pinjam(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'laptop_id' => 'required|exists:laptops,id',
            'tanggal_pinjam' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = new Peminjaman;
        $data->user_id = $request->user_id;
        $data->laptop_id = $request->laptop_id;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('laptopdetail', ['id' => $request->laptop_id])
            ->with('success', 'Laptop berhasil dipinjam.');
    }


    public function edit(request $request,$id){
        $data = User::find($id);
       
        return view('edit',compact('data'));
    }

    public function edit1($id)
        {
            $data = Laptop::find($id);
        
            return view('edit1',compact('data'));
        }

    public function edit2($id)
    {
        $data = Peminjaman::find($id);
        $users = \App\Models\User::all();
        $laptops = \App\Models\Laptop::all();
        return view('edit2', compact('data', 'users', 'laptops'));
    }

    public function update(Request $request,$id)
        {

            $validator = FacadesValidator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable',
                'nis' => 'nullable|string|max:255',
                'nisn' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data ['email'] = $request -> email;
            $data ['name'] = $request -> name;
            $data ['nis'] = $request -> nis;
            $data ['nisn'] = $request -> nisn;

            if($request->password){
                $data ['password'] = bcrypt($request -> password);
            }
            
            User::whereId($id)->update($data);

            return redirect()->route('admin.index');
        }

    public function update1(Request $request,$id)
        {

            $validator = FacadesValidator::make($request->all(),[
                'merk' => 'required',
                'tipe' => 'required',
                'cpu' => 'required',
                'gpu' => 'required',
                'ram' => 'required',
                'storage' => 'required',
                'port' => 'required',
                'gambar' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'deskripsi' => 'required',
                'status' => 'required|in:tersedia,dipinjam',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = Laptop::find($id);

            if ($request->hasFile('gambar')) {
                if ($data->gambar && Storage::disk('public')->exists('gambar-laptop/'.$data->gambar)) {
                    Storage::disk('public')->delete('gambar-laptop/'.$data->gambar);
                }
                $gambar = $request->file('gambar');
                $filename = date('Y-m-d').'-'.$gambar->getClientOriginalName();
                $path = 'gambar-laptop/'.$filename;
                Storage::disk('public')->put($path, file_get_contents($gambar));
                $data->gambar = $filename;
            }

            $data->merk = $request->merk;
            $data->tipe = $request->tipe;
            $data->cpu = $request->cpu;
            $data->gpu = $request->gpu;
            $data->ram = $request->ram;
            $data->storage = $request->storage;
            $data->port = $request->port;
            $data->status = $request->status;
            $data->deskripsi = $request->deskripsi;
            
            $data->save();

            return redirect()->route('admin.index2');
        }


    public function update2(Request $request, $id)
        {
            $validator = FacadesValidator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
                'laptop_id' => 'required|exists:laptops,id',
                'status' => 'required|in:dipinjam,dikembalikan',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = Peminjaman::find($id);
            $data->user_id = $request->user_id;
            $data->laptop_id = $request->laptop_id;
            $data->status = $request->status;
            $data->save();


            return redirect()->route('admin.index3');
        }

    public function delete(Request $request, $id)
        {
            $data = User::find($id);

            if ($data) {
                $data->delete();
            }
            return redirect()->route('admin.index');
        }


    public function delete1($id)
    {
        $data = Laptop::find($id);

        if ($data) {
            if ($data->gambar && Storage::disk('public')->exists('gambar-laptop/'.$data->gambar)) {
                Storage::disk('public')->delete('gambar-laptop/'.$data->gambar);
            }
            $data->delete();
        }
        return redirect()->route('admin.index2');
    }


    public function delete2($id)
        {
            $data = Peminjaman::find($id);

            if ($data) {
                $data->delete();
            }
            return redirect()->route('admin.index3');
        }


    public function profile()
    {
        $data = auth()->user();
        $peminjaman = \App\Models\Peminjaman::with('laptop')->where('user_id', $data->id)->get();
        return view('profile', compact('data', 'peminjaman'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'nullable|string|max:255',
            'nisn' => 'nullable|string|max:255',
        ]);

        $user->name = $request->input('name');
        $user->nis = $request->input('nis');
        $user->nisn = $request->input('nisn');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
