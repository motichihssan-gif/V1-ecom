<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cloudinary\Cloudinary;

class Rproductcontroler extends Controller
{
<<<<<<< HEAD
    
=======
    private function uploadToCloudinary($file)
    {
        try {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ]
            ]);

            return $cloudinary->uploadApi()->upload($file->getRealPath(), [
                'folder' => 'products',
            ])['secure_url'];
        } catch (\Exception $e) {
            throw new \Exception('Erreur lors du téléchargement de l\'image: ' . $e->getMessage());
        }
    }
    /**
     * Display a listing of the resource.
     */
>>>>>>> e0ac472 (push)
    public function index()
    {
         $products = Product::paginate(5);
        return view('Produits',['products'=> $products, 'categorie' => 'all']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creerproduit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Store method called');
<<<<<<< HEAD
=======
       
>>>>>>> e0ac472 (push)
        
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        try {
            $titre = $request->input('titre');
            $contenu = $request->input('contenu');
            $prix = $request->input('prix');
            $categorie = $request->input('categorie');

            $uploadedFileUrl = $this->uploadToCloudinary($request->file('image'));

            Product::insert([
                'titre' => $titre,
                'contenu' => $contenu,
                'prix' => $prix,
                'categorie' => $categorie,
                'image' => $uploadedFileUrl,
                'solde' => 0,
            ]);
<<<<<<< HEAD

            return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès!');
=======
            return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès!');
>>>>>>> e0ac472 (push)
        } catch (\Exception $e) {
            \Log::error('Cloudinary upload error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors du téléchargement: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
<<<<<<< HEAD
        //
    }
=======
        // $product = Product::findOrFail($id);
        // return view('showproduit', compact('product'));
    } 
>>>>>>> e0ac472 (push)

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('editproduit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);    
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        try {
            $product->titre = $request->input('titre');
            $product->contenu = $request->input('contenu');
            $product->prix = $request->input('prix');
            $product->categorie = $request->input('categorie');
            
            if ($request->hasFile('image')) {
                $uploadedFileUrl = $this->uploadToCloudinary($request->file('image'));
                $product->image = $uploadedFileUrl;
            }
            $product->save();
<<<<<<< HEAD
            return redirect()->route('products.index');
=======
            return redirect()->route('produits.index');
>>>>>>> e0ac472 (push)
        } catch (\Exception $e) {
            \Log::error('Cloudinary upload error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors du téléchargement: ' . $e->getMessage());
        }
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
<<<<<<< HEAD
        return redirect()->route('products.index');
    }
}
=======
        return redirect()->route('produits.index');
    }
}

>>>>>>> e0ac472 (push)
