<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contacts = Contact::where('name', 'LIKE', '%'.$request->search_contact. '%')
            ->orderBy('name', 'asc')
            ->paginate(5);  // gunakan paginate
        
        return view('contact.index', compact('contacts'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' =>  'required|max:100',
            'phone' => 'required|max:100',
            'address' => 'required|max:100',
        ], [
            'name.required' => 'Nama  harus diisi!',
            'email.required' => 'Email harus diisi!',
            'phone.required' => 'Nomor telepon harus diisi!',
            'address.required' => 'address harus diisi!',
        
            'name.max' => 'Nama maksimal 100 karakter!',
            'email.min' => 'Email minimal 20 karakter!',
            'phone.min' => 'Phone minimal 10 karakteer atau angka!',
            'address.min'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Contact!');
    }

    /**
     * Display the specified resource.
     */
    public function showProfile($id) {
        $contact = Contact::find($id); // Ambil data contact berdasarkan ID
        if (!$contact) {
            return redirect()->route('contacts.index')->with('failed', 'Contact tidak ditemukan');
        }
        return view('contacts.profile', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = Contact::where('id', $id)->first();
        // compact kirim data ke view ($)
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' =>  'required|max:100',
            'phone' => 'required|max:100',
            'address' => 'required|max:100',
        ]);
        Contact::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('contacts.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // $id untuk mengambil 
    {
        // dicari (where) berdasarkan id, lalu hapus
        $proses = Contact::where('id', $id)->delete();

        if ($proses) {
            return redirect()->back()->with('success', 'Berhasil menghapus data!');
        } else {
            return redirect()->back()->with('failed', 'Gagal menghapus data!');
        }
    }
}
