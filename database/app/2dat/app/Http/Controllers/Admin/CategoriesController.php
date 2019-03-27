<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
    $this->middleware('admin');
  }
    public function index()
    {
        $recent_update=$this->recent_update_time();
        $categories=Category::where('parent',0)->orderBy('sort_order')->paginate(10);
        return view("admin.categories.list",compact('categories','recent_update'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=$request->id;
        $old_cat=Category::findorfail($id);
        $cat=new Category;
        $cat->title=$old_cat->title;
        $cat->description=$old_cat->title;
        $cat->icon=$old_cat->title;
        $cat->parent=$old_cat->parent;
        $cat->sort_order=($old_cat->sort_order)+1;
        $cat->status=$old_cat->status?'1':'0';
        $cat->save();

        Session::flash('success','Information was saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $this->validate($request,array(

      'title'=>'required|max:250'));
        $cat=new Category;
        $cat->title=$request->title;
        $cat->description=$request->title;
        $cat->icon=$request->title;
        $cat->parent=0;
        $cat->status=$request->status?'1':'0';
        $cat->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,array(

      'title'=>'required|max:250'));
        $cat=Category::find($id);
        $cat->title=$request->title;
        $cat->description=$request->title;
        $cat->icon=$request->title;
        $cat->parent=0;
        $cat->status=$request->status?'1':'0';
        $cat->save();
        Session::flash('success','Information was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
       Session::flash('success','Deleted successfully'); 
    }
    public function update_sort(Request $request)
    {
           $request->data;
        foreach ($request->data as $index=> $categories) {
            foreach ($categories as $parent=>$j) {
               if (!is_array($j)) {
                //echo "order of parent cats $j--$index";
                    $parent_id=$j;
                    $cat=Category::find($j);
                    $cat->sort_order=$index;
                    $cat->parent=0;
                    $cat->save();
               }else{
                    foreach($j as $order=>$child)/*j is parent category*/
                    {
                        //echo "**parent $parent_id**";
                        $child_id=$child['id'];
                        echo "**child $child_id*** order $order";
                        $cat=Category::find($child_id);
                        $cat->sort_order=$order;
                        $cat->parent=$parent_id;
                        $cat->save();
                    }
               }
            }
        }
        $order=0;
    }
    public function recent_update_time()
      {
        $recent_date_timestamp=Category::select('updated_at')->orderBy('updated_at','desc')->first();
        $recent_update=date("d M,Y")." @ ".date("h:i a");
        if ($recent_date_timestamp) {
          $recent_update=date("d M,Y",strtotime($recent_date_timestamp->updated_at))." @ ".date("h:i a",strtotime($recent_date_timestamp->updated_at));

        }
        return $recent_update;
      }
}
