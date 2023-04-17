<?php

namespace App\Http\Controllers;

use App\Models\AssignArticle;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\FreelancerMap;
use App\Models\Indeed;
use App\Models\User;
use App\Models\Color;
use App\Http\Requests\ImageUploadRequest;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $column = Auth::user()->column;
        $order = Auth::user()->order_by;

        auth()->user()->role == 1 ? $status = 'confirmed' : $status = $request->status ?? 'pending';
        if (auth()->user()->role == 1) {
            $articleData = Article::whereHas('assignedArticles', function ($q) {
                $q->where('user_id', auth()->id());
            })->where('status', $status);
        } else {
            $articleData = Article::where('status', $status);
            $data['users'] = User::get();
        }
        if (isset($request->keyword)) {
            $searchQuery = trim($request->keyword);
            $articleData = $articleData->where(function ($q) use ($searchQuery) {
                $q->where('title', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('url', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('name', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('description', 'lIKE', '%' . $searchQuery . '%');
            });
        }
        if (isset($request->order_by)) {
            $articleData = $articleData->orderBy('id', $request->order_by);
        }
        $data['articleData'] = $articleData->paginate(500);
        $data['order_by'] = $request->order_by ?? 'DSC';
        return view('home', $data);
    }

    public
    function fetch_home_data(Request $request)
    {
        if ($request->ajax()) {
            auth()->user()->role == 1 ? $status = 'confirmed' : $status = $request->status ?? 'pending';
            if (auth()->user()->role == 1) {
                $data['articleData'] = Article::whereHas('assignedArticles', function ($q) {
                    $q->where('user_id', auth()->id());
                })->where('status', $status)->latest()->paginate(500);
            } else {
                $data['articleData'] = Article::where('status', $status)->latest()->paginate(500);
                $data['users'] = User::get();
            }

            return view('pagination_index', $data)->render();
        }
    }

    public
    function fetch_indeed_data(Request $request)
    {
        if ($request->ajax()) {
            auth()->user()->role == 1 ? $status = 'confirmed' : $status = $request->status ?? 'pending';
            if (auth()->user()->role == 1) {
                $data['articleData'] = Indeed::whereHas('assignedArticles', function ($q) {
                    $q->where('user_id', auth()->id());
                })->where('status', $status)->latest()->paginate(500);
            } else {
                $data['articleData'] = Indeed::where('status', $status)->latest()->paginate(500);
                $data['users'] = User::get();
            }

            return view('pagination_index', $data)->render();
        }
    }

    public
    function fetch_freelancer_data(Request $request)
    {

        if ($request->ajax()) {
            auth()->user()->role == 1 ? $status = 'confirmed' : $status = $request->status ?? 'pending';
            if (auth()->user()->role == 1) {
                $data['articleData'] = FreelancerMap::whereHas('assignedArticles', function ($q) {
                    $q->where('user_id', auth()->id());
                })->where('status', $status)->latest()->paginate(500);
            } else {
                $data['articleData'] = FreelancerMap::where('status', $status)->latest()->paginate(500);
                $data['users'] = User::get();
            }

            return view('pagination_index', $data)->render();
        }
    }

    public
    function userList()
    {

        $data['users'] = User::latest()->paginate(20);
        return view('user.index', $data);
    }

    public
    function addUser()
    {
        return view('user.add');
    }

    public
    function storeUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:100',
            'password' => [
                'required',
                'string',
                'confirmed'
            ],
            //            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required',
            'role' => 'required'
        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role == 'admin' ? 0 : 1;
        $user->save();
        return redirect()->route('user-list')->with('success', 'Successfully Created');
    }


    public
    function Indeed(Request $request)
    {
        $column = Auth::user()->column;
        $order = Auth::user()->order_by;
        auth()->user()->role == 1 ? $status = 'confirmed' : $status = $request->status ?? 'pending';
        if (auth()->user()->role == 1) {
            $articleData = Indeed::whereHas('assignedArticles', function ($q) {
                $q->where('user_id', auth()->id());
            })->where('status', $status ?? 'pending');
        } else {
            $articleData = Indeed::where('status', $status ?? 'pending');
            $data['users'] = User::get();
        }
        if (isset($request->keyword)) {
            $searchQuery = trim($request->keyword);
            $articleData = $articleData->where(function ($q) use ($searchQuery) {
                $q->where('title', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('url', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('name', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('description', 'lIKE', '%' . $searchQuery . '%');
            });
        }
        if (isset($request->order_by)) {
            $articleData = $articleData->orderBy('id', $request->order_by);
        }
        $data['articleData'] = $articleData->paginate(500);
        $data['order_by'] = $request->order_by ?? 'DSC';
        return view('indeed.indeed', $data);
    }

    //Get ebay article
    public function ebayArticles(Request $request)
    {
        $column = Auth::user()->column;
        $order = Auth::user()->order_by;
        auth()->user()->role == 1 ? $status = 'confirmed' : $status = $request->status ?? 'pending';
        if (auth()->user()->role == 1) {
            $articleData = Article::whereHas('assignedArticles', function ($q) {
                $q->where('user_id', auth()->id());
            })->where('status', $status);
        } else {
            $articleData = Article::where('status', $status);
            $data['users'] = User::get();
        }
        if (isset($request->keyword)) {
            $searchQuery = trim($request->keyword);
            $articleData = $articleData->where(function ($q) use ($searchQuery) {
                $q->where('title', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('url', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('name', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('description', 'lIKE', '%' . $searchQuery . '%');
            });
        }
        if (isset($request->order_by)) {
            $articleData = $articleData->orderBy('id', $request->order_by);
        }
        $data['articleData'] = $articleData->paginate(500);
        $data['order_by'] = $request->order_by ?? 'DSC';
        return view('home', $data);
    }

    //Get freelancer article
    public
    function freelancerMap(Request $request)
    {
        $column = Auth::user()->column;
        $order = Auth::user()->order_by;
        auth()->user()->role == 1 ? $status = 'confirmed' : $status = $request->status ?? 'pending';
        if (auth()->user()->role == 1) {
            $articleData = FreelancerMap::whereHas('assignedArticles', function ($q) {
                $q->where('user_id', auth()->id());
            })->where('status', $status ?? 'pending');
        } else {
            $articleData = FreelancerMap::where('status', $status ?? 'pending');
            $data['users'] = User::get();
        }
        if (isset($request->keyword)) {
            $searchQuery = trim($request->keyword);
            $articleData = $articleData->where(function ($q) use ($searchQuery) {
                $q->where('title', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('url', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('name', 'lIKE', '%' . $searchQuery . '%')
                    ->orWhere('description', 'lIKE', '%' . $searchQuery . '%');
            });
        }
        if (isset($request->order_by)) {
            $articleData = $articleData->orderBy('id', $request->order_by);
        }
        $data['articleData'] = $articleData->paginate(500);
        $data['order_by'] = $request->order_by ?? 'DSC';
        return view('freelancer', $data);
    }

    public
    function articleList(Request $request)
    {
        $column = Auth::user()->column;
        $order = Auth::user()->order_by;
        $rentalData = Article::where('status', $request->status)->get();
        return response()->json($rentalData);
    }

    public
    function freelancerList(Request $request)
    {
        $column = Auth::user()->column;
        $order = Auth::user()->order_by;

        $rentalData = FreelancerMap::where('status', $request->status)->get();

        return response()->json($rentalData);
    }

    public
    function IndeedList(Request $request)
    {

        $column = Auth::user()->column;
        $order = Auth::user()->order_by;
        $rentalData = Indeed::where('status', $request->status)->get();
        return response()->json($rentalData);
    }


    public
    function add_article()
    {
        $color = Article::all();
        return view('add-article')->with("article", $color);
    }

    public
    function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'color' => 'required',

        // ]);


        $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required'
            ],
            [
                'title.required' => 'Das Feld "Titel" ist erforderlich',
                'description.required' => 'Das Feld "Beschreibung" ist erforderlich.',

            ]
        );

        //     $rules = [
        //     'title' => 'required',
        //     'description' => 'required',
        //     'color' => 'required',
        // ];

        // $customMessages = [
        //     'required' => 'Das :attribute ist erforderlich.'
        // ];

        // $this->validate($request, $rules, $customMessages);

        $input = $request->all();


        $array = array();
        if ($image = $request->file('image')) {
            $key1 = 0;
            foreach ($image as $key => $file) {
                $destinationPath = 'uploads/';
                $name = str_replace(" ", "-", $input['title']) . "-" . $key . "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $name);

                $array[] = $name;
            }
        }

        $input['image'] = serialize($array);


        Article::create($input);
        return back()
            ->with('success', 'Der hinzugefügte Artikel wurde erfolgreich gesendet.');
    }


    public
    function edit($id)
    {
        $rentalData = Article::where('id', $id)->first()->toArray();
        $rentalData['image'] = unserialize($rentalData['image']);

        $color = Color::all();

        return View('edit-article')
            ->with('data', ["rentalData" => $rentalData, 'color' => $color]);
    }

    //edit article data
    public
    function editArticle($id)
    {
        $data['articleData'] = Article::where('id', $id)->first();
        return View('edit-article', $data);
    }

    //Edit freelancer data
    public
    function editFreelancer($id)
    {

        $data['articleData'] = FreelancerMap::where('id', $id)->first();

        return View('edit-freelancer', $data);
    }

    //Edit freelancer data
    public
    function editIndeed($id)
    {

        $data['articleData'] = Indeed::where('id', $id)->first();

        return View('indeed.edit-indeed', $data);
    }

    //Edit ebay article status
    public
    function editArticleStatus(Request $request)
    {
        $rentalData = Article::where('id', $request->id)->first();
        $rentalData->status = $request->status;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    //Edit Freelancer article status
    public
    function editFreelancerStatus(Request $request)
    {
        $rentalData = FreelancerMap::where('id', $request->id)->first();
        $rentalData->status = $request->status;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    public
    function editHrFrStatus(Request $request): JsonResponse
    {
        if ($request->table == 'freelance') {
            $rentalData = FreelancerMap::where('id', $request->id)->first();
        } elseif ($request->table == 'indeed') {
            $rentalData = Indeed::where('id', $request->id)->first();
        } else {
            $rentalData = Article::where('id', $request->id)->first();
        }

        $rentalData->hrfr = $request->hrfr;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    public
    function editDateStatus(Request $request): JsonResponse
    {
        if ($request->table == 'freelance') {
            $rentalData = FreelancerMap::where('id', $request->id)->first();
        } elseif ($request->table == 'indeed') {
            $rentalData = Indeed::where('id', $request->id)->first();
        } else {
            $rentalData = Article::where('id', $request->id)->first();
        }

        $rentalData->datum = $request->datum;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    public
    function assignArticle(Request $request): JsonResponse
    {
        if ($request->table == 'freelance') {
            $table_class = FreelancerMap::class;
        } elseif ($request->table == 'indeed') {
            $table_class = Indeed::class;
        } else {
            $table_class = Article::class;
        }
        $assign_article = new AssignArticle();
        $assign_article->user_id = $request->user_id;
        $assign_article->origin_id = $request->article_id;
        $assign_article->origin_type = $table_class;;
        $assign_article->save();

        return response()->json(["status" => "success"]);
    }

    public
    function editTypeStatus(Request $request)
    {
        if ($request->table == 'freelance') {
            $rentalData = FreelancerMap::where('id', $request->id)->first();
        } elseif ($request->table == 'indeed') {
            $rentalData = Indeed::where('id', $request->id)->first();
        } else {
            $rentalData = Article::where('id', $request->id)->first();
        }

        $rentalData->type_status = $request->type_status;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    //Edit Indeed article status
    public
    function editIndeedStatus(Request $request)
    {
        $rentalData = Indeed::where('id', $request->id)->first();
        $rentalData->status = $request->status;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    public
    function deleteDescription(Request $request)
    {
        $rentalData = Article::where('id', $request->id)->first();
        $rentalData->description = $request->description;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    public
    function deleteFreelancerDescription(Request $request)
    {
        $rentalData = FreelancerMap::where('id', $request->id)->first();
        $rentalData->description = $request->description;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }

    public
    function deleteIndeedDescription(Request $request)
    {
        $rentalData = Indeed::where('id', $request->id)->first();
        $rentalData->description = $request->description;
        $rentalData->save();
        return response()->json(["status" => "success"]);
    }


    public
    function update(Request $request)
    {
        $input = $request->all();

        $article = Article::find($input['id'])->toArray();


        $user = Article::where("id", $input['id'])->first();
        $user->fill($input);
        $user->save();
        //return redirect("/edit-article/".$input['id']);
        return back()
            ->with('success', 'Article updated successfully.');
    }

    public
    function updateArticle(Request $request)
    {
        $article = Article::find($request->id);

        if (!$article) {
            $article = new Article();
        }
        if ($request->file1) {
            $store_file = Storage::disk()->put('article', $request->file1);
            $path1 = 'storage/app/' . $store_file;
        }
        if ($request->file2) {
            $store_file = Storage::disk()->put('article', $request->file2);
            $path2 = 'storage/app/' . $store_file;
        }
        if ($request->file3) {
            $store_file = Storage::disk()->put('article', $request->file3);
            $path3 = 'storage/app/' . $store_file;
        }
        $article->title = $request->title ?? null;
        $article->description = $request->description ?? null;
        $article->url = $request->url ?? null;
        $article->location = $request->location ?? null;
        $article->name = $request->name ?? null;
        $article->email = $request->email ?? null;
        $article->telefon = $request->telefon ?? null;
        $article->webseite = $request->webseite ?? null;
        $article->ansprechpartner = $request->ansprechpartner ?? null;
        $article->nr = $request->nr ?? null;
        $article->plz = $request->plz ?? null;
        $article->ort = $request->ort ?? null;
        $article->datum = $request->datum ?? null;
        $article->hrfr = $request->hrfr ?? null;
        $article->file1 = $path1 ?? null;
        $article->file2 = $path2 ?? null;
        $article->file3 = $path3 ?? null;
        $article->save();
        return redirect()->route('home', ['status' => $request->queryParam])->with('success', 'Article updated successfully.');
    }

    //Update freelancer job data
    public
    function updateFreelancerArticle(Request $request)
    {
        $article = FreelancerMap::find($request->id);

        if (!$article) {
            $article = new FreelancerMap();
        }
        if ($request->file1) {
            $store_file = Storage::disk()->put('freelancer', $request->file1);
            $path1 = 'storage/app/' . $store_file;
        }
        if ($request->file2) {
            $store_file = Storage::disk()->put('freelancer', $request->file2);
            $path2 = 'storage/app/' . $store_file;
        }
        if ($request->file3) {
            $store_file = Storage::disk()->put('freelancer', $request->file3);
            $path3 = 'storage/app/' . $store_file;
        }

        $article->title = $request->title ?? null;
        $article->description = $request->description ?? null;
        $article->url = $request->url ?? null;
        $article->location = $request->location ?? null;
        $article->name = $request->name ?? null;
        $article->email = $request->email ?? null;
        $article->telefon = $request->telefon ?? null;
        $article->webseite = $request->webseite ?? null;
        $article->ansprechpartner = $request->ansprechpartner ?? null;
        $article->nr = $request->nr ?? null;
        $article->ort = $request->ort ?? null;
        $article->plz = $request->plz ?? null;
        $article->datum = $request->datum ?? null;
        $article->hrfr = $request->hrfr ?? null;
        $article->file1 = $path1 ?? null;
        $article->file2 = $path2 ?? null;
        $article->file3 = $path3 ?? null;
        $article->save();
        return redirect()->route('freelancer', ['status' => $request->queryParam])->with('success', 'Article updated successfully.');
    }

    //Update Indeed job data
    public
    function updateIndeedArticle(Request $request)
    {
        $article = Indeed::find($request->id);

        if (!$article) {
            $article = new Indeed();
        }
        if ($request->file1) {
            $store_file = Storage::disk()->put('indeed', $request->file1);
            $path1 = 'storage/app/' . $store_file;
        }
        if ($request->file2) {
            $store_file = Storage::disk()->put('indeed', $request->file2);
            $path2 = 'storage/app/' . $store_file;
        }
        if ($request->file3) {
            $store_file = Storage::disk()->put('indeed', $request->file3);
            $path3 = 'storage/app/' . $store_file;
        }

        $article->title = $request->title ?? null;
        $article->description = $request->description ?? null;
        $article->url = $request->url ?? null;
        $article->location = $request->location ?? null;
        $article->name = $request->name ?? null;
        $article->email = $request->email ?? null;
        $article->telefon = $request->telefon ?? null;
        $article->webseite = $request->webseite ?? null;
        $article->ansprechpartner = $request->ansprechpartner ?? null;
        $article->nr = $request->nr ?? null;
        $article->plz = $request->plz ?? null;
        $article->ort = $request->ort ?? null;
        $article->datum = $request->datum ?? null;
        $article->hrfr = $request->hrfr ?? null;
        $article->file1 = $path1 ?? null;
        $article->file2 = $path2 ?? null;
        $article->file3 = $path3 ?? null;
        $article->save();
        return redirect()->route('indeed', ['status' => $request->queryParam])->with('success', 'Article updated successfully.');
    }


    public
    function addDropdown(Request $request)
    {

        $order = "";

        if ($request->order == "descending") {
            $order = "desc";
        } else {
            $order = "asc";
        }

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->order_by = $order;
        $user->column = strtolower($request->column);
        $user->save();
        $response = array(
            'status' => "success",
            'msg' => "order updated",
        );
        return response()->json($response);
    }


    public
    function destroy($id)
    {
        DB::delete('delete from articles where id = ?', [$id]);
        // $rentalData = Article::all();
        // return view('home')->with("articleData", $rentalData);
        return redirect('home');
    }


    public
    function addColor(Request $request)
    {
        $input = $request->all();

        Color::create($input);
        $response = array(
            'status' => "success",
            'msg' => "order updated",
        );
        return response()->json($response);
    }

    public
    function deletecolor($id)
    {
        DB::delete('delete from colors where id = ?', [$id]);
        $response = array(
            'status' => "success",
            'msg' => "color deleted",
        );
        return response()->json($response);
    }
}
