<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\StoreCustomerAddressRequest;
use App\Models\Album;
use App\Models\AlbumsSituation;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index() {
        $albums = Album::all();

        return view('albums.index', compact('albums'));
    }

    public function register()
    {
        $customers = Customer::all();
        $albumSituations = AlbumsSituation::all();

        return view('albums.register', compact('customers', 'albumSituations'));
    }

    public function insert(StoreAlbumRequest $request)
    {
        $multimedia = new Multimedia();

        $data = $request->validated();
        $album = Album::create($data);

        if ($request->hasFile('main_image')) {
            $path = Storage::disk('local')->put($request->file('main_image')->getClientOriginalName(), $request->file('main_image')->get());
            $path = $request->file('main_image')->store('/images');

            $multimedia->album_id = $album->id;
            $multimedia->path     = $path;
            
            $multimedia->save();

            // $multimedia = Multimedia::create(
            //     ['path' => $path],
            //     ['album_id' => $album->id]);
            // $multimedia->save();
        }

        Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'album created']);

        return redirect('/home')->with('status', 'Álbum Cadastrado com Sucesso!');
    }
}