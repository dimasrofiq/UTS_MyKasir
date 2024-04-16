<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

 class KaryawanController extends Controller {

            public function index(): View
            {
                //get Data db
                $users = User::latest()->paginate(5);
                return view('Karyawan.index', compact('users'));
            }

            public function create(): View
            {
                return view('karyawan.create');
            }
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|string|max:250',
                    'email' => 'required|email|max:250|unique:users',
                    'password' => 'required|min:8|confirmed'
                ]);

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
                
                return redirect()->route('karyawan.index')
                ->withSuccess('You have successfully created new karyawan !!');
            }

            public function edit(string $id): View
            {
                //get post by ID
                $users = User::findOrFail($id);

                //render view with post
                return view('karyawan.edit', compact('users'));
            }

            public function update(Request $request, $id): RedirectResponse
            {
                //validate form
                $this->validate($request, [
                    'name'      => 'required|min:3'
                
                ]);

                //get post by ID
                $datas = User::findOrFail($id);

                    //update post without image
                    $datas->update([
                        'name'      => $request->name
                    ]);
            
                //redirect to index
                return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Diubah!']);
            }

            public function ubahpass(string $id): View
            {
                //get post by ID
                $users = User::findOrFail($id);

                //render view with post
                return view('karyawan.reset', compact('users'));
            }

            // Hapus data
            public function destroy($id): RedirectResponse
            {
                //get post by ID
                $post = User::findOrFail($id);
        
                //delete post
                $post->delete();
        
                //redirect to index
                return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }
        }
