<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Models\AlbumsSituation;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Multimedia;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    public function index()
    {
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
            $file = $request->file('main_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('images'), $filename);

            $multimedia->album_id = $album->id;
            $multimedia->path = $filename;
            $multimedia->save();
        }

        Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'album created']);

        return redirect('/home')->with('status', 'Álbum Cadastrado com Sucesso!');
    }


    public function edit(Album $album)
    {
        $customers = Customer::all();
        $albumSituations = AlbumsSituation::all();

        $multimedia = $album->multimedia()->first()->path;

        return view('albums.edit', compact('album', 'customers', 'albumSituations', 'multimedia'));
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $data = $request->validated();

        Album::find($album->id)->update($data);

        if ($request->hasFile('main_image')) {
            $path = 'images/' . $album->main_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('main_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/', $filename);

            $multimedia = $album->multimedia()->first();
            $multimedia->path = $filename;
            $multimedia->update();
        }

        Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'album updated']);

        return redirect('/home')->with('status', 'Cliente Atualizado com Sucesso!');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'album deleted']);

        return redirect('/home')->with('status', 'Album Excluido com Sucesso!');
    }
}